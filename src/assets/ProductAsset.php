<?php

namespace tubasaygin\products\assets;
use yii\web\AssetBundle;
class ProductAsset extends AssetBundle
{
    // the alias to your assets folder in your file system
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // finally your files.. 
    public $css = [
        'css/site.css',
    ];
    public $js = [
      
    ];
    // that are the dependecies, for makeing your Asset bundle work with Yii2 framework
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
} 

