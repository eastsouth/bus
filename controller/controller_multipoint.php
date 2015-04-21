<?php
class controller_multipoint
{
    /*初始化multipoint页面
     *   
     */
    function multipoint(){
            //实例化数据库操作
            $ms = getSingleton('model_multipoint');
            //获取城市信息
            $cities = $ms->search_tb(city);
            $_SESSION["cities"] = $cities;

            include(DIR.'/view/multipoint.php');
    }

    /*查询城市id
     * 
     */
    function search(){
        $ms = getSingleton('model_multipoint');
        $cities = $_SESSION["cities"];
        $city_name = isset($_GET['info'])?$_GET['info']:-1;

        //根据城市名称获取城市ID
        foreach($cities as $city){
                if($city[city_name] == $city_name){
                        $city_id = $city[city_id];
                }
        }
        $_SESSION["city_id"] = $city_id;
    }
    
    /*查询城市线路ID
     * 
     */
    function search_routeID(){
        $city_id = $_SESSION["city_id"];
        $routes = $ms->search_ctByid(route_id,route,city_id,$city_id);
        $_SESSION["routes"]=$routes;
    }
    
    /*获取城市的站点
     * 
     */
    function getJson(){
        $ms = getSingleton('model_multipoint');
        $stations = array();
        $searchForJson=stripslashes(isset($_GET["searchForJson"])?$_GET["searchForJson"]:-1);
        $city_id = $_SESSION["city_id"];
      
        //查询站点
        $dc="station_name LIKE BINARY '%".$searchForJson."%' and city_id = ".$city_id;
        $stations =$ms->search_sql(station_name,station,$dc);
        
        //判断是否有站点符合
        if(count($stations)==0){
            $_SESSION["m_json"]='[{"station_name":"无此站点"}]';
            exit($_SESSION["m_json"]);
        }else{
            arrayRecursive($stations,'urlencode',true);
            $_SESSION["m_json"] = urldecode(json_encode($stations));
            exit($_SESSION["m_json"]);
        }
    }
}