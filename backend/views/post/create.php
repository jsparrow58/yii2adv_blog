<?php
/**
 * @var $this \yii\web\View
 * @var $model \backend\models\PostForm
 * Created by PhpStorm.
 * User: jiangjunxian
 * Date: 2016/11/13
 * Time: 16:02
 */
$this->title = '新建文章';
$this->params['breadcrumbs'][] = ['label'=>'文章列表', 'url'=>['post/index']];
$this->params['breadcrumbs'][] = ['label'=>$this->title];
?>
<div class="row">
    <?= $this->render('_form', ['model'=>$model]) ?>
</div>


