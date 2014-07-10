<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

$backend=dirname(dirname(__FILE__));
$frontend=dirname($backend);
Yii::setPathOfAlias('admin', $backend);

return array(
    'basePath' => $frontend,
	'name'=>'Dishlocate Admin',
    'language' => 'en',

    'controllerPath' => $backend.'/controllers',
    'viewPath' => $backend.'/views',
    'runtimePath' => $backend.'/runtime',

	// preloading 'log' component
	'preload'=>array(
        //'bootstrap',
        'log'
    ),

	// autoloading model and component classes
	'import'=>array(
        'admin.models.*',
        'admin.components.*',
        'application.models.*',
        'application.components.*',
        //'application.extensions.yiifilemanager.*',
        //'application.extensions.yiifilemanagerfilepicker.*',
    ),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		//'gii'=>array(
			//'class'=>'system.gii.GiiModule',
			//'password'=>'venture',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
            //'generatorPaths' => array(
            //    'bootstrap.gii'
            //),
		//),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
            'showScriptName'=>false,
			'urlFormat'=>'path',
            'appendParams'=>false,
			'rules'=>array(
                'admin'=>'index',

                'admin/login'=>'index/login',
                'admin/logout'=>'index/logout',

                'admin/<controller:\w+>'=>'<controller>/admin',
                'admin/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=dishlocate',
			'emulatePrepare' => true,
			'username' => 'dishlocate',
			'password' => 'dishlocate',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'index/error',
		),
        /*
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web content

				array(
					'class'=>'CWebLogRoute',
				),

			),
		),
        */
        //'fileman' => array(
        //    'class'=>'application.extensions.yiifilemanager.YiiDiskFileManager',
        //    'storage_path' => "/var/tmp/fileman",
        //),

        //'bootstrap' => array(
        //    'class' => 'ext.bootstrap.components.Bootstrap',
        //    'responsiveCss' => true,
        //),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'cynthia@stubbycatstudios.com',
        'googleApiKey'=>'AIzaSyAnzttZ0o4bJ9J_tAopV7nJ9qaxXfidMZM',
	),
);