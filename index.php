<?php
//编码.输出编码,避免中文乱码
header("Content-type:text/html;charset=UTF-8");
//启动session
session_start();
define(DIR,dirname(__FILE__));
//页面全局常量
define("index","<a href=index.php?a=index>普通搜索</a>");
define("zhineng","<a href=index.php?a=zhineng>智能搜索</a>");
define("multipoint","<a href=index.php?c=multipoint&a=multipoint>多点搜索</a>");
//页面基本信息
include(DIR . '/include/inc.inc');
//调度文件
include(DIR . '/include/dispatcher.php');
