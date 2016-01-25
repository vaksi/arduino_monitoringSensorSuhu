<?php

	include("connect.php"); 	
	

	$result=mysql_query("SELECT * FROM tempLock ORDER BY waktu DESC LIMIT 8");
?>

<html>
   <head>
      <title>Sensor Data</title>
   </head>
<body>
   <h2>Pembacaan Suhu dan Kelembapan Panel Gardu Listrik</h1>
   
   <table  border="1" cellspacing="3" cellpadding="3" id="tbl">
		<tr>
			<td>&nbsp;Waktu &nbsp;</td>
			<td>&nbsp;Suhu &nbsp;</td>
			<td>&nbsp;Kelembapan &nbsp;</td>
		</tr>

      <?php 
		  if($result!==FALSE){
		     while($row = mysql_fetch_array($result)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["waktu"], $row["Suhu"], $row["Kelembapan"]);
		     }
		     mysql_free_result($result);
		     mysql_close();
		  }
      ?>

   </table>
   
   <meta http-equiv="refresh" content="2">
   
	<script type="text/javascript" language="javascript" src="jquery-1.11.3.min.js"></script>
	<script type="text/javascript" language="javascript" src="jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('#tbl').DataTable( {
				"scrollY": 200,
				"scrollX": true
			} );
		} );
	</script>
</body>
</html>
