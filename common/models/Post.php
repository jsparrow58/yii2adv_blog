<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

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
 *
 * @property User $user
 * @property PostTags[] $postTags
 */
class Post extends ActiveRecord
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['content'], 'string'],
            [['user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'label_img', 'summary'], 'string', 'max' => 255],
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
        ];
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
