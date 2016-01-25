<?php


		$server = "127.0.0.1";
		$user 	= "root";
		$pass	= "";
		$db		= "db_ta";
	   	
		$connection = mysql_connect(	$server, $user, $pass) or die ("koneksi eror");
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );
?>
