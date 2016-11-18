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
use common\models\Post;
use yii\web\NotFoundHttpException;

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
        if($model->load(\Yii::$app->request->post()) && $model->create()) {
            return $this->redirect(['post/view', 'id'=>$model->id]);
        }
        return $this->render('create', ['model'=>$model]);
    }

    public function actionView($id) {
        $model = Post::findById($id);
        return $this->render('view', ['model'=>$model]);
    }

    public function actionUpdate($id) {
        $model = new PostForm();
        $model->setScenario(PostForm::SCENARIO_UPDATE);
        if($model->load(\Yii::$app->request->post()) && $model->update($id)) {
            return $this->redirect(['post/view', 'id'=>$model->id]);
        }

        if ($model->findById($id))
            return $this->render('update', ['model'=>$model]);

        throw new NotFoundHttpException('找不到你请求的页面');
    }
}