<?php
//��������
if (defined('YII_ENV') && YII_ENV == 'prod') {
	return [
		'class'  => 'EMongoClient',
    	'server' => 'mongodb://127.0.0.1:27017',
    	'db'     => 'blog',
	];
}
//��������
else if (defined('YII_ENV') && YII_ENV == 'dev') {
	return [
		'class'  => 'EMongoClient',
    	'server' => 'mongodb://127.0.0.1:27017',
    	'db'     => 'blog',
	];
}
else if (defined('YII_ENV') && YII_ENV == 'test') {
	return [
		'class'  => 'EMongoClient',
    	'server' => 'mongodb://127.0.0.1:27017',
    	'db'     => 'blog',
	];
}