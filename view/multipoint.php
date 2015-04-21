<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>智能公交查询系统</title>
<meta name="keywords" content="智能，公交，查询，站点，线路，城市">
<meta name="description" content="全面，快捷，智能的公交查询系统">
<link href="./view/css/jquery_ui/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="JavaScript" src="./view/js/jquery-1.8.3.js"></script>
<script type="text/javascript" language="JavaScript" src="./view/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" language="JavaScript" src="./view/js/multipoint.js"></script>
<script type="text/javascript" language="JavaScript" src="./view/js/jQuery_function.js"></script>
</head>
<body onload="do_ajax('index.php?c=multipoint&a=search&info',document.search.selectCity.options[document.search.selectCity.selectedIndex].text)">
	<div class="main" align="center">
		<span><?php echo index ?></span>
		<span><?php echo zhineng ?></span>
		<span><?php echo multipoint ?></span>
		<form name="search">
			<div>
			城市:
			<select id="selectCityId" name = "selectCity"
			onchange="do_ajax('index.php?c=multipoint&a=search&info',document.search.selectCity.options[document.search.selectCity.selectedIndex].text);">
				<?php foreach($cities as $city):?>
				<option ID ="city" ><?=$city[city_name]?></option>
				<?php endforeach;?>
			</select>
			<input type="text" id="startStationID" name="startStation"
			style="color:#999" value="-出发站点-" onfocus="OnFocusFun(this,'-出发站点-')" onblur="OnBlurFun(this,'-出发站点-')" />
			</div>
			<div>
			<input type="text" id="endStationsID" name="endStations"
			style="color:#999" value="-请输入要去的站点-" onfocus="OnFocusFun(this,'-请输入要去的站点-')" onblur="OnBlurFun(this,'-请输入要去的站点-')" />
			</div>
                        <div>
                            <input type="button" value="输入站点" onclick="addStations(document.search.endStations.value)" />
                            <input type="button" name="deleteStation" value="删除站点" onclick="deleteStations()" />
                        </div>
			要去的站点列表：
                        <div id="StationsID" name="Stations">
			</div>
			<div>
				<input type="button" value="多点有序查询" onclick="mutipointByOredr(document.search.startStation.value)"/>
				<input type="button" value="多点无序查询" onclick="mutipointNotOrder(document.search.startStation.value)"/>
			</div>
		</form>
	</div>
</body>
</html>