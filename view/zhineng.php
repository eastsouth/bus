<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>智能公交管理系统智能模块</title>
<!--
<link type="text/css" href="css/main2.css" rel="stylesheet" />
-->
<style>
#logo_conmain{
width:900px;
height:181px;
background-image:url(images/header.jpg);
}
#main_center{
width:900px;
height:auto;
float:left;
}
#zhineng_shaixuan{
width:569px; height:230px; border-bottom-color:#e3e3e3; 
border-left-color:#e3e3e3; border-right-color:#e3e3e3;
border-top-color:#e3e3e3; border-style:solid; background-color:#f3fbfe;
}
#zhineng_shaixuan_header{
font-size:18px; border-bottom-style:solid;border-bottom-color:#e3e3e3; 
}
#lo_main{
width:900px;
height: auto;
margin:auto;
}
#logo{
width:900px;
height:90px;
background-color:#CCFFFF;
}
#left_div{
width:590px;
height:auto;
float:left;
}
#right_div{
width:300px;
height:auto;
float:right;
}
#right_top_check{
width:270px;
height:102px;
margin-left:10px;
margin-top:10px;
background-image:url(images/left_back_01.png);
}
#right_top_magical{
width:272px;
height:146px;
margin-left:10px;
margin-top:10px;
background-image:url(images/gongjiao_magic.png);
}
#left_top_check{
width:570px;
height:auto;
margin-left:10px;
margin-top:10px;}
#input_data{
width:128px;
height:20px;
color:#333333;
border-top-color:#aaa;
border-right-color:#aaa;
border-bottom-color:#aaa;
border-left-color:#aaa;
border-top-width:1px;
border-right-width:1px;
border-bottom-width:1px;
border-top-width:1px;
border-bottom-style:solid;
border-top-style:solid;
border-left-style:solid;
border-right-style:solid;
}
p{
padding-top:0px;
padding-right:0px;
padding-bottom:0px;
padding-left:0px;
margin-left:0px;
margin-right:0px;
margin-top:0px;
margin-bottom:0px;
border-top-color:currentColor;
border-bottom-color:currentColor;
border-left-color:currentColor;
border-right-color:currentColor;
border-top-width:0px;
border-bottom-width:0px;
border-right-width:0px;
border-left-width:0px;
border-top-style:none;
border-right-style:none;
border-bottom-style:none;
}

body{
text-align:center;
font-size:12px;
font-family:Arial, Helvetica, sans-serif;
font-style:normal;
font-weight:normal;
font-variant:normal;
}

.p01{
padding-top:5px;
}
.m02_left{
line-height:22px;
padding-right:10px;
padding-left:10px;
float:left;}

.cx_info{
width:100px;
padding-top:5px;
padding-right:11px;
padding-bottom:5px;
padding-left:11px;
clear:both;
float:left;
margin-top:3px;
background-attachment:scroll;
background-repeat:repeat-y;
background-position-x:0px;
background-position-y:0px;
background-size:auto;
background-color:transparent;
background-origin:padding-box;
background-clip:border-box;
background-color:transparent;
}
.m02_right{
width:60px;
padding-top:10px;
float:left;
}
#input_love{
background-attachment:scroll;
background:-clip:border-box;
background-color:transparent;
background-image:url(images/picture.png);
background:-origin:padding-box;
background-position-x:0%;
background-position-y:0%;
background-repeat:repeat;
background:-size:auto;
border-bottom-color:currentColor;
border-bottom-style:none;
border-bottom-width:0px;
border-left-color:currentColor;
border-left-style:none;
border-left-width:0px;
border-right-color:currentColor;
border-right-style:none;
border-right-width:0px;
border-top-color:currentColor;
border-top-style:none;
border-top-width:0px;
cursor:pointer;
height:26px;
width:88px;
}
#intput_button{
background-attachment:scroll;
background:-clip:border-box;
background-color:transparent;
background-image:url(images/button_chaxun.png);
background:-origin:padding-box;
background-position-x:0%;
background-position-y:0%;
background-repeat:repeat;
background:-size:auto;
border-bottom-color:currentColor;
border-bottom-style:none;
border-bottom-width:0px;
border-left-color:currentColor;
border-left-style:none;
border-left-width:0px;
border-right-color:currentColor;
border-right-style:none;
border-right-width:0px;
border-top-color:currentColor;
border-top-style:none;
border-top-width:0px;
cursor:pointer;
height:35px;
width:50px;
}
#div_header{
text-align:left;
height:40px;
margin-left:15px;
}
#div_tiaojian{
margin-left:15px;
text-align:left;
}
#menu{
width:628px;
height:30px;
float:left;
padding:3px 0 0 10px;
}
#menu ul{
display:block;
list-style:none;
padding:9px 0 0 10px;
margin:0px;
}
#menu ul li{
display:inline;
padding:0px;
margin:0px;
height:20px;
}
#menu ul li a{
height:27px;
display:block;
padding:0px 10px 0 10px;
margin:0 4px 0 4px;
_margin:0 2px 0 2px;
float:left;
text-decoration:none;
text-align:center;
color:#37728e;
font-size:13px;
line-height:25px;
}
#menu ul li.selected a{
height:27px;
display:block;
padding:0px 10px 0 10px;
margin:0 5px 0 5px;
float:left;
text-decoration:underline;
text-align:center;
color:#37728e;
font-size:13px;
line-height:25px;
}
#menu ul li a:hover{
color:#37728e;
text-decoration:underline;
}

#left_div_check{
width:420px;
height:40px;
float:left;
text-align:center;
margin-left:50px;
}
#left_div_route{
width:560px;
height:auto;
float:left;
min-height:100px;
border-bottom-color:#e3e3e3;
border-left-color:#e3e3e3; 
border-right-color:#e3e3e3; 
border-top-color:#e3e3e3; 
border-style:solid; 
background-color:#f3fbfe;
}
#love{
width:558px;
height:auto;
float:left;
}
#left_div_check_01{
width:280px;
height:130px;
float:left;
}
#left_div_route_name{
width:500px;
height:120px;
float:left;
}
#right_zhineng_check{
width:530px;
height:auto;
float:left;
background-color:#FFFFCC;
border-bottom-color:#e3e3e3; 
border-left-color:#e3e3e3;
border-right-color:#e3e3e3; 
border-top-color:#e3e3e3;
border-style:solid; 
margin-left:10px; 
margin-top:10px;
}
#zhineng_header_00{
font-size:14px;
float:left;
width:350px;
height:auto;
margin-top:30px;
}
#footter{
width:900px;
height:68px;
background-image:url(images/footer_bg.gif);
font-size:14px;
font-weight:bold;
color:#959595;
}
#love_city{
width:80px;
float:left;
margin-top:7px;
margin-right:10px;
text-align:right;
}
#ll_table
{
font-size:13px; 
background-color:#FFFFCC; 
width:538px; 
}
</style>
</head>
<body>
<div id="lo_main">
  <div id="logo_conmain">
    <div id="zhineng_header_00">
        <img src="images/logo.png" />
    </div>
    <div id="menu">
      <ul>
       <li><?php echo index ?></li>
       <li><?php echo zhineng ?></li>
       <li><?php echo multipoint ?></li>
      </ul>
    </div>
  </div>
  
  <div id="main_center">
    <form method="post" name="ll">
  <div id="left_div" > 
<?php
   include(DIR . '/model/model_zhineng.php');
   $mc = new model_zhineng();
   $cities = $mc->search_ctByid(" city_id,city_name "," city ",1,1);
?>
     <div id="left_top_check">
            <!-- 只有按下查询才会出现的部分 -->
<?php
if(isset($_POST['intput_button'])) 
{
  $first_name=$_POST['input_data_01'];
  $last_name=$_POST['input_data_02'];
  $city_id=$_POST['select_city'];
  $_SESSION['city']=$city_id;
  $_SESSION['num']=$_POST['magi'];
  if($first_name!='' && $last_name!='')
  {
?>
        <div id="zhineng_shaixuan">  <br />
            <div id="zhineng_shaixuan_header">
                 <p> <b>智能站点筛选</b></p>
            </div>            <br />
            <div id="left_div_check_01">
                  <img src="images/first_start.png" /><select name="firstplace" size="8" style="width:140px;" >
<?
     $first_lists=$mc->search_sql(" station_id,station_name "," station "," station_name like '%".$first_name."%' and city_id=".$city_id." ");
	 if(isset($first_lists))
	 {
        foreach($first_lists as $first_list){  
?>
		 <option value="<?php echo $first_list[station_id]; ?>"><?php echo $first_list[station_name];?>          </option>
<?   } 
	 }else
	 {
	     echo "<script language='javascript'>alert('没有关于该模糊查询的起始站点，请重新输入..');</script>";
	 }
?>
                   
                   </select>
              </div>
            <div id="left_div_check_01">
                    <img src="images/last_end.png" /><select name="lastplace" size="8"  style="width:140px;" >
<?php
     $last_lists=$mc->search_sql(" station_id,station_name "," station "," station_name like '%".$last_name."%' and city_id=".$city_id." ");
	 if(isset($last_lists))
	 {
	     foreach($last_lists as $last_list)
		 {  echo "<option value='".$last_list[station_id]."'>".$last_list[station_name]."</option>"; }
	 }else
	 {   echo "<script language='javascript'>alert('没有关于该模糊查询的终点站点，请重新输入..');</script>"; }
?>
                   </select>
            </div>
              <br />
            <div style="width:90px; margin-left:210px; height:30px; float:left;">
                 <input name="button_submit" type="submit" value="" id="input_love" />
               </div><br />
        </div>
<?php
  }
  else
  {
      echo "<script language='javascript'>alert('输入错误，请重新输入..');</script>"; 
  }
}
else
{}
if(isset($_POST['button_submit']))
{
    $first_id=$_POST['firstplace'];
	$last_id=$_POST['lastplace'];
	$_SESSION['first']=$first_id;
	$_SESSION['last']=$last_id;
	$first_name1=$mc->search_sql(" station_name "," station "," station_id = ".$first_id." ");
	$last_name1=$mc->search_sql(" station_name "," station "," station_id = ".$last_id." ");
	foreach($first_name1 as $c)    {  $first_name1 = $c[station_name];  }
	foreach($last_name1 as $s)    {  $last_name1 = $s[station_name];  }
	$route_id=$mc->search_sql(" route_id "," routestation "," station_id = ".$first_id." and route_id in (select route_id from routestation where station_id=".$last_id.") ");
}
?>
            <br />
            <div id="left_div_check"><br />
                从<b><font size="+1" color="#000000"><?=$first_name1?></font></b>站到<b><font  size="+1" color="#000000"><?=$last_name1?></font></b>站
            的公交线
            </div>
            <div id="left_div_route">      
<?php
	if(count($route_id))
	{
	  $a=array();
	  $b=array();
	  $c=array();
	  $d=array(); 
	  if($_SESSION['num']==1){    //智能模块1
?>
    <div id="right_zhineng_check">
        <div id="zhineng_header">
           智能选项一：<font color='#FF0000'><b><?=$first_name1?></b></font>到<font color='#FF0000'><b><?=$last_name1?></b></font>最短时间</div>
        <div style="text-align:left;" >
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分析：一个站点到一个站点的最短时间是什么样的概念，是指公交车到达终点两地的时间。可是这公交车到达的时间是没有概念的。所以此次分析的将是经过公交站点的个数越少，就代表时间最短。<br/>
        <table style=" width:163px; float:left; border-bottom-style:ridge; border-left-style:ridge; border-right-style:ridge; border-top-style:ridge; border-bottom-color:#aaa; border-left-color:#aaa; border-right-color:#aaa; border-top-color:#aaa;"><tr><td>公交线路</td><td>经过站点个数</td></tr>
<?
    
      foreach($route_id as $love01_routeid)
	  {
	     echo "<tr>";
	     $sql_name=$mc->search_sql(" route_name "," route " ," route_id=".$love01_routeid[route_id]." ");
		 $first_sequece=$mc->search_sql(" sequence "," routestation "," route_id=".$love01_routeid[route_id]." and station_id=".$_SESSION['first']." ");
		   $last_sequece=$mc->search_sql(" sequence "," routestation "," route_id=".$love01_routeid[route_id]." and station_id=".$_SESSION['last']." ");
		   foreach($first_sequece as $fir)  { $first_sequece=$fir[sequence];   }
		   foreach($last_sequece as $las)  { $last_sequece=$las[sequence];   }
		    $ii=(int)$last_sequece-(int)$first_sequece;
		   if($ii<0) {  $ii=-$ii;  }
		   foreach($sql_name as $name)
		   {
              echo "<td>".$name[route_name]."</td><td>".($ii)."</td>";
			  array_push($a,$name[route_name]);
			  array_push($b,$ii);
		   }
		  echo " </tr> ";
	  }
?>       
      </table>
        </div>
<?    $c=array_combine($a,$b); 
      foreach($c as $key=>$value)
	  { if($value==min($c)){  array_push($d,$key);  }   }
?>
      <div style="float:left; width:350px; text-align:left; size:14px;">
    &nbsp;&nbsp;&nbsp;&nbsp;根据上述得到的结果，可以得到以下结果：<br />&nbsp;&nbsp;&nbsp;&nbsp;经过站点最少的个数：<font color="#FF0000"><b><?=min($c)?></b></font>个。也就是可以这样子说：“从<?=$first_name1?>站点到<?=$last_name1?>站点的最短时间可以乘坐以下公交车：<font color="#FF0000"><b>
	<?  foreach($d as $va){  echo $va."   ";  } ?>” </b></font> 
        </div>
     </div>    
<?       } else if($_SESSION['num']==2)   {  //智能模块2    ?>
    <div id="right_zhineng_check">
        <div  id="zhineng_header">
               智能选项二：<font color='#FF0000'><b><?=$first_name1?></b></font>到<font color='#FF0000'><b><?=$last_name1?></b></font>最经济乘车原则
        </div>
        <div style="text-align:left;" >
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分析：一个站点到一个站点的最经济原则是什么样的概念，是指公交车到达终点两地的所用的价格最少。所以线路的价格。所以此次分析的将是路过两个站点的公交线价格最少，就代表最经济。<br/>
      <table style=" width:163px; float:left; border-bottom-style:ridge; border-left-style:ridge; border-right-style:ridge; border-top-style:ridge; border-bottom-color:#aaa; border-left-color:#aaa; border-right-color:#aaa; border-top-color:#aaa;"><tr><td>公交线路</td><td>线路价格</td></tr>
<?
    
      foreach($route_id as $love01_routeid)
	  {
	     echo "<tr>";
	     $sql_name=$mc->search_sql(" route_name,route_price "," route " ," route_id=".$love01_routeid[route_id]." ");
		   foreach($sql_name as $name)
		   {
              echo "<td>".$name[route_name]."</td><td>".$name[route_price]."</td>";
			  array_push($a,$name[route_name]);
			  array_push($b,$name[route_price]);
		   }
		  echo " </tr> ";
	  }
?>       
      </table>
        </div>
<?    $c=array_combine($a,$b); 
      foreach($c as $key=>$value)
	  { if($value==min($c)){  array_push($d,$key);  }   }
?>
        <div style="float:left;width:350px; text-align:left; size:14px;">
    &nbsp;&nbsp;&nbsp;&nbsp;根据上述得到的结果，可以得到以下结果：<br />&nbsp;&nbsp;&nbsp;&nbsp;公交线路乘坐的价格：<font color="#FF0000"><b><?=min($c)?></b></font>元。也就是可以这样子说：“从<?=$first_name1?>站点到<?=$last_name1?>站点的最少价格可以乘坐以下公交车：<font color="#FF0000"><b><?  foreach($d as $va){  echo $va."   ";  } ?>” </b></font> 
        </div>
     </div>    
<?       } else if($_SESSION['num']==3) {  //智能模块3  ?>
   <div id="right_zhineng_check">
        <div  id="zhineng_header">
              智能选项三：<font color='#FF0000'><b><?=$first_name1?></b></font>到<font color='#FF0000'><b><?=$last_name1?></b></font>最适宜时间原则
        </div>
        <div style="text-align:left;" >
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分析：每一站点在这一天内总会有一个时间点是人流量最少，乘坐的公交最舒服的时间。<br/>
      <table style=" width:163px; float:left; border-bottom-style:ridge; border-left-style:ridge; border-right-style:ridge; border-top-style:ridge; border-bottom-color:#aaa; border-left-color:#aaa; border-right-color:#aaa; border-top-color:#aaa;"><tr><td>公交站点</td><td>站点适合时间</td></tr>
<?
     $first_name2=$mc->search_sql(" station_name,station_goodtime "," station "," station_id = ".$first_id." ");
	 $last_name2=$mc->search_sql(" station_name,station_goodtime  "," station "," station_id = ".$last_id." ");
	 echo "<tr>";
	 foreach($first_name2 as $fir){
	     echo "<td>".$fir[station_name]."</td><td>".$fir[station_goodtime]."</td>";
		 array_push($a,$fir[station_name]);
		 array_push($b,$fir[station_goodtime]);
	 }
	 echo "</tr><tr>";
	 foreach($last_name2 as $las){
	     echo "<td>".$las[station_name]."</td><td>".$las[station_goodtime]."</td>";
		 array_push($a,$fir[station_name]);
		 array_push($b,$fir[station_goodtime]);
	 }
	 echo "</tr>";
?>       
      </table>
        </div>
<?    $c=array_combine($a,$b); 
	  foreach($route_id as $love01_routeid)
	  {
	     $sql_name=$mc->search_sql(" route_name "," route " ," route_id=".$love01_routeid[route_id]." ");
		   foreach($sql_name as $name)
		   {  array_push($d,$name[route_name]);  }
	  }
?>
        <div style="float:left;width:350px; text-align:left; size:14px;">
    &nbsp;&nbsp;&nbsp;&nbsp;根据上述得到的结果，可以得到以下结果：<br />&nbsp;&nbsp;&nbsp;&nbsp;起始站点的适宜时间是：<font color="#FF0000"><b><?=$b[0]?></b></font>。也就是可以这样子说：“从<?=$first_name1?>站点到<?=$last_name1?>站点的最适宜时间可以在这个时间点乘坐以下公交车：在<font color="#FF0000"><b><?=$b[0]?>这个时间乘坐
	<?  foreach($d as $va){  echo $va."   ";  } ?></b></font>” 
     
        </div>
     </div>    
<?       }else if($_SESSION['num']==4){   //第4个智能模块   ?>
    <div id="right_zhineng_check">
        <div  id="zhineng_header">
             智能选项四：<font color='#FF0000'><b><?=$first_name1?></b></font>到<font color='#FF0000'><b><?=$last_name1?></b></font>最舒适乘车
        </div>
        <div style="text-align:left;" >
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分析：一个站点到一个站点的最舒适乘车是什么样的概念，说真的，每个人认为舒适的感觉是什么，说真的，这个舒适的感觉，谁能为所有的人定义一个统一的概念。答案绝对肯定是无。但是可以肯定有空调的公交车和没空调的公交车的舒适程度是不一样的。本次分析将是公交车是否有空调<br/>
      <table style=" width:163px; float:left; border-bottom-style:ridge; border-left-style:ridge; border-right-style:ridge; border-top-style:ridge; border-bottom-color:#aaa; border-left-color:#aaa; border-right-color:#aaa; border-top-color:#aaa;"><tr><td>公交线路</td><td>空调</td></tr>
<?
    
      foreach($route_id as $love01_routeid)
	  {
	     echo "<tr>";
	     $sql_name=$mc->search_sql(" route_name,route_condition "," route " ," route_id=".$love01_routeid[route_id]." ");
		   foreach($sql_name as $name)
		   {
		      $ll="";
		      if($name[route_condition]==1)   $ll="是";
			  else $ll="否";
              echo "<td>".$name[route_name]."</td><td>".($ll)."</td>";
			  array_push($a,$name[route_name]);
			  array_push($b,$ll);
		   }
		  echo " </tr> ";
	  }
?>       
      </table>
        </div>
<?    $c=array_combine($a,$b); 
      foreach($c as $key=>$value){ if($value=="是"){  array_push($d,$key);  }   }
	     if(isset($d)) {
?>
        <div style="float:left;width:350px; text-align:left; size:14px;">
    &nbsp;&nbsp;&nbsp;&nbsp;根据上述得到的结果，可以得到以下结果：<br />&nbsp;&nbsp;&nbsp;&nbsp;有空调的公交线路有<font color="#FF0000"><b><?=count($d)?></b></font>条公交线。也就是可以这样子说：“从<?=$first_name1?>站点到<?=$last_name1?>站点的有空调的公交车如下：<font color="#FF0000"><b><?  foreach($d as $va){  echo $va."   ";  } ?>” </b></font> 
        </div>  
<?
         }
		 else
		 {
?>
      <div style="float:left; text-align:left; size:14px;">
    &nbsp;&nbsp;&nbsp;&nbsp;根据上述得到的结果，可以得到以下结果：<br />&nbsp;&nbsp;&nbsp;&nbsp;有空调的公交线路有<font color="#FF0000"><b><?=count($d)?></b></font>条公交线。也就是可以这样子说：“从<?=$first_name1?>站点到<?=$last_name1?>站点的没有公交车线路有空调。
      </div>     
<? }  ?>
      </div> 
<?
	   }//end智能模块
       echo " <div id='love'> 经过站点的公交线路名称：<font color='#FF0000'><b>";
	     foreach($route_id as $l)
		 {
		    $rout_name=$mc->search_sql(" route_name "," route "," route_id=".$l[route_id]." ");
			foreach($rout_name as $lovename){$rout_name=$lovename[route_name];}
			 echo $rout_name."  ";   
		}
        echo   " </b></font></div> <br/><br/>";	 
	    foreach($route_id as $love)
		{
		    $route_sql=$mc->search_sql(" * "," route "," route_id=".$love[route_id]." ");
			$route_station=$mc->search_sql(" sequence,station_id "," routestation "," route_id=".$love[route_id]."  order by sequence ");
		    echo "<div id='left_div_route_name'> ";
			foreach($route_sql as $route_info)
			{   //循环一个表格
?>
       <table align="left" style="font-size:13px; background-color:#FFFFCC; width:558px; border-bottom-color:#CCCCCC; border-bottom-style:solid; border-left-color:#CCCCCC; border-left-style:solid; border-right-color:#CCCCCC; border-right-style:solid; border-top-style:solid; border-top-color:#CCCCCC;">
       <tr><td width="90px" align="left">公交线路</td><td style="color:#FF0000;"><b><?=$route_info[route_name]?></b></td></tr>
       <tr><td align="left"><img src="images/price.png" />约<?=$route_info[route_price]?>元</td>
           <td align="center">首班时间——末班时间：<?=$route_info[route_StartTime]?>——<?=$route_info[route_EndTime]?></td></tr>
       <tr><td align="left"><img src="images/spendtime.png"/>约<?=$route_info[route_interval]?>分钟</td>
       <td rowspan="2">
<?php
                   foreach($route_station as $route_sta)
				   {
				       $route_love=$mc->search_sql(" station_name,station_goodtime "," station "," station_id=".$route_sta[station_id]." ");
					   foreach($route_love as $route2)
					   {    
		if($route2[station_name]==$first_name1 || $route2[station_name]==$last_name1)
		{ echo "<font color='#FF0000' ><b>";}
					       echo $route2[station_name];
	   if($route2[station_name]==$first_name1 || $route2[station_name]==$last_name1)
	   { echo "</b></font>"; }
						       echo "——";
					   }
				   }
?>
       </td></tr>
       <tr><td align="left"><img src="images/transfer2.png" />空调：
	   <?
	       if($route_info[route_condition]==1)   {  echo "是"; }else  {   echo "否";  }
        ?></td></tr>
       
       </table>
<?php
			}
		    echo "</div>";
		}
	}
	else
	{
	    echo "这两个站点并没有直达的公交车...<br/>";
	}
?>
<?
   $change_route=array();
   if(isset($_POST['button_submit']))
   {
       $first_id=$_POST['firstplace'];
	   $last_id=$_POST['lastplace'];
	   $city_id=$_SESSION['city'];
	   $str_condition1='';
	   $str_condition2='';
	   $e=array();
	   $routes = $mc->search_sql(" route_id,count(*) "," routestation "," station_id in (".$first_id.",".$last_id.")group by route_id having count(*) > 1 ");
	   //如果起点和终点两个站点不是在同一线路
	   if(count($routes)==0)
	   {
?>
           <table align="left">
              <tr align="center">
              <td colspan="2">从<font size="+1" color="#0000FF"><b><?=$first_name1?></b></font>到<font size="+1" color="#0000FF"><b><?=$last_name1?></b></font>的换乘公交车方案</td></tr>
              <tr><td colspan="2">
<?
	      $fsr=0;   $lsr=0;
          //获取有多少路线途经$firstPlace
          $first_station_routes = $mc->search_sql(" route_id "," routestation "," station_id in (SELECT station_id FROM station WHERE station_name='".$first_name1."' ) ");
		  foreach($first_station_routes as $key=>$value)    {$fsr.=','.$value["route_id"]; }
		  //获取有多少路线途径经$lastPlace
          $last_station_routes = $mc->search_sql(" route_id "," routestation "," station_id in (SELECT station_id FROM station WHERE station_name='".$last_name1."') ");
          foreach($last_station_routes as $key=>$value)     { $lsr.=','.$value["route_id"]; }
		 //获取中转站点
          $change_stations = $mc->search_sql("distinct(b.station_id)", "routestation as a,routestation as b ", " a.route_id in (".$fsr.") and b.route_id in(".$lsr.") and a.station_id=b.station_id");
		  $num00=1;
		  if(count($change_stations))
		  {
		  foreach($change_stations as $change_love01)
		  {
	 	   $cs_detail = $mc->search_sql('station_name','station',"station_id=".$change_love01["station_id"]."");
           //起点至中转点的线路
           $fc_routes = $mc->search_sql(" route_id,count(*) "," routestation "," station_id in (".$first_id.",".$change_stations[0]["station_id"].")group by route_id having count(*) > 1 ");
	       $fc_detail = $mc->search_sql(" route_id,route_name,route_price,route_interval,route_condition " , " route " , " city_id = ".$city_id." and route_id in (".$fc_routes[0]["route_id"].")");
           //中转点至终点的线路
           $cl_routes = $mc->search_sql(" route_id,count(*) "," routestation "," station_id in (".$last_id.",".$change_stations[0]["station_id"].")group by route_id having count(*) > 1 ");
	       $cl_detail = $mc->search_sql(" route_id,route_name,route_price,route_interval,route_condition  " , " route " , " city_id = ".$city_id." and route_id in (".$cl_routes[0]["route_id"].")");
           if($fc_detail[0]["route_condition"]==1)   {  $str_condition1="有"; }else  {   $str_condition1="没有";  }
		   if($cl_detail[0]["route_condition"]==1)   {  $str_condition2="有"; }else  {   $str_condition2="没有";  }
		 
		   $change_sequece1=$mc->search_sql(" sequence "," routestation "," route_id=".$fc_routes[0]["route_id"]." and station_id=".$change_love01["station_id"]." ");
		   $change_sequece2=$mc->search_sql(" sequence "," routestation "," route_id=".$fc_routes[0]["route_id"]." and station_id=".$change_love01["station_id"]." ");
		   $first_sequece2=$mc->search_sql(" sequence "," routestation "," route_id=".$fc_routes[0]["route_id"]." and station_id=".$_SESSION['first']." ");
		   $last_sequece2=$mc->search_sql(" sequence "," routestation "," route_id=".$fc_routes[0]["route_id"]." and station_id=".$_SESSION['last']." ");
		   foreach($change_sequece1 as $fir22)  { $change_sequece1=$fir22[sequence];   }
		   foreach($change_sequece2 as $fir23)  { $change_sequece2=$fir23[sequence];   }
		   foreach($first_sequece2 as $fir)  { $first_sequece2=$fir[sequence];   }
		   foreach($last_sequece2 as $las)  { $last_sequece2=$las[sequence];   }
		   $i1=abs((int)$first_sequece2-(int)$change_sequece1);
		   $i2=abs((int)$last_sequece2-(int)$change_sequece2);
?>   
     <div id="ll_table">
<table align="left">
   <tr align="left">
      <td width="50px" align="center">方案<?=$num00?></td>
      <td>搭乘<font color="#FF0000"><b><?=$fc_detail[0]["route_name"]?></b></font>,在<font color="#FF0000" ><b><?=$cs_detail[0]["station_name"]?></b></font>下车后,换乘<b><font color="#FF0000"><?=$cl_detail[0]["route_name"]?></font></b>,就到达<font color="#FF0000"><b><?=$last_name1?></b></font>
      </td></tr>
   
   <tr align="left">
      <td colspan="2">
      <div style="width:160px; float:left;">
      <table bgcolor="#E0FAFC" style=" border-color:#CCCCCC; border-style:solid;">
         <tr><td width="30px">&nbsp;</td><td><?=$fc_detail[0]["route_name"]?></td>
             <td><?=$cl_detail[0]["route_name"]?></td><td>合计</td></tr>
         <tr><td><img src="images/price.png" /></td>
             <td><?=$fc_detail[0]["route_price"]?>元</td> 
             <td><?=$cl_detail[0]["route_price"]?>元</td>
             <td><?=(intval($fc_detail[0]["route_price"])+intval($cl_detail[0]["route_price"])) ?>元</td></tr>
         <tr><td><img src="images/spendtime.png"/></td>
             <td><?=$fc_detail[0]["route_interval"]?>分</td>
             <td><?=$cl_detail[0]["route_interval"]?>分</td>
             <td></td></tr>
         <tr><td><img src="images/transfer2.png" /></td>
             <td><?=$str_condition1?></td>
             <td><?=$str_condition1?></td>
             <td></td></tr>
      </table>
      </div>
      <div style=" float:left; width:360px;border-color:#CCCCCC; border-style:solid; background-color:#E0FAFC; margin-left:1px; min-height:85px;">
      <div style="margin-top:8px;">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;从<font color="#FF0000"><b><?=$first_name1?></b></font>乘坐<font color="#FF0000"><b><?=$fc_detail[0]["route_name"]?></b></font>公交车，差不多经过<font color="#FF0000"><b><?=$i1?></b></font>个站点后在<font color="#FF0000" ><b><?=$cs_detail[0]["station_name"]?></b></font>下车，需要转乘<b><font color="#FF0000"><?=$cl_detail[0]["route_name"]?></font></b>，也就是在<font color="#FF0000" ><b><?=$cs_detail[0]["station_name"]?></b></font>上车，乘坐<b><font color="#FF0000"><?=$cl_detail[0]["route_name"]?></font></b>。大约经过<font color="#FF0000"><b><?=$i2?></b></font>个站点之后，到达想要的站点——<font color="#FF0000"><b><?=$last_name1?></b></font>。
      </div>
      </div>
      </td>
   </tr>
           </table>
     </div>
          <br />
<?	       $num00++;
       }   ?>
        </td></tr>
</table>
<?
	      }  //循环结束
	   }else{
	      
	   }  
   }
?>            

  </div>

</div>
    <!--直达部分结束-->

    </div>
    </form>
    <!--右边的部分-->
    <div id="right_div"> 
    <form method="post">
        <div id="right_top_check">
          <div class="cx_info">
              <b>智&nbsp;能&nbsp;模&nbsp;块</b>
          </div>
          <div id="love_city">
             <select id="se_city" name = "select_city">
                <?php foreach($cities as $city):?>
                <option ID ="city" value="<?=$city[city_id]?>"><?=$city[city_name]?></option>
                <?php endforeach;?>
            </select>
          </div>
           <div class="m02_left">
             <p class="p01"> 出发站：<input type="text" width="128px" name="input_data_01" id="input_data" /></p>
             <p class="p01"> 到达站：<input type="text" width="100px" name="input_data_02" id="input_data" /></p>
           </div>
           <div class="m02_right"> <input name="intput_button" id="intput_button" type="submit" value="" /></div>
        </div>
        <div id="right_top_magical"><!--end of div 'love_city'-->
          <div id="div_header"><br />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;智能模块智能选项</div>
          <div id="div_tiaojian">
          <p class="p01"><input name="magi" type="radio" value="1" checked="checked"/>两地最短时间</p>
          <p class="p01"><input name="magi"  type="radio" value="2"/>两地最经济乘车</p>
          <p class="p01"><input name="magi"  type="radio" value="3"/>两地最适宜时间</p>
          <p class="p01"><input name="magi" type="radio" value="4"/>两地最舒适乘车</p>
          </div>
        </div>
     </form>
    </div>
    <!--右边的部分结束-->
  </div>
</div>
<br /><br />
<div id="footter">
    <br />智能公交管理系统智能模块<br />
    设计者：0940113129 肖佳锋 QQ:1518065221
</div>
</body>
</html>
