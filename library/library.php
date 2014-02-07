<?php
class library{
	function __construct($db){
		mysql_connect("localhost","root","vifgal");
		mysql_select_db($db);
	}
	function insert($table,$data){
		$sql ="INSERT into $table";
		$sql .= "(".implode(",",array_keys($data)).")";
		$sql .="VALUES('".implode("','",$data)."')";
		echo $sql;
	}
}
?>