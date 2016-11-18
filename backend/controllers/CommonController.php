<?php
/**
 *
 * User: JSparrow
 * DateTime: 2016/11/11 11:15
 * Created by PhpStorm.
 */

namespace backend\controllers;


use backend\models\LoginForm;
use Yii;
use yii\web\Controller;

class CommonController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            /**
             * 错误处理
             */
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            /**
             * 验证码处理
             */
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'width' => 105,
                'height' => 34,
                'minLength' => 5,
                'maxLength' => 5,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testMe' : null,
            ],
        ];
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = false; // 不显示布局

        $model = new LoginForm();

        if($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->goBack(['site/index']);
        }
        return $this->render('login', ['model'=>$model]);
    }
}