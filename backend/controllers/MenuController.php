<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class MenuController extends BaseController
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}