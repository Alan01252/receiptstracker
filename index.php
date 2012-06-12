<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../deps/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

date_default_timezone_set('UTC');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',1);

require_once($yii);
Yii::createWebApplication($config)->run();
