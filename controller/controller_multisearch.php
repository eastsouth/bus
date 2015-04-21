<?php
class controller_multisearch{
    /*多点查询
     * 
     */
    function multisearch(){
        include(DIR.'/view/multisearch.php');
        
        $first_station=isset($_GET['firststation'])?$_GET['firststation']:-1;
        $stations = isset($_GET['stations'])?$_GET['stations']:-1;

        $multi = isset($_GET['multi'])?$_GET['multi']:-1;
        if($first_station == -1 || $stations == -1 || $multi == -1){
            echo '初始站点：'.$first_station.'目的站点:'.$stations.'查询方式：'.$multi;
            exit('please input right stations');
        }
        $stations = explode(';',$stations);
        array_pop($stations);

        $city_id = $_SESSION['city_id'];

        switch ($multi){
            case 1:self::mutipointByOredr(intval($city_id),$stations,$first_station);//有序
                break;
            case 2:self::mutipointNotOrder(intval($city_id),$stations,$first_station);//无序
                break;
            default :
                exit('error');
        }
        
        echo '<input type="button" name="Submit" onclick="javascript:history.back(-1);" value="返回上一页">';
    }

    /*获取开始站点至终点站点的距离及线路ID
     * 
     */
    function mutilRoutes($routes,$first_stationid,$last_stationid){
        $ms = getSingleton('model_multipoint');

        foreach($routes as $key => $route){
            $first_station_sequence = $ms->search_sql("sequence,route_id","routestation","route_id in (".intval($route[route_id]).") and station_id=(".intval($first_stationid[0][station_id]).")");
            $last_station_sequence = $ms->search_sql("sequence,route_id","routestation","route_id in (".intval($route[route_id]).") and station_id=(".intval($last_stationid[0][station_id]).")");
            //两站点的距离
            $a =  abs(intval($last_station_sequence[0][sequence]) - intval($first_station_sequence[0][sequence]));
            $array[$route[route_id]] = $a;
        }
        return $array;
    }
    
    /* 筛选最短路线
     * $array 途径站点
     * return intval($short_routeid) 最短线路ID $number 途径站点
     */
    function shortRouteId($array){
        $number=0;//途径站点数目
        $short_routeid = -1;
        foreach ($array as $key=>$value){
            if($number==0){
                $number=$value;
                $short_routeid = $key;
            }
            if($number>$value){
                $number=$value;
                $short_routeid = $key;
            }
        }
        return array(intval($short_routeid),$number);
    }
    
    /*公交线路有序查询
     * 
     */
    function mutipointByOredr($city_id,$stations,$first_station){
        $ms = getSingleton('model_multipoint');
        $short_routeid = '';
        $number = '';
        $last_station ='';
        $array = array();

        foreach ($stations as $key => $value ){
            $last_station = $value;
            
            $first_stationid=$ms->search_sql("station_id","station","station_name LIKE  '%".$first_station."%'");
            $last_stationid=$ms->search_sql("station_id","station","station_name LIKE  '%".$last_station."%'");
            
            //从routestation表中查找同时有开始地点和结束地点的线路
            $routes = $ms->search_sql(" route_id,count(*) "," routestation "," station_id in (".intval($first_stationid[0][station_id]).",".intval($last_stationid[0][station_id]).")group by route_id having count(*) > 1 ");

            //如果起点和终点两个站点不是在同一线路
            if(count($routes)==0){
                $fsr=0;
                $lsr=0;
                //获取有多少路线途经$firstPlace
                $first_station_routes = $ms->search_sql(" route_id "," routestation "," station_id in (SELECT station_id FROM station WHERE station_name LIKE  '%".$first_station."%' ) ");
                foreach($first_station_routes as $key=>$value){
                    $fsr.=','.$value["route_id"];
                }
                //获取有多少路线途径经$lastPlace
                $last_station_routes = $ms->search_sql(" route_id "," routestation "," station_id in (SELECT station_id FROM station WHERE station_name LIKE  '%".$last_station."%' ) ");
                foreach($last_station_routes as $key=>$value){
                    $lsr.=','.$value["route_id"];
                }
                //获取中转站点
                $change_stations = $ms->search_sql("distinct(b.station_id)", "routestation as a,routestation as b ", " a.route_id in (".$fsr.") and b.route_id in(".$lsr.") and a.station_id=b.station_id");
                $cs_detail = $ms->search_sql('station_name','station',"station_id=".$change_stations[0]["station_id"]."");
                //起点至中转点的线路
                $fc_routes = $ms->search_sql(" route_id,count(*) "," routestation "," station_id in (".$first_stationid[0][station_id].",".$change_stations[0]["station_id"].")group by route_id having count(*) > 1 ");
                $fc_detail = $ms->search_sql("route_id,route_name" , "route" , "city_id = ".intval($city_id)." and route_id in (".intval($fc_routes[0]["route_id"]).")");
                //中转点至终点的线路
                $cl_routes = $ms->search_sql(" route_id,count(*) "," routestation "," station_id in (".intval($last_stationid[0][station_id]).",".$change_stations[0]["station_id"].")group by route_id having count(*) > 1 ");
                $cl_detail = $ms->search_sql("route_id,route_name" , "route" , "city_id = ".intval($city_id)." and route_id in (".intval($cl_routes[0]["route_id"]).")");
                
                echo $first_station.'--->搭乘'.$fc_detail[0][route_name].'--->'.$cs_detail[0]["station_name"].'--->换乘'.$cl_detail[0]["route_name"].'--->'.$last_station.'。<br/>';
            }else{
                $array = self::mutilRoutes($routes,$first_stationid,$last_stationid);

                if(count($routes)>1){
                    $ar = self::shortRouteId($array);
                    $short_routeid = $ar[0];
                    $number = $ar[1];
                }else{
                    $short_routeid = key($array);
                    $number = $array[$short_routeid];
                }
                
                //从route表获取这些线路的详细信息循环展示
               $route_detail = $ms->search_sql("route_id,route_name" , "route" , "city_id = ".intval($city_id)." and route_id in (".intval($short_routeid).")");
               ;echo $first_station.'--->搭乘'.$route_detail[0][route_name].'--->'.$last_station.'途经'.$number.'个站点。<br/>';
            }
           $first_station = $last_station;
        }
    }
    
    /*多点无序查询
     * 
     */
    function mutipointNotOrder($city_id,$stations,$first_station){
        $ms = getSingleton('model_multipoint');
        $last_station = '';
        $array = array();
        $routeQuantity = count($stations);
        $compareStation = '';
        $compareArray = array();

        //筛选一条线路到达的站点
        for($x=0; $x < $routeQuantity; $x++){
            $first_stationid = $ms->search_sql("station_id","station","station_name LIKE  '%".$first_station."%'");
            $compareStation = $first_station;
            foreach($stations as $key => $value){
                $last_station = $value;
                $last_stationid = $ms->search_sql("station_id","station","station_name LIKE  '%".$last_station."%'");

                //从routestation表中查找同时有开始地点和结束地点的线路
                $routes = $ms->search_sql(" route_id,count(*) "," routestation "," station_id in (".intval($first_stationid[0][station_id]).",".intval($last_stationid[0][station_id]).")group by route_id having count(*) > 1 ");
                if(count($routes)==0){
                    continue;
                }else{
                    $array = self::mutilRoutes($routes,$first_stationid,$last_stationid);
                    if(count($routes)>1){
                        $ar = self::shortRouteId($array);
                        $short_routeid = $ar[0];
                        $number = $ar[1];
                    }else{
                        $short_routeid = key($array);
                        $number = $array[$short_routeid];
                    }
                    
                    //从route表获取这些线路的详细信息循环展示
                    $route_detail = $ms->search_sql("route_id,route_name" , "route" , "city_id = ".intval($city_id)." and route_id in (".intval($short_routeid).")");
                    echo $first_station.'--->搭乘'.$route_detail[0][route_name].'--->'.$last_station.'途经'.$number.'个站点。<br/>';
                    $first_station = $last_station;
                    array_splice($stations, $key, 1);
                    break;
                }
            }
            if($compareStation == $first_station){
                $last_station = $stations[0];
                $last_stationid=$ms->search_sql("station_id","station","station_name LIKE  '%".$last_station."%'");

                //如果起点和终点两个站点不是在同一线路
                $fsr=0;
                $lsr=0;
                //获取有多少路线途经$firstPlace
                $first_station_routes = $ms->search_sql(" route_id "," routestation "," station_id in (SELECT station_id FROM station WHERE station_name LIKE  '%".$first_station."%' ) ");
                foreach($first_station_routes as $key=>$value){
                    $fsr.=','.$value["route_id"];
                }
                //获取有多少路线途径经$lastPlace
                $last_station_routes = $ms->search_sql(" route_id "," routestation "," station_id in (SELECT station_id FROM station WHERE station_name LIKE  '%".$last_station."%' ) ");
                foreach($last_station_routes as $key=>$value){
                    $lsr.=','.$value["route_id"];
                }
                //获取中转站点
                $change_stations = $ms->search_sql("distinct(b.station_id)", "routestation as a,routestation as b ", " a.route_id in (".$fsr.") and b.route_id in(".$lsr.") and a.station_id=b.station_id");
                if($change_stations == NULL) exit($first_station.'无法找到路线，换乘过多或无法到达');
                $cs_detail = $ms->search_sql('station_name','station',"station_id=".$change_stations[0]["station_id"]."");
                //起点至中转点的线路
                $fc_routes = $ms->search_sql("route_id,count(*)"," routestation "," station_id in (".intval($first_stationid[0][station_id]).",".intval($change_stations[0]["station_id"]).")group by route_id having count(*) > 1 ");
                $fc_detail = $ms->search_sql("route_id,route_name" , "route" , "city_id = ".intval($city_id)." and route_id in (".intval($fc_routes[0]["route_id"]).")");
                //中转点至终点的线路
                $cl_routes = $ms->search_sql(" route_id,count(*) "," routestation "," station_id in (".intval($last_stationid[0][station_id]).",".$change_stations[0]["station_id"].")group by route_id having count(*) > 1 ");
                $cl_detail = $ms->search_sql("route_id,route_name" , "route" , "city_id = ".intval($city_id)." and route_id in (".intval($cl_routes[0]["route_id"]).")");

                echo $first_station.'--->搭乘'.$fc_detail[0][route_name].'--->'.$cs_detail[0]["station_name"].'--->换乘'.$cl_detail[0]["route_name"].'--->'.$last_station.'。<br/>';
                $first_station = $last_station;
                array_push($compareArray, $first_station);
                $stations = array_diff($stations, $compareArray);
            }
        }
    }
}