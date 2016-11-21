<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/font-awesome-4.7.0/css/font-awesome.css',
//        'static/bootstrap/css/bootstrap.min.css',
//        '//apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js',
        'static/other/animate.min.css',
        'static/metisMenu/metisMenu.min.css',
        'css/style.css',
    ];
    public $js = [
//        '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js',
//        '//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js',
        'static/bootstrap/js/bootstrap.min.js',

//        '//apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js',
        'static/metisMenu/metisMenu.min.js',
        'js/hplus.js',
        'static/other/pace.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}