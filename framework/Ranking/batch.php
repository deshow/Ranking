<?php
//define mode
define('NOMAIL',true);
//mailer 
define('SQEX_SMTP_HOST','10.2.1.131');
define('SQEX_SMTP_PORT',25);
define('SQEX_DOMAIN','jp.co.square-enix.com');

//for test environment
define('JDE_HOST','jp-edc803.jp.co.square-enix.com');
define('JDE_SERVICE','TSJD');
define('JDE_USER','CRPDTA');
define('JDE_PASS','g8AtvLFM');
define('JDE_CTL','CRPCTL');

//for publish environment
define('PUB_HOST','10.15.230.57');
define('PUB_SERVICE','shuppan.world');
define('PUB_USER','shuppan');
define('PUB_PASS','Shuppan%1');

//define('HOST','172.16.59.138');
define('HOST','localhost');

define('ERR_STATUS', 9);
define('OK_STATUS', 2);
define('BAG', 'BAG');

define('GAME_DEP','7300');
define('Z1','Z1');
define('EXMASTER','EXMASTER');
define('PRTN','PRTN');
define('DataSpider','DataSpider');

header('Content-Type: text/html; charset=UTF-8');
defined('YII_LOCAL') or define('YII_LOCAL',true);
//defined('YII_DEV') or define('YII_DEV',true);
// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii.php';
$config=dirname(__FILE__).'/protected/config/console.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createConsoleApplication($config)->run();
