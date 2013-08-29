<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
date_default_timezone_set('Asia/Tokyo');
Yii::setPathOfAlias('park', dirname(__FILE__).'/../extensions/park');
return array(
	'defaultController'=>'site',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Ranking Board',
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
		'chartjs'=>array(
				'class' => 'chartjs.components.ChartJs',
		),
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
		//'coreMessages'=>array('basePath'=>'protected/messages'),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlSuffix'=>'.html',
			'useStrictParsing'=>true,
			//'urlFormat'=>'path',
			//'rules'=>array(
				//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			//),
		),
		*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			//'connectionString' => 'mysql:host=localhost;dbname=ranking;unix_socket:/var/lib/mysql/mysql.sock',
			'connectionString' => 'mysql:host=localhost;dbname=ranking;',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),
		'cache'=>array(
				'class'=>'CDbCache',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CWebLogRoute',
							'levels'=>'info',
							'enabled'=>true,
                            'categories'=>'system.db.CDbCommand.*',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		//below JUI datetime picker
		'widgetFactory' => array(
				'widgets' => array(
						'EJuiTimePicker' => array(
								'options' => array(
										'dateFormat' => 'yy-mm-dd',
										'showOn' => 'both',
										'buttonText' => 'Cal',
										'regional'=>'jp',
										'changeYear'=>'true',
										'yearRange'=>'1901:'.date('Y')."'"
										// Any other option from http://jqueryui.com/demos/datepicker/
										// Or http://trentrichardson.com/examples/timepicker/
								),
								'timeOptions' => array(
										'showOn' => 'focus',
								),
								'htmlOptions' => array(
										'autocomplete' => 'off',
										'size' => 10,
										'maxlength' => 10,
								),
								'timeHtmlOptions' => array(
										'size' => 5,
										'maxlength' => 5,
								),
								'mode' => 'date',
						),
				),
		),
	),
	'behaviors'=>array(
			'onBeginRequest' => array(
					'class' => 'application.components.behaviors.BeginRequest'
			),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
			// this is used in contact page
			'adminEmail'=>'parkkumc@square-enix.com',
			'languages'=>array(
					'en'=>'English',
					'ja'=>'日本語')
	),
);