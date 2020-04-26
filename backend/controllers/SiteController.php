<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\help\Tools;

/**
 * 用户认证控制器
 * Author：李旭
 * DESC：新建		
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderPartial('login');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack("/index.lx");
        } else {
            $model->password = '';
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->redirect("/site/index");
    }
    
    
    public function actionError(){
    	$code = 404;
		$msg = 'Page Not Found';
		
		$error = Yii::$app->errorHandler->exception;
		if ($error) {
			$code = $error->getCode ();
			$msg = $error->getMessage ();
			$file = $error->getFile ();
			$line = $error->getLine ();
			
			$err_msg = $msg . " [file: {$file}][line: {$line}][err code:$code.][url:{$_SERVER['REQUEST_URI']}][post:" . http_build_query ( $_POST ) . "]";
		}
    	return $this->render("error", ["msg" => $msg]);
    }
    
    public function actionNoauth(){
    	return $this->render("noauth");
    }
}
