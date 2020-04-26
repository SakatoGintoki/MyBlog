<?php
$params = array_merge ( require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php' );

return [ 
		'id' => 'app-backend',
		'name' => '博客后台管理系统',
		'basePath' => dirname ( __DIR__ ),
		'controllerNamespace' => 'backend\controllers',
		'bootstrap' => [ 
				'log' 
		],
		'defaultRoute'=>'index',
		'modules' => [ ],
		'components' => [ 
				'request' => [ 
						'csrfParam' => '_csrf-backend' 
				],
				'user' => [ 
						'identityClass' => 'common\models\User',
						'enableAutoLogin' => true,
						'identityCookie' => [ 
								'name' => '_identity-backend',
								'httpOnly' => true 
						] 
				],
				'session' => [
						// this is the name of the session cookie used for login on the backend
						'name' => 'advanced-backend' 
				],
				'log' => [ 
						'traceLevel' => YII_DEBUG ? 3 : 0,
						'targets' => [ 
								[ 
										'class' => 'yii\log\FileTarget',
										'levels' => [ 
												'trace',
												'error',
												'warning',
												'info' 
										],
								] 
						],
				],
				'errorHandler' => [ 
						'errorAction' => 'site/error' 
				],
				'urlManager' => require (dirname ( __FILE__ ) . '/url.php'),
				'cache' => require (dirname ( __FILE__ ) . '/cache.php'),
				'db' => require (dirname ( __FILE__ ) . '/database.php'),
				'mongodb' => require (dirname ( __FILE__ ) . '/mongodb.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
		'params' => $params 
];
