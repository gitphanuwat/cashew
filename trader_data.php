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
									กลุ่มงาน $row1[0]<br>
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
	
	if($_GET["action"]=="startmap"){
		echo '<script src="js/gmap.js"></script>';
		exit();
	}	

	//แผนที่เริ่มต้น
	if($_GET["action"]=="typemap"){
				$idtype=$_POST["idty"];
		echo "<script type=\"text/javascript\">";
				echo "var idtype = ".$idtype.";";
		echo "</script>";
		echo '<script src="js/gmapshow.js"></script>';
		exit();
	}

	if($_GET["action"]=="showdata"){
	$sql="select * from tbtype 
	order by idtype ASC";
	$result=mysql_db_query($database,$sql);
	echo '<table class="table table-hover">
    	<tr>
    		<th></th>
    		<th>กลุ่มงานบริการ</th>
    		<th>จำนวน</th>
            <th></th>
    	</tr>';

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
	   echo "</table>";
	   exit();
	}
	
	if($_GET["action"]=="showproduct"){
	$sql="select * from tbproduct where idbase = $idbase 
	order by idproduct ASC";
	$result=mysql_db_query($database,$sql);
	echo '<table class="table table-hover">
    	<tr>
    		<th></th>
    		<th>หัวเรื่องการบริการ</th>
    		<th>ผู้ติดต่อ</th>
            <th></th>
    	</tr>';

	   		while($row=mysql_fetch_array($result)){
				echo "<tr>";
					echo "<td><img src='user/profile_pic/$row[7]' width='120'></td>";
					echo "<td>$row[3]</td>";
					echo "<td>$row[5]</td>";
					echo "<td><a href='#$row[0]' title='แสดงข้อมูล'id='but' class='but'><span class=\"label label-primary\">แสดงข้อมูล</span></a> 
					</td>";
				echo "</tr>";
				
			}
	   echo "</table>";
	   exit();
	}
	
	if($_GET["action"]=="showproductedit"){
		$sql="select * from tbproduct where idbase = $idbase 
		order by idproduct ASC";
		$result=mysql_db_query($database,$sql);
	
	
		$sqlb="select idbase, namebase from tbbase where idbase = $idbase";
		$resultb=mysql_db_query($database,$sqlb);
		$rowb=mysql_fetch_array($resultb);
		echo "<input name='idbase' id='idbase' type='hidden' value='".$rowb[0]."' />";
		echo '<h3>ข้อมูลการบริการ : '.$rowb[1].'</h3>';
		echo '<table class="table table-hover">
			<tr>
				<th></th>
				<th>หัวข้อการบริการ</th>
				<th>ผู้ติดต่อ</th>
				<th><a href="#0" title=" เพิ่มข้อมูล "id="newproduct" class="newproduct"><span class="label label-primary">เพิ่มข้อมูล</span></a></th>
			</tr>';
	
				while($row=mysql_fetch_array($result)){
					echo "<tr>";
						echo "<td><img src='user/profile_pic/$row[7]' width='120'></td>";
						echo "<td>$row[3]</td>";
						echo "<td>$row[5]</td>";
						echo "<td><a href='#$row[0]' title='แก้ไขข้อมูล' class='showproductdetail'><img src='img/detail.png'>&nbsp;<a href='#$row[0]' title='แก้ไขข้อมูล' class='editproduct'><img src='img/edit.png'></a> &nbsp;";
						echo "<a href='#$row[0]' title='ลบข้อมูล' class='delproduct'><img src='img/del.png'></a> </td>";
					echo "</tr>";
					
				}
		   echo "</table>";
		   echo "<input type='hidden' class='form-control' name='vbase' id='vbase' value='". $_POST["id"]."'>";

		   exit();
	}
mysql_close();
?>