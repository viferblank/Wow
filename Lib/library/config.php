<?php
include"database.php";

	function database($config){
		mysql_connect($config['host'],$config['user'],$config['pass']) or die("".mysql_error());
		mysql_select_db($config['database'])or die("Check In".mysql_error());
	}
	
	function get($table){
		$sql = "SELECT * FROM $table";
		return mysql_query($sql);
	}
	function insert($table,$data){
		$sql = "INSERT into $table";
		$sql .= "('".implode("','",array_keys($data))."')";
		$sql .= "VALUES('".implode("','",$data)."')";
		return mysql_query($sql);
	}
	function delete($table,$where){
		$sql= "DELETE FROM $table WHERE $where";
		return mysql_query($sql);
	}
	function update($table,$where,$data){
		$sql = "UPDATE $table SET ";
		$sql .= implode("','",array_keys($data). "='$data'" );
		$sql .= "Where ".implode("','",array_keys($where)."='$data'");
		return mysql_query($sql);
	}
	function get_where($table,$where){
		$sql = "SELECT * FROM $table where ";
		$sql .= implode("','",array_keys($where)."='$data'");
		return mysql_query($sql);		
	}
?>