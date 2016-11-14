<?php
/* @var $this \yii\web\View */
use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;

/* @var $content string */

$asset = \backend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title><?= Html::encode($this->title) ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
    <?= $this->render('leftMenu', ['baseUrl'=>$baseUrl]) ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <?= $this->render('topBar', ['baseUrl'=>$baseUrl]) ?>
        <section class="dashboard-header">
            <h2><?= $this->title ?> <small><?= $this->title ?></small></h2>
            <?=
            Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'itemTemplate' => '<li><i class="fa fa-dashboard"></i> {link}</li>',
            ]) ?>
        </section>
        <div class="row">
            <?= $this->render('content', ['content'=>$content]) ?>
            <div class="footer">
                <div class="pull-right">
                    By：<a href="http://blog.cupsu.com" target="_blank">JSparrow's blog</a>
                </div>
                <div>
                    <strong>Copyright</strong> Jack&middot;Sparrow &copy; <?= date('Y', time()) ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>