<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\help\Tools;

class BaseController extends Controller{

	public function __construct($id, $module, $config = []){

	    parent::__construct($id, $module, $config);
	    

	    $this->layout = '@app/views/layouts/main.php';

		if(Yii::$app->user->isGuest){
			return $this->redirect(['/site/login']);
		}
	}
}