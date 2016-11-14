<?php
/**
 *
 * User: JSparrow
 * DateTime: 2016/11/11 10:46
 * Created by PhpStorm.
 */

namespace backend\assets;


use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/font-awesome-4.7.0/css/font-awesome.css',
        'static/bootstrap/css/bootstrap.min.css',
        'static/other/animate.min.css',
        'css/style.css',
    ];
    public $js = [
        'static/bootstrap/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

}