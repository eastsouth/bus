<?php
/**
*公共信息
*/
//连接数据库
include(DIR . '/include/mysql.php');
$db = new DB();

$db->db_host = SAE_MYSQL_HOST_M;
$db->db_name = SAE_MYSQL_DB;
$db->db_user = SAE_MYSQL_USER;
$db->db_pass = SAE_MYSQL_PASS;
$db->db_port = SAE_MYSQL_PORT;

/*
 $db->db_host = 'localhost';
 $db->db_name = 'bus_system';
 $db->db_user = 'root';
 $db->db_pass = 'root';
 */

if(!$db->connect('utf8')) 
{
echo $db->db_host;
echo $db->db_name;
echo $db->db_user;
echo $db->db_pass;
echo $db->db_port;
exit('连接数据库出错!');
}

/*使用特定function对数组中所有元素做处理
* 
*/
function arrayRecursive(&$array, $function, $apply_to_keys_also = false){
    static $recursive_counter = 0;
    if(++$recursive_counter > 1000) {
            die('possible deep recursion attack');
    }
    foreach ($array as $key => $value) {
            if(is_array($value)) {
                    arrayRecursive($array[$key], $function, $apply_to_keys_also);
            }else {
                    $array[$key] = $function($value);
            }
            if ($apply_to_keys_also && is_string($key)) {
                    $new_key = $function($key);
                    if ($new_key != $key) {
                            $array[$new_key] = $array[$key];
                            unset($array[$key]);
                    }
            }
    }
    $recursive_counter--;
}
?>
