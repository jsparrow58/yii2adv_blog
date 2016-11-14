<?php

namespace common\models;

use common\models\base\BaseActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%tags}}".
 *
 * @property integer $id
 * @property string $tag_name
 * @property integer $post_number
 *
 * @property PostTags[] $postTags
 */
class Tags extends BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tags}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_name'], 'required'],
            [['post_number'], 'integer'],
            [['tag_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => 'Tag Name',
            'post_number' => 'Post Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTags::className(), ['tag_id' => 'id']);
    }
}
