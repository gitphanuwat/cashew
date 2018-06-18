<?php
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	$iduser=$_SESSION["IASU_USER_ID"];
	$idbase=$_POST["id"];
	
	//ดึงข้อมูลมาแสดงแก้ไข
	if($_GET["action"]=="showdetail"){
		
		$sql="select * from tbbase where idbase = $idbase";
		$result=mysql_db_query($database,$sql);
	   	$row=mysql_fetch_array($result);
				$idtype=$row[2];
				$sql1="select nametype from tbtype where idtype = $idtype";
				$result1=mysql_db_query($database,$sql1);
				$row1=mysql_fetch_array($result1);
	
			echo "<div class=\"row\">";
				echo "<div class=\"col-md-12 col-sm-12 wow fadeInDown\">";
				//echo "<div class=\"\">";
					echo "<div class=\"alert alert-info\">";
						echo "<div class=\"row\">";
							echo "<div class=\"col-md-4 col-sm-4\">
									$row[3]<br>
									ลิติจูด $row[9]<br>
									ลองจิจูด $row[10]
								</div>";
							echo "<div class=\"col-md-4 col-sm-4\">
									ประเภท $row1[0]<br>
									ผู้ติดต่อ $row[5]<br>
									เบอร์โทร - $row[6]
								</div>";
							echo "<div class=\"col-md-4 col-sm-4\">
									เฟสบุ๊ค $row[7]<br>
									เว็บไซค์ $row[12]<br>
									อีเมล์ $row[13]
								</div>";	
						echo "</div>";			
					echo "</div>";
				echo "</div>";
			echo "</div>";
			echo "<div class=\"row\">";
				echo "<div class=\"col-md-12 col-sm-12 wow fadeInDown\">";
				//echo "<div class=\"\">";
					echo "<div class=\"alert alert-success\">";
						echo "<div class=\"row\">";
							echo "<div class=\"col-md-4 col-sm-4\">
									<img src=\"picture/$row[8]\" width=\"200\">
								</div>";
							echo "<div class=\"col-md-8 col-sm-8\">
									รายละเอียด - $row[4]<br>
								</div>";
						echo "</div>";			
					echo "</div>";
				echo "</div>";
			echo "</div>";
		exit();
	}
	

	//แผนที่ กำหนดจุด
	if($_GET["action"]=="newmap"){
		echo '<script src="js/gnewmap.js"></script>';
		exit();
		
	}
	//แผนที่เริ่มต้น
	if($_GET["action"]=="startmap"){
		echo '<script src="js/gmapshow.js"></script>';
		exit();
	}


	$sql="select * from tbtype 
	order by idtype ASC";
	$result=mysql_db_query($database,$sql);
?>
	<table class="table table-hover">
    	<tr>
    		<th></th>
    		<th>ประเภท</th>
    		<th>จำนวน</th>
            <th>Tools</th>
    	</tr>
       <?php
	   		while($row=mysql_fetch_array($result)){
				$idtype=$row[0];
				$sql1="select count(*) from tbbase where idtype = $idtype";
				$result1=mysql_db_query($database,$sql1);
				$row1=mysql_fetch_array($result1);
				echo "<tr>";
					echo "<td><img src='icon/$row[4]'></td>";
					echo "<td>$row[1]</td>";
					echo "<td>$row1[0]</td>";
					echo "<td><a href='#$row[0]' title='แสดงข้อมูล' class='showitem'><span class=\"label label-primary\">แสดงข้อมูล</span></a> </td>";
				echo "</tr>";
			}
	   ?>
    </table>

<?php		
	mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?>);
</script>