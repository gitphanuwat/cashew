<?php
	include('config/config.php');
	
		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	

	if($_GET["action"]=="loadexpertdetail"){
		$id=$_GET["id"];
		
			$sql="select * from tbexpertlist where idexpertlist = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$idexpert=$row["idexpert"];
			$sql="select * from tbexpert where idexpert = $idexpert";
			$result=mysql_db_query($database,$sql);
			$row2=mysql_fetch_array($result);
			
		if(is_numeric($row2["prefix"])){
			$prefix=$cf_prefix[$row2["prefix"]];
		}else{
			$prefix=$row2["prefix"];
		}
		$name=$prefix . $row2['firstname'] . " " . $row2['lastname'];

			echo "ผู้เชี่ยวชาญ : ".$name."<br>";
			echo "ความเชี่ยวชาญ : ".$nameexpertlist=$row["nameexpertlist"]."<br>";
			echo "รายละเอียด : ".$detail=$row["detail"]."<br>";
			echo "ข้อมูลอื่นๆ : ".$comment=$row["comment"]."<br>"."<br>";

	}

	mysql_close();
?>

