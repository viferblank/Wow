<?php
include"library/config.php";
if(isset($_GET['id'])){
	$table="login";
	$id=$_GET['id'];
	$sql=delete($table,"id_login=$id");
	if($sql){
		echo "<script>document.location='index.php'</script>";
	}
}
?>