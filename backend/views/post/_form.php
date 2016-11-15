<?php
/**
 * @var $model \backend\models\PostForm
 * Created by PhpStorm.
 * User: jiangjunxian
 * Date: 2016/11/13
 * Time: 16:07
 */
use common\models\Category;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_id')->dropDownList(Category::getCategoryForLevelArray(), ['prompt'=>'选择栏目']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'label_img')->textInput() ?>

    <?= $form->field($model, 'tags')->widget('common\widgets\tags\TagWidget') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>