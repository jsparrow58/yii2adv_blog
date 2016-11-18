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

    private $_article = false;

    public function findById($id)
    {
        $article = $this->getArticle($id);
        if($article) {
            $this->setAttributes($article->getAttributes());
            return true;
        }
        return false;
    }


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
        if( $this->validate() ) {
            $article = $this->getArticle();
            try {
                $article->setAttributes($this->getAttributes());
                $article->user_id = \Yii::$app->user->identity->getId();
                $article->summary = $this->getSummary();
                $article->created_at = time();
                $article->updated_at = time();
                $article->status = Post::IS_VALID; //后台发布的文章是，已经审核完成的
                // TODO: 添加tags信息到数据库中
                if( $article->save() ) {
                    $this->id = $article->id;
                    return true;
                }
                throw new Exception('数据库保存，发生异常');
            } catch (Exception $exception) {
                \Yii::$app->session->setFlash('error', $exception->getMessage());
                return false;
            }
        } else {
            \Yii::$app->session->setFlash('error', '发生未知的错误');
        }
    }

    public function update($id)
    {
        if ( $this->validate() ) {
            try {
                $article = $this->getArticle($id);
                $article->setAttributes($this->getAttributes());
                $article->summary = $this->getSummary();
                $article->updated_at = time();
                if( $article->save() ) {
                    return true;
                }
                throw  new Exception('数据库保存，发生异常');
            }catch (Exception $exception) {
                \Yii::$app->session->setFlash('error', $exception->getMessage());
                return false;
            }
        } else {
            \Yii::$app->session->setFlash('error', '发生未知的错误');
        }

    }

    private function getArticle($id=null)
    {
        if(!isset($id) || empty($id)) {
            $this->_article = new Post();
        } elseif (isset($id) && !empty($id)) {
            $this->_article = Post::findById($id);
        } else {
            throw new Exception('发现未知的错误');
        }

        return $this->_article;
    }

    private function getSummary()
    {
        return '这里是一些文章的summary信息';
    }
}