<?php


		$server = "localhost";
		$user 	= "root";
		$pass	= "admin";
		$db     = "templock";
	   	
		$connection = mysql_connect(	$server, $user, $pass) or die ("koneksi eror");
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );
?>
