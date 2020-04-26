<?php
if(defined('YII_ENV') && YII_ENV == 'prod'){
	return [
		'class'    => 'yii\db\Connection',
		'masters' => [ //主库列表  配置单项
				['dsn' => 'mysql:host=127.0.0.1;dbname=blog',],
		],
		'masterConfig' => [ //主库通用配置
				'username' => 'root',
				'password' => 'root',
				'charset'  => 'utf8',
				'attributes' => [
						PDO::ATTR_TIMEOUT => 5
				]
		],
		'slaves' => [ //从库列表  配置单项
				['dsn' => 'mysql:host=127.0.0.1;dbname=blog',],
		],
		'slaveConfig' => [ //从库通用配置
				'username' => 'root',
				'password' => 'root',
				'charset'  => 'utf8',
				'attributes' => [
						PDO::ATTR_TIMEOUT => 10
				]
		],
	];
}
//��������
else if(defined('YII_ENV') && YII_ENV == 'dev'){
	return [
		'class'    => 'yii\db\Connection',
		'masters' => [ //主库列表  配置单项
			['dsn' => 'mysql:host=127.0.0.1;dbname=blog',],
		],
		'masterConfig' => [ //主库通用配置
			'username' => 'root',
			'password' => 'root',
			'charset'  => 'utf8',
			'attributes' => [
				PDO::ATTR_TIMEOUT => 5
			]
		],
		'slaves' => [ //从库列表  配置单项
			['dsn' => 'mysql:host=127.0.0.1;dbname=blog',],
		],
		'slaveConfig' => [ //从库通用配置
			'username' => 'root',
			'password' => 'root',
			'charset'  => 'utf8',
			'attributes' => [
				PDO::ATTR_TIMEOUT => 10
			]
		],
	];
}
//��������
else if(defined('YII_ENV') && YII_ENV == 'test'){
	return [
		'class'    => 'yii\db\Connection',
		'masters' => [ //主库列表  配置单项
			['dsn' => 'mysql:host=127.0.0.1;dbname=blog',],
		],
		'masterConfig' => [ //主库通用配置
			'username' => 'root',
			'password' => 'root',
			'charset'  => 'utf8',
			'attributes' => [
				PDO::ATTR_TIMEOUT => 5
			]
		],
		'slaves' => [ //从库列表  配置单项
			['dsn' => 'mysql:host=127.0.0.1;dbname=blog',],
		],
		'slaveConfig' => [ //从库通用配置
			'username' => 'root',
			'password' => 'root',
			'charset'  => 'utf8',
			'attributes' => [
				PDO::ATTR_TIMEOUT => 10
			]
		],
	];
}