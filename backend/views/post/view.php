<?php
/**
 * @var $model \common\models\Post
 * Created by PhpStorm.
 * User: jsparrow
 * Date: 16-11-18
 * Time: 上午11:29
 */
use yii\bootstrap\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('删除', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
</p>

<table class="table table-striped">
<thead>
<tr>
    <th>属性</th>
    <th>值</th>
</tr>
</thead>
    <tbody>
    <tr>
        <td><?= $model->getAttributeLabel('title')?></td>
        <td><?= $model->title ?></td>
    </tr>
    <tr>
        <td><?= $model->getAttributeLabel('cate_id')?></td>
        <td><?= $model->cate->title ?></td>
    </tr>
    <tr>
        <td><?= $model->getAttributeLabel('content')?></td>
        <td><?= $model->content ?></td>
    </tr>
    <tr>
        <td><?= $model->getAttributeLabel('title')?></td>
        <td><?= $model->title ?></td>
    </tr>
    </tbody>
</table>
</div>
