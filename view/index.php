<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>智能公交查询系统</title>
<meta name="keywords" content="智能，公交，查询，站点，线路，城市">
<meta name="description" content="全面，快捷，智能的公交查询系统">
</head>
<body>
	<div class="main" align=center>
<?php
//引用模块
include(DIR . '/model/model_multipoint.php');
$mc = new model_multipoint();
$cities = $mc->search_ctByid(" city_id,city_name "," city ",1,1);
//获取传递参数
$select_city = isset($_REQUEST['select_city']) ? intval($_REQUEST['select_city']) : 1;
$firstPlace = isset($_REQUEST['firstPlace']) ? mysql_real_escape_string($_REQUEST['firstPlace']) : '';
$lastPlace = isset($_REQUEST['lastPlace']) ? mysql_real_escape_string($_REQUEST['lastPlace']) : '';
$search_routes = isset($_REQUEST['search_routes']) ? mysql_real_escape_string($_REQUEST['search_routes']) : '';
       //获取选择的城市名称
       $cs = $mc->search_sql(" city_name "," city "," city_id = ".$select_city." ");
	   foreach($cs as $c)
		{
		   $sc = $c[city_name];
		}
?>

		<span><?php echo index ?></span>
		<span><?php echo zhineng ?></span>
		<span><?php echo multipoint ?></span>

<?php
$route_ids = '0';
$i = 0;
if ($select_city > 0 && $firstPlace != '' && $lastPlace != '')
{
	   
?>
			<br>
            搜索城市：<?=$sc?> 从 <?=$firstPlace?>  到 <?=$lastPlace?>
<?
	//获取有多少路线途径$firstPlace->$lastPlace
    //从routestation表中查找同时有开始地点和结束地点的线路
    $routes = $mc->search_sql(" route_id,count(*) "," routestation "," station_id in (SELECT station_id FROM station WHERE station_name LIKE  '%".$firstPlace."%' OR station_name LIKE  '%".$lastPlace."%') group by route_id having count(*) > 1 ");
	 foreach($routes as $route)
	{
	   $route_ids .= ','.intval($route[route_id]);
	}

	   //获取这些线路的详细信息循环展示
	   $details = $mc->search_sql(" route_id,route_name,route_StartTime,route_EndTime,route_interval,route_condition,route_price "," route ","  city_id = ".$select_city." and route_id in (".$route_ids.") ");
	 foreach($details as $detail)
	{
		 $i++;
		 //展示该线路的途径点
	     $rds = $mc->search_sql(" station_name,station_goodtime "," routestation a,station b ","  a.route_id = ".intval($detail[route_id])." and a.station_id = b.station_id order by 'sequence'  ");
?>

<table width="923" border="0">

						<tr style="font-size: 14px; color: #00000;" align="left">
                            <td  style="padding-right: 10px; width: 215px;" align="left">
                                <img style="margin-bottom: 4px; vertical-align: middle;"
                                     title="票价" src="https://svn.sinaapp.com/busss/2/bus/images/price.png" />&nbsp;<b>约<?=$detail[route_price]?>元</b>&nbsp;
                                <img style="margin-bottom: 4px; vertical-align: middle;"
                                     alt="间隔时间:" title="耗时" src="https://svn.sinaapp.com/busss/2/bus/images/spendtime.png" />&nbsp;<b>约<?=$detail[route_interval]?>分钟</b>&nbsp;<img
                                    style="margin-bottom: 4px; vertical-align: middle;" alt="是否空调"
                                    title="是否空调" src="/images/transfer2.png" />&nbsp;<b>
                                <?
									if ($detail[route_condition]==1)
									{
									    echo '是';
									}
								    else
									{
										echo '否';
									}
								?></b>&nbsp;</td>
							<td align="center" colspan=2 style="padding: 5px 10px 10px 10px; line-height: 150%">
							    <table>
								<tr>
									<td width="245" style="line-height: 23px; font-size: 14px;"><b><font
										color="#000">&nbsp;<?=$i?>.</font></b><img
										title="公交方案"
										style="margin-bottom: 4px; vertical-align: middle;"
										src="/images/planmode-1.gif" /> <?=$detail[route_name]?></td>

									<td width="945px" align="center">首班时间： <?=$detail[route_StartTime]?>  末班时间：<?=$detail[route_EndTime]?></td>
									<td width="945px" align="center">途经站点：
									 <?=$firstPlace?>  到 <?=$lastPlace?><br>
									<?
									$j = 0;
									$fl = false;
                                    $ll = false;
									foreach($rds as $rd)
	                                {
                                        if (stristr($rd[station_name],$firstPlace) || stristr($rd[station_name],$lastPlace) || ($ll == false && $j > 0) || ($fl == false && $j > 0))
										{
										  if (stristr($rd[station_name],$firstPlace)) $fl = true;
                                          if (stristr($rd[station_name],$lastPlace)) $ll = true;
										  if ($j > 0) echo '  --  '.$rd[station_name];
										  else  echo $rd[station_name];     
									      $j++;
										}
									}
									?>
									</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>

						</tr>
					</table>

<?php
	
	}

    //如果一次换乘可以到达目的地
	if ($i == 0)
	{
            $fp_s = '0';
			//获取有多少路线途径经$firstPlace
			$fps = $mc->search_sql(" route_id "," routestation "," station_id in (SELECT station_id FROM station WHERE station_name LIKE  '%".$firstPlace."%' ) ");
			 foreach($fps as $fp)
			{
			   $fp_s .= ','.intval($fp[route_id]);
			}

            $lp_s = '0';
			//获取有多少路线途径经$lastPlace
			$lps = $mc->search_sql(" route_id "," routestation "," station_id in (SELECT station_id FROM station WHERE station_name LIKE  '%".$lastPlace."%' ) ");
			 foreach($lps as $lp)
			{
			   $lp_s .= ','.intval($lp[route_id]);
			}

            //找出需要转乘的路线
			$fp_s_1 = '0';
	        $details = $mc->search_sql(" distinct(a.route_id) "," routestation a,routestation b "," a.route_id in (".$fp_s.") and a.station_id = b.station_id and b.route_id in (".$lp_s.") ");
			 foreach($details as $detail)
				{
				     $fp_s_1 .= ','.intval($detail[route_id]);
                }


            //找出需要转乘的路线
			$lp_s_1 = '0';
	        $details = $mc->search_sql(" distinct(b.route_id) "," routestation a,routestation b "," a.route_id in (".$fp_s.") and a.station_id = b.station_id and b.route_id in (".$lp_s.") ");
			 foreach($details as $detail)
				{
				     $lp_s_1 .= ','.intval($detail[route_id]);
                }


					  //转乘线路
					  $details = $mc->search_sql(" route_id,route_name,route_StartTime,route_EndTime,route_interval,route_condition,route_price "," route ","  city_id = ".$select_city." and route_id in (".$fp_s_1.") ");
						 foreach($details as $detail)
						{
							 $i++;
							 $rds = $mc->search_sql(" station_name,station_goodtime "," routestation a,station b ","  a.route_id = ".intval($detail[route_id])." and a.station_id = b.station_id order by 'sequence'  ");



					  //转乘线路
					  $change_details = $mc->search_sql(" route_id,route_name,route_StartTime,route_EndTime,route_interval,route_condition,route_price "," route ","  city_id = ".$select_city." and route_id in (".$lp_s_1.") ");
						 foreach($change_details as $change_detail)
						{
							 $i++;
							 $change_rds = $mc->search_sql(" station_name,station_goodtime "," routestation a,station b ","  a.route_id = ".intval($change_detail[route_id])." and a.station_id = b.station_id order by 'sequence'  ");
?>

<table width="923" border="0">
						<tr>

							<td style="padding-right: 10px" align="left">
								<img style="margin-bottom: 4px; vertical-align: middle;"
									title="票价" src="/images/price.png" />&nbsp;<b>约<?=$detail[route_price]?>元</b>&nbsp;
								<img style="margin-bottom: 4px; vertical-align: middle;"
									alt="间隔时间:" title="耗时" src="/images/spendtime.png" />&nbsp;<b>约<?=$detail[route_interval]?>分钟</b>&nbsp;<img
								style="margin-bottom: 4px; vertical-align: middle;" alt="是否空调"
								title="是否空调" src="/images/transfer2.png" />&nbsp;<b>
								<? 
									if ($detail[route_condition]==1) 
									{
									    echo '是';
									} 
								    else 
									{
										echo '否';
									} 
								?></b>&nbsp;</td>
						</tr>
						<tr style="font-size: 14px; color: #00000; width: 215px;" align="left">
                            <td valign="middle" style="padding-right: 10px" align="center">
                                <img style="margin-bottom: 4px; vertical-align: middle;"
                                     title="票价" src="/images/price.png" />&nbsp;<b>约<?=$detail[route_price]?>元</b>&nbsp;
                                <img style="margin-bottom: 4px; vertical-align: middle;"
                                     alt="间隔时间:" title="耗时" src="/images/spendtime.png" />&nbsp;<b>约<?=$detail[route_interval]?>分钟</b>&nbsp;<img
                                    style="margin-bottom: 4px; vertical-align: middle;" alt="是否空调"
                                    title="是否空调" src="/images/transfer2.png" />&nbsp;<b>
                                <?
									if ($detail[route_condition]==1)
									{
									    echo '是';
									}
								    else
									{
										echo '否';
									}
								?></b>&nbsp;</td>
							<td colspan=2
								style="padding: 5px 10px 10px 10px; line-height: 150%">
							<table>
								<tr>
									<td width="245" style="line-height: 23px; font-size: 14px;"><b><font
										color="#000">&nbsp;<?=$i?>.</font></b><img
										title="公交方案"
										style="margin-bottom: 4px; vertical-align: middle;"
										src="/images/planmode-1.gif" /> <?=$detail[route_name]?> 换乘 <?=$change_detail[route_name]?></td>

									<td width="945px" align="center">首班时间： <?=$detail[route_StartTime]?>  末班时间：<?=$detail[route_EndTime]?></td>
									<td width="945px" align="center">途经站点：
									<?
									$j = 0;
									foreach($rds as $rd)
	                                {
										if ($j > 0) echo '  --  '.$rd[station_name];
										else  echo $rd[station_name];             
									$j++;
									}
									?>
                                    <br>
                                    换乘
									<?
									$j = 0;
									foreach($change_rds as $rd)
	                                {
										if ($j > 0) echo '  --  '.$rd[station_name];
										else  echo $rd[station_name];             
									$j++;
									}
									?>
									</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>

						</tr>
					</table>

<?php
						}
	}

	}

	if ($i == 0) echo '<br><br>搜查不到匹配的站点<br><a href="index.php">返回</a>';
}
elseif ($select_city > 0 && $search_routes != '')
{
     $details = $mc->search_sql(" route_id,route_name,route_StartTime,route_EndTime,route_interval,route_condition,route_price "," route ","  city_id = ".$select_city." and route_name like '%".$search_routes."%' ");
	 foreach($details as $detail)
	 {
		         $i++;
		 	     $rds = $mc->search_sql(" station_name,station_goodtime "," routestation a,station b ","  a.route_id = ".intval($detail[route_id])." and a.station_id = b.station_id order by 'sequence'  ");
?>

<table width="923" border="0">

						<tr style="font-size: 14px; color: #00000;" align="left">
                            <td  style="padding-right: 10px;width: 215px;" align="left">
                                <img style="margin-bottom: 4px; vertical-align: middle;"
                                     title="票价" src="/images/price.png" />&nbsp;<b>约<?=$detail[route_price]?>元</b>&nbsp;
                                <img style="margin-bottom: 4px; vertical-align: middle;"
                                     alt="间隔时间:" title="耗时" src="/images/spendtime.png" />&nbsp;<b>约<?=$detail[route_interval]?>分钟</b>&nbsp;<img
                                    style="margin-bottom: 4px; vertical-align: middle;" alt="是否空调"
                                    title="是否空调" src="/images/transfer2.png" />&nbsp;<b>
                                <?
									if ($detail[route_condition]==1)
									{
									    echo '是';
									}
								    else
									{
										echo '否';
									}
								?></b>&nbsp;</td>
							<td colspan=2
								style="padding: 5px 10px 10px 10px; line-height: 150%" align="center">
							<table>
								<tr>
									<td width="245" style="line-height: 23px; font-size: 14px;"><img
										title="公交方案"
										style="margin-bottom: 4px; vertical-align: middle;"
										src="/images/planmode-1.gif" /> <?=$detail[route_name]?></td>

									<td width="945px" align="center">首班时间： <?=$detail[route_StartTime]?>  末班时间：<?=$detail[route_EndTime]?></td>
									<td width="945px" align="center">途经站点：
									<?
									$j = 0;
									foreach($rds as $rd)
	                                {
										if ($j > 0) echo '  --  '.$rd[station_name];
										else  echo $rd[station_name];             
									$j++;
									}
									?>
									</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>

						</tr>
					</table>

<?php
	
	}
	if ($i == 0) echo '<br><br>搜查不到匹配的线路<br><a href="index.php">返回</a>';

}
else
{
?>
		<form>
            城市:
            <select id="se_city" name = "select_city">
			<!--  onchange="do_ajax(document.search.select_city.options[document.search.select_city.selectedIndex].text)" -->
                <?php foreach($cities as $city):?>
                <option ID ="city" value="<?=$city[city_id]?>"><?=$city[city_name]?></option>
                <?php endforeach;?>
            </select>
			<input type="text" name="firstPlace">
			到
			<input type="text" name="lastPlace">
			<input type="submit" value="搜索">
		</form>
		<form action="index.php?action=l">
            城市:
            <select id="se_city" name = "select_city">
                <?php foreach($cities as $city):?>
                <option ID ="city" value="<?=$city[city_id]?>"><?=$city[city_name]?></option>
                <?php endforeach;?>
            </select>
			<input type="text" name="search_routes">
			<input type="submit" value="搜索">
		</form>
<?
}						
?>
	</div>
</body>
</html>