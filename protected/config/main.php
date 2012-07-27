<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Receipt Tracker',
	'theme'=>'classic',
	'sourceLanguage' => 'en_uk',
	'language' => 'gb',
		
	// preloading 'log' component
	'preload'=>array('log',
					  'bootstrap',),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array('bootstrap.gii',),
		),
		'user'=>array(
				# encrypting method (php hash function)
				'hash' => 'blowfish',
		
				# send activation email
				'sendActivationMail' => true,
		
				# allow access for non-activated users
				'loginNotActiv' => false,
		
				# activate user on registration (only sendActivationMail = false)
				'activeAfterRegister' => false,
		
				# automatically login from registration
				'autoLogin' => true,
		
				# registration path
				'registrationUrl' => array('/user/registration'),
		
				# recovery password path
				'recoveryUrl' => array('/user/recovery'),
		
				# login form path
				'loginUrl' => array('/user/login'),
		
				# page after login
				'returnUrl' => array('/receipt/create'),
		
				# page after logout
				'returnLogoutUrl' => array('/user/login'),
				
				'tableUsers' => 'users',
				'tableProfiles' => 'userprofiles',
				'tableProfileFields' => 'profilefields',
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			# page after login
			'returnUrl' => array('receipt/create'),
		),
		'fixture'=>array(
			'class'=>'system.test.CDbFixtureManager',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=receipttracker',
			'emulatePrepare' => true,
			'username' => 'receipttracker',
			'password' => 'receipttracker',
			'charset' => 'utf8',
			'enableParamLogging'=>true,
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace, info',
					'categories'=>'system.db.*',
				),
				// uncomment the following to show log messages on web pages
				//array(
				//	'class'=>'CWebLogRoute',
				//),
			),
		),
		'bootstrap'=>array(
        	'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
    	),
		'ECSVExport'=>array(
			 'class'=>'ext.ECSVExport.ECSVExport',
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
			// this is used in contact page
			'adminEmail'=>'me@alanhollis.com',
			),
);
