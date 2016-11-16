<?php
/**
 * Created by PhpStorm.
 * User: jiangjunxian
 * Date: 2016/11/13
 * Time: 15:03
 */

namespace backend\controllers;


use backend\controllers\base\BaseController;
use backend\models\PostForm;

/**
 * 文章控制器
 * @package backend\controllers
 */
class PostController extends BaseController
{
    /**
     * 文章列表
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionCreate() {
        $model = new PostForm();
        $model->setScenario(PostForm::SCENARIO_CREATE);
        if($model->load(\Yii::$app->request->post())) {
            if(!$model->create()) {

            }
        }
        return $this->render('create', ['model'=>$model]);
    }
}