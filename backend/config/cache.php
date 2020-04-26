<?php
//��������
if (defined('YII_ENV') && YII_ENV == 'prod') {
	return [
		'class' => 'yii\caching\MemCache',
		'servers' => [
			[
				'host'         => '127.0.0.1',
                'port'         => 11211,
			],
		],
		'useMemcached' => false,
		'keyPrefix'    => 'blog.com',
	];
}
//��������
else if (defined('YII_ENV') && YII_ENV == 'dev') {
	return [
		'class' => 'yii\caching\MemCache',
		'servers' => [
			[
				'host'         => '127.0.0.1',
                'port'         => 11211,
			],
		],
		'useMemcached' => false,
		'keyPrefix'    => 'blog.com',
	];
}
else if (defined('YII_ENV') && YII_ENV == 'test') {
	return [
		'class' => 'yii\caching\MemCache',
		'servers' => [
			[
				'host'         => '127.0.0.1',
                'port'         => 11211,
			],
		],
		'useMemcached' => false,
		'keyPrefix'    => 'blog.com',
	];
}