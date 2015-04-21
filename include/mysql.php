<?php
/**
 * 数据库操作
 *
 */
class DB
{
	var $conn;
	var $db_host;
	var $db_name;
	var $db_user;
	var $db_pass;
 var $db_port;
	
	/**
	 *连接数据库
	 */
	function connect($encoding = -1)
	{
  $this->conn = mysql_connect($this->db_host.':'.$this->db_port,$this->db_user, $this->db_pass);
		if(!$this->conn)
		{
			echo "无法连接数据库。";
			return 0;
		}
		
		$dbsel = mysql_select_db($this->db_name,$this->conn);
		
  mysql_query("set names utf8");
		if(!$dbsel)
		{
			echo "找不到数据表: " . $this->db_name;
			return 0;
		}
		return 1;
	}

	/**
	 *关闭数据库
	 */
	function disconnect()
	{
		mysql_close($this->conn);
	}
	
	/**
	 * 查询并返回第一行关联数据
	 *
	 * @param string $sqlStr, sql语句
	 * @return boolean
	 */
	 function seSql($sqlStr)
	 {
		$res = mysql_query($sqlStr);
		if(!$res)
		{
			echo mysql_error();
			return 0;
		}
		return mysql_fetch_assoc($res);
	 }
	 
	/**
	 * 执行sql语句
	 *
	 * @param string $sqlStr, sql语句
	 * @return boolean
	 */
	function exeSql($sqlStr)
	{
		$res = mysql_query($sqlStr);
		if(!$res)
		{
			echo mysql_error();
			return 0;
		}
		return 1;
	}
	
	/*查询操作
	* $sqlStr:查询语句
	*/
	function select($sqlStr)
	{
		$items = array();
		$res = mysql_query($sqlStr);
		if(!$res)
		{
			echo mysql_error();
			return $items;
		}

		while($row = mysql_fetch_assoc($res))
		{
			$items[] = $row;
		}
		return $items;
	}
}
?>