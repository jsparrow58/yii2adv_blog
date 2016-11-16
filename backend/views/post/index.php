<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = '文章管理';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <p>
        <?= Html::a('新建文章', ['post/create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
