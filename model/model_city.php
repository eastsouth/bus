<?php
	class model_city
	{
		/**
		 *$db 数据库
		 */
		var $db;
		
		/**
		 *构造函数
		 */
		function model_city()
		{
			global $db;
			$this->db = $db;
		}
		/**
		 *查询表的所有数据
		 *
		 *$tb 数据表
		 */
		function search_tb($tb)
		{
			$sqlStr = "select * from $tb";
			return $this->db->select($sqlStr);
		}
		/**
		 *根据ID查询数据
		 *
		 *$tb 数据表，$dc 数据列名，$dt 数据
		 */
		function search_dt($tb,$dc,$dt)
		{
			$sqlStr = "select * from $tb where $dc = $dt";
			return $this->db->select($sqlStr);
		}
		
		/**
		 *根据ID查询某一列数据
		 *
		 *$da要查的数据,$tb 数据表，$dc 数据列名，$dt 数据
		 */
		function search_ctByid($da,$tb,$dc,$dt)
		{
			$sqlStr = "select $da from $tb where $dc = $dt";
			return $this->db->select($sqlStr);
		}
		/**
		 *自定义sql
		 */
		function search_sql($da,$tb,$dc)
		{
			$sqlStr = "select $da from $tb where $dc";
			return $this->db->select($sqlStr);
		}

	}
?>