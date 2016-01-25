<?php
   	include("connect.php");
   

	$temp1=$_GET["suhu"];
	$hum1=$_GET["kelembapan"];

	$query = "INSERT INTO templock (waktu,Suhu,Kelembapan) 
		VALUES (NOW(),'".$temp1."','".$hum1."')"; 
   	
   	if(mysql_query($query)){
	
   	header("Location: index.php");
	}else{
		echo "Gagal";
	}
	mysql_close();

?>
