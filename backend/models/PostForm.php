<?php
/**
 * Created by PhpStorm.
 * User: jiangjunxian
 * Date: 2016/11/13
 * Time: 15:23
 */

namespace backend\models;


use backend\models\Base\BaseModel;
use common\models\Post;
use yii\base\Exception;

class PostForm extends BaseModel
{
    public $id;
    public $title;
    public $cate_id;
    public $content;
    public $label_img;
    public $tags;

    private $_post = false;

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

    public function create()
    {
        $_post = $this->getPost();
    }

    private function getPost()
    {
        $scenario = $this->getScenario();
        if($scenario === self::SCENARIO_CREATE) {
            $this->_post = new Post();
        } elseif ($scenario === self::SCENARIO_UPDATE) {
            $this->_post = Post::findById($this->id);
        } else {
            throw new Exception('发现未知的错误');
        }

        return $this->_post;
    }
}