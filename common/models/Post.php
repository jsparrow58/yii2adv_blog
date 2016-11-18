<?php

namespace common\models;

use common\models\base\BaseActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $label_img
 * @property string $content
 * @property string $summary
 * @property integer $user_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $cate_id
 * @property integer $position
 *
 * @property Category $cate
 * @property User $user
 * @property PostTags[] $postTags
 */
class Post extends BaseActiveRecord
{
    const IS_VALID = 2; // 已发布
    const NO_VALID = 1; // 待审核
    const DELETED = 0; // 已删除

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    public static function findById($id)
    {
        return static::findOne(['id'=>$id]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'user_id', 'created_at', 'updated_at', 'cate_id'], 'required'],
            [['content'], 'string'],
            [['user_id', 'status', 'created_at', 'updated_at', 'cate_id'], 'integer'],
            [['title', 'label_img', 'summary'], 'string', 'max' => 255],
            [['cate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['cate_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'label_img' => 'Label Img',
            'content' => 'Content',
            'summary' => 'Summary',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'cate_id' => 'Cate ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCate()
    {
        return $this->hasOne(Category::className(), ['id' => 'cate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTags::className(), ['post_id' => 'id']);
    }
}
