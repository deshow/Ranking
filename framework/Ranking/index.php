<?php

header('Content-Type: text/html; charset=UTF-8');
defined('YII_LOCAL') or define('YII_LOCAL',true);
//defined('YII_DEV') or define('YII_DEV',true);
// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
