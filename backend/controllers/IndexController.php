<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class IndexController extends BaseController
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}