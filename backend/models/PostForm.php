<?php
/**
 * Created by PhpStorm.
 * User: jiangjunxian
 * Date: 2016/11/13
 * Time: 15:23
 */

namespace backend\models;


use backend\models\Base\BaseModel;

class PostForm extends BaseModel
{
    public $title;
    public $cate_id;
    public $content;
    public $label_img;
    public $tags;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['title', 'cate_id', 'content', 'label_img'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => '标题',
            'cate_id' => '栏目',
            'content' => '内容',
            'label_img' => '标题图片',
            'tags' => '标签',
        ];
    }

    public function scenarios()
    {
        $scenarios[self::SCENARIO_CREATE] = ['title', 'cate_id', 'content', 'label_img'];
        $scenarios[self::SCENARIO_UPDATE] = ['title', 'cate_id', 'content', 'label_img'];
        return array_merge(parent::scenarios(), $scenarios);
    }
}