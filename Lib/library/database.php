<?php
	include "config.php";
		//diisi dengan nama server,ex localhost
		$config['host']="localhost";
		//diisi dengan username,ex root
		$config['user']="root";
		//diisi dengan password database
		$config['pass']="vifgal";
		//diisi dengan nama database, ex pelajar
		$config['database']="share";
		return database($config);

?>