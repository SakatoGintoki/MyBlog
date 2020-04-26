<?php
namespace common\help;

use yii;


class Tools{
	/**
	 * 生成后台加密密码
	 * @Param 账户名，密码
	 * @return 加密后的字符串
	 */
	public static function getBackendPassWD($strRandomKey, $strPassword) {
		return strtoupper(md5 ( $strRandomKey . $strPassword ));
	}
	
	/**
	 * 获取随机码
	 */
	public static function _getRandomString($intLength, $strType='C')
	{
		$arrChars = array();
		if ($strType == "N") {             //获取数字随机码
			$arrChars = array( "0", "1", "2","3", "4", "5", "6", "7", "8", "9");
		} else if ($strType == "S") {    //获取字母随机码
			$arrChars = array(
					"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
					"l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
					"w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
					"H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
					"S", "T", "U", "V", "W", "X", "Y", "Z");
		} else if ($strType == "C") {    //获取数字+字母随机码
			$arrChars = array(
					"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
					"l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
					"w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
					"H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
					"S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
					"3", "4", "5", "6", "7", "8", "9");
		}
		$intCharsLen = count($arrChars) - 1;
		shuffle($arrChars);// 将数组打乱
		$output = "";
		for ($i=0; $i<$intLength; $i++)
		{
		$output .= $arrChars[mt_rand(0, $intCharsLen)]; //获得一个数组元素
		}
		return $output;
	}
	
	
	/**
	 * 输出Ajax格式数据
	 * @Params
	 */
	public static function _ajaxReturn($arrData,$strType='') {
		if(empty($strType)) $strType  =   "JSON";
		switch (strtoupper($strType)){
			case 'JSON' :
				// 返回JSON数据格式到客户端 包含状态信息
				header('Content-Type:application/json; charset=utf-8');
				exit(json_encode($arrData));
			case 'XML'  :
				// 返回xml格式数据
				header('Content-Type:text/xml; charset=utf-8');
				exit(xml_encode($arrData));
			case 'JSONP':
				// 返回JSON数据格式到客户端 包含状态信息
				header('Content-Type:application/json; charset=utf-8');
				$handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
				exit($handler.'('.json_encode($arrData).');');
			case 'EVAL' :
				// 返回可执行的js脚本
				header('Content-Type:text/html; charset=utf-8');
				exit($arrData);
		}
	}
	
	
	
	
	/*
	 * 输出flash信息
	 * @Params 消息类型，消息内容，跳转地址
	 * */
	public static function _printMessage($strType = "success", $strMessage = "", $arrParams = []){
		if(Yii::$app->request->isAjax){
			self::_ajaxReturn(["Status" => (strtolower($strType) == "success" ? 1 : 0), "Msg" => $strMessage]);
		}else{
			Yii::$app->session->setFlash($strType, $strMessage);
			if(!$arrParams){
				$arrParams = Yii::$app->request->referrer;
			}
			Yii::$app->controller->redirect($arrParams);
			Yii::$app->end();
		}
	}
	
	
	/**
	 * 获得当前时间
	 */
	public static function _getNowTime(){
		return date("Y-m-d H:i:s");
	}
	
}

