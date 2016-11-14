<?php

/**
 * @var $this \yii\web\View
 * @var $model \backend\models\LoginForm
 */

use backend\assets\LoginAsset;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
</head>
<body class="gray-bg">
<?php $this->beginBody() ?>
<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">HS</h1>

        </div>
        <h3>欢迎访问华商管理系统</h3>
<?php

echo \common\widgets\Alert::widget();

// form 开始
$form = ActiveForm::begin([
    'options' => [
        'class' => 'm-t',
    ],
    'fieldConfig' => [
        'template' => '{beginWrapper}{input}{hint}{endWrapper}',
    ]
]);
// 用户名
echo $form->field($model, 'username', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('username')
    ]
])->textInput(['required' => '', 'autofocus'=>true]);

// 密码
echo $form->field($model, 'password', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('password')
    ]
])->passwordInput(['required' => '']);

// 验证码
echo $form->field($model, 'verify')->widget(Captcha::className(), [
    'captchaAction' => 'common/captcha',
    'options' => [
        'placeholder' => $model->getAttributeLabel('verify'),
        'class' => 'form-control'
    ],
    'template'=>
        '<div class="row">
            <div class="col-lg-7">{input}</div>
            <div class="col-lg-5">{image}</div>
        </div>',
    'imageOptions'=>[
        'style' => 'cursor:pointer'
    ]
]);

// 登录按钮
echo Html::submitButton('登 录', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'login-button']);

ActiveForm::end();
// form结束
?>
        <?php if($model->hasErrors()) : ?>
        <div class="form-group">
                <?php
                $errors = $model->getErrors();
                foreach ($errors as $error) {
                    foreach ($error as $e) {
                        echo '<span class="error">'.$e.'</span>';
                    }
                }
                ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>