<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
date_default_timezone_set('Asia/Tokyo');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'MasterSystem Console',
	'language'=>'ja',
	'sourceLanguage'=>'en',
	// preloading 'log' component
	'preload'=>array('log'),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
		'application.extensions.Excel.*',
		'ext.yii-mail.*'
	),
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'root'
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('localhost','::1'),
		),
		'batch'=>array('class'=>'application.modules.BatchModule'),
		'publish'=>array('class'=>'application.modules.PublishModule'),
	),
	// application components
	'components'=>array(
		'swiftMailer' => array(
				'class' => 'ext.swiftMailer.SwiftMailer',
		),
		'mailler'=>array('class'=>'application.components.Mailler'
		),
		'cf'=>array('class'=>'application.components.CommonFunction'
		),
		'pub'=>array('class'=>'application.components.PubController'
		),
		'oci'=>array('class'=>'application.components.OCIController'
		),
		'ad'=>array('class'=>'application.components.AD'
		),
		'reader'=>array('class'=>'application.components.Reader'
		),
		'writer'=>array('class'=>'application.components.Writer'
		),
		'csvExport'=>array('class'=>'application.components.ECSVExport'
		),
		'user'=>array(
			'class' => 'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'file'=>array(
				'class'=>'application.extensions.file.CFile',
		),
		'empty2null'=>array(
				'class'=>'application.extensions.EmptyNullValidator.EmptyNullValidator',
		),
		'dateFormatter'=>array(
				'class' => 'CDateFormatter',
				'params' => array('en','ja'),
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host='.HOST.';dbname=MS;unix_socket:/var/lib/mysql/mysql.sock',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),
		'cache'=>array(
				'class'=>'CDbCache',
		),
		'oracle'=>array(
				'class'=>'ext.oci8Pdo.OciDbConnection',
				'connectionString'=>'oci:dbname=(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST='.JDE_HOST.')(PORT=1521))(CONNECT_DATA=(SERVICE_NAME='.JDE_SERVICE.')));
				charset=AL32UTF8',
				'username'=>JDE_USER,
    			'password'=>JDE_PASS,
				'schemaCachingDuration'=>3600,
		),	
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
	),
);