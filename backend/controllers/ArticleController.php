<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\help\Tools;
use app\models\BlogArticle;

class ArticleController extends BaseController
{
	public function actionIndex(){
		return $this->render('index');
	}
	
	//获取数据
	public function actionGetdata(){
		$objRequest = \Yii::$app->request;
		$strPageIndex = $objRequest->post("Page_Index",0);
		$strPageSize = $objRequest->post("Page_Size",30);
		$strTitle = $objRequest->post("title");
		$strLimit = " LIMIT " .  $strPageSize  . " OFFSET " . $strPageIndex;
		$strWhere = " WHERE 1 = 1 AND del_flag = 0";
		if($strTitle != ""){
			$strWhere .= " AND title = '{$strTitle}'";
		}
		$strQuerySql = "SELECT 
						  article_id,
						  title,
						  author,
						  CASE
						    article_type 
						    WHEN '0' 
						    THEN '日常' 
						    WHEN '1' 
						    THEN '学习' 
						    WHEN '2' 
						    THEN '抽象' 
						  END AS article_type,
						  IF(istop = 1, '是', '否') AS istop,
						  DATE_FORMAT(create_time, '%Y-%m-%d') AS create_time,
						  IF(is_ppt = 1, '是', '否') AS is_ppt 
						FROM
						  `blog_article` 
						{$strWhere}
						{$strLimit}";
		
		$arrData = \Yii::$app->db->createCommand($strQuerySql)->queryAll();
		//总数
		$intDataCount = "";
		$strSql = "SELECT COUNT(1) AS total FROM `blog_article` {$strWhere}";
		$Total = \Yii::$app->db->createCommand($strSql)->queryOne();
		if($Total){
			$intDataCount = $Total["total"];
		}
		
		//返回数据
		Tools::_ajaxReturn([
				"Status"=>1,
				"Data"=>$arrData,
				"Msg"=>"数据获取成功",
				"DataCount"=>$intDataCount
		]);
	}
	
	
	//删除
	public function actionDelete(){
		$objRequest  = \Yii::$app->request;
		$strArticleId = $objRequest->post("article_id","");
		if ($strArticleId == "" || !filter_var($strArticleId, FILTER_VALIDATE_INT)) {
			Tools::_printMessage("error", "参数非法", [Yii::$app->request->referrer] );
		}
		$objState = BlogArticle::updateAll(["del_flag" => 1],["article_id"=>$strArticleId]);
		if($objState){
			Tools::_printMessage("success", "操作成功", ["/article.lx", "article_id" => $strArticleId]);
		}else{
			Tools::_printMessage("error", "操作失败", ["/article.lx"]);
		}
	}
	
	
	//新增，修改
	public function actionEdit(){
		return $this->render("edit");
	}
}