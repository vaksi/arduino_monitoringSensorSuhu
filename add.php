<?php
   	include("connect.php");
   

	$suhu=$_GET["suhu"];
	$kelembaban=$_GET["kelembapan"];

	$query = "INSERT INTO templock (waktu,Suhu,Kelembapan) 
		VALUES (NOW(),'".$suhu."','".$kelembaban."')"; 
   	
   	if(mysql_query($query)){
	
   	header("Location: index.php");
	}else{
		echo "Gagal";
	}
	mysql_close();

?>
