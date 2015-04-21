<?php
/*
*调度器
*/
$dispatcher = new dispatcher();
$dispatcher -> dispatching();
class dispatcher
{
	function dispatching()
	{
		//$controller对应文件，action对应文件中的函数
		$controller = isset($_GET['c'])?$_GET['c']:'default';
		$action = isset($_GET['a'])?$_GET['a']:'index';
		//打开文件
		$controllerClass = "controller_$controller";
		include_once(DIR . "/controller/{$controllerClass}.php");
		//实例化类
		if (!class_exists($controllerClass))
		{ 
			exit("ERROR:类 $controllerClass 不存在!<br />");
		}
		$controllerDispatch = new $controllerClass();
		//执行函数
		if(!method_exists($controllerClass,$action))
		{
			exit("ERROR:类 $controllerClass $action 不存在!<br />");
		}
		$controllerDispatch->{$action}();
	}
}
	
/**
 *句柄
 */
 function getSingleton($fileName)
 {
	$File = explode("_",$fileName);
	$op_File = DIR."/{$File[0]}/{$fileName}.php";
	if(file_exists($op_File))
	{
		include_once($op_File);
		return new $fileName();
	}else{
		return false;
	}
 }
 