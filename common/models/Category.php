<?php

namespace common\models;

use common\models\base\BaseActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Category $p
 * @property Category[] $categories
 * @property Post[] $posts
 */
class Category extends BaseActiveRecord
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['status'], 'in', 'range'=>[self::STATUS_ENABLED, self::STATUS_DISABLED]],
            [['pid'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['pid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getStatusTextArray(){
        return [
            self::STATUS_ENABLED => '正常',
            self::STATUS_DISABLED => '禁用'
        ];
    }

    public static function getCategoryForLevelArray() {
        $result = static::find()
            ->select(['id', 'pid', 'title'])
            ->where(['status'=>self::STATUS_ENABLED])
            ->asArray()
            ->all();

        return self::unlimitedForLevel($result);
    }

    //
    /**
     * 说明:组合一维数组
     * @param Category[] $cate
     * @param string $html
     * @param string $shuffix
     * @param int $pid
     * @param int $level
     * @return array
     */
    static public function unlimitedForLevel ($cate, $html = '──', $shuffix = '┤', $pid = null, $level = 0) {
        $arr = array();
        foreach ($cate as $v){
            if($v['pid'] == $pid){
                $arr[$v['id']] = str_repeat($html, $level).($level?$shuffix:'').$v['title'];
                // 索引是数字，只能用不能array_merge
                $arr = $arr + self::unlimitedForLevel($cate, $html, $shuffix, $v['id'], $level + 1);
            }
        }
        return $arr;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(Category::className(), ['id' => 'pid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['pid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['cate_id' => 'id']);
    }
}
