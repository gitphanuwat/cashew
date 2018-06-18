<?php
	session_start();
	include('config/config.php');
	
		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	


	//กำลังลงทะเบียน
	if($_GET["action"]=="getknow"){
		$search = $_GET["search"];
		echo "<table class='table table-hover'>";
        	echo "<tr>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th>หัวเรื่ององค์ความรู้</th>";
                echo "<th width='250'>หมวดหมู่</th>";
                echo "<th width='120'>Tools</th>";
            echo "</tr>";
            $sql="select * ";
            $sql=$sql . " from tbknowledge ";
			 if($search !=""){
            	$sql=$sql . "where title like '%$search%' ";
            }
			$sql=$sql . " order by idknow";
            $result=mysql_db_query($database,$sql);
			$total=mysql_num_rows($result);
			
			$e_page=10;

			if(!isset($_GET['s_page'])){   
				$_GET['s_page']=0;   
			}else{   
				$chk_page=$_GET['s_page'];     
				$_GET['s_page']=$_GET['s_page']*$e_page;   
			}   
			$sql=$sql . " LIMIT " . $_GET['s_page'] . " , $e_page";
			$result=mysql_db_query($database,$sql);
			if(mysql_num_rows($result)>=1){
				$plus_p=($chk_page*$e_page)+mysql_num_rows($result);
			}else{
				$plus_p=($chk_page*$e_page); 
			}
			$total_p=ceil($total/$e_page);   
			$before_p=($chk_page*$e_page)+1;
			$i=$before_p;
			while($row=mysql_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$i++."</td>";
					echo "<td>".$row["title"]."</td>";
			$id=$row[1];
			$sql2="select namegroup from tbknowgroup where idgroup = $id";
			$result2=mysql_db_query($database,$sql2);
			@$row1=mysql_fetch_array($result2);
					echo "<td>".$row1[0]."</td>";
					echo "<td>";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='แก้ไขข้อมูล' class='editknow' ><img src='img/edit.png'></a> ";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='ลบข้อมูล' class='delknow'><img src='img/del.png'></td>";
				echo "</tr>";
			}

        echo "</table>";

        if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="knowledgeedit_data.php?url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);    
					echo "</ul>";
				echo "</div>";
	        echo "</div>";		
		}

		exit();
	}

	if($_GET["action"]=="loadlistgroup"){
		echo "<select id='idgroup' name='idgroup' class='form-control'>";
			echo "<option value='0'>- เลือกหมวดหมู่ -</option>";
		$sql="select idgroup , namegroup from tbknowgroup order by idgroup";
		$result=mysql_db_query($database,$sql);
		while($row=mysql_fetch_array($result)){
				echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
		exit();
	}

	//กำลังลงทะเบียน
	if($_GET["action"]=="getgroup"){
		$search = $_GET["search"];
		echo "<table class='table table-hover'>";
        	echo "<tr>";
				echo "<th width='50'></th>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th>ชื่อหมวดหมู่</th>";
                echo "<th width='250'>จำนวนองค์ความรู้</th>";
                echo "<th width='120'>Tools</th>";
            echo "</tr>";
            $sql="select * ";
            $sql=$sql . " from tbknowgroup ";
			$sql=$sql . " order by idgroup";
            $result=mysql_db_query($database,$sql);
			$total=mysql_num_rows($result);
			$i=1;
			while($row=mysql_fetch_array($result)){
				echo "<tr>";
					echo "<td><img src='user/profile_pic/$row[4]' class='img-circle' width='25'></td>";
					echo "<td>".$i++."</td>";
					echo "<td>".$row[1]."</td>";
			$id=$row[0];
			$sql2="select count(*) from tbknowledge where idgroup = $id";
			$result2=mysql_db_query($database,$sql2);
			@$row1=mysql_fetch_array($result2);
					echo "<td>" .$row1[0]. "</td>";
					echo "<td>";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='แก้ไขข้อมูล' class='editgroup' ><img src='img/edit.png'></a> ";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='ลบข้อมูล' class='delgroup'><img src='img/del.png'></td>";
				echo "</tr>";
			}
        echo "</table>";
		exit();
	}
	if($_GET["action"]=="getPicgroup"){
			$id=$_GET["id"];
			$sql= "select `icon` from tbknowgroup where idgroup=$id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);
				$userPic1="user/profile_pic/" . $row[0];
		echo "<img src='$userPic1' width='115' height='115' class='img-rounded'/>";
		exit();
	}

	//แสดงรายละเอียดของสมาชิก
	if($_GET["action"]=="getDetail"){

		$id=$_GET["id"];

		echo "<div class='box-body table-responsive no-padding'>";
			echo "<div role='tabpanel'>";
				echo "<div class='tab-content'>";
					echo "<div role='tabpanel' class='tab-pane fade in active' id='Userinfo'>";
						$sql="select * from tbuser where 
						iduser=$id";
						$result=mysql_db_query($database,$sql);
						$row=mysql_fetch_array($result);
						
						echo "<div class='row'>";
							echo "<div class='col-lg-12'>";
								//ข้อมูลทั่วไป
								echo "<div class='box'>";
									echo "<div class='box-header'>";
										echo "<h3 class='box-title'>ข้อมูลทั่วไป</h3>";
									echo "</div>";
									echo "<div class='box-body table-responsive no-padding'>";
										if(is_numeric($row["prefix"])){
                            				$prefix=$cf_prefix[$row["prefix"]];
                            			}else{
                            				$prefix=$row["prefix"];
                            			}
										$name=$prefix . $row["firstname"] . " " . $row["lastname"];
										echo "<p><b>ชื่อ - สกุล</b> : $name</p>";
									echo "</div>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
						echo "<div class='row'>";
							echo "<div class='col-lg-12'>";
								echo "<div class='box'>";
									echo "<div class='box-header'>";
										echo "<h3 class='box-title'>สถานที่ติดต่อ</h3>";
									echo "</div>";
									echo "<div class='box-body table-responsive no-padding'>";
										echo "<p><b>ที่อยู่</b> : ".$row["address"]."</p>";
										echo "<p><b>เบอร์โทร</b> : " . $row["tel"] . "</p>";
										echo "<p><b>อีเมล์</b> : " . $row["email"] . "</p>";
										echo "<p><b>ตำแหน่งงาน</b> : " . $row["position"] . "</p>";
									echo "</div>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";

		echo "<div class='box-footer'>";
	        echo "<div class='col-lg-12' align='right'>";
	        	echo "<button type='button' class='btn btn-danger' id='butExit'>Close</button>";
	        echo "</div>";
        echo "</div>";

		exit();
	}
	
	//ลบข้อมูล
	if($_GET["action"]=="delgroup"){
		$id=$_POST["id"];
		$sql="delete from tbknowgroup where idgroup=$id";
		$result=mysql_db_query($database,$sql);

		exit();
	}
	if($_GET["action"]=="delknow"){
		$id=$_POST["id"];
		$sql="delete from tbknowledge where idknow=$id";
		$result=mysql_db_query($database,$sql);

		exit();
	}

	if($_GET["action"]=="insertknow"){
		$msgsuccess=0;
		$msgerror=0;
		$box=2;
		
		if( $_POST["title"]==""){
			$msgerror=1;
		}else{
			$detailtxt=$_POST["detail"];
				if($_POST["idknow"] !=""){
					//แก้ไขข้อมูล
					$sql="update tbknowledge set title='" . $_POST["title"] . "' , detail='" . $detailtxt . "' ";
					$sql=$sql . " , `idgroup` = " . $_POST["idgroup"];
					$sql=$sql . " where idknow =" . $_POST["idknow"];
					$resultAdd=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}else{
					$sql="insert into tbknowledge(title , detail , `idgroup`) ";
					$sql=$sql . " values('" . $_POST["title"] . "' , '" . $detailtxt . "' ";
					$sql=$sql . " , " . $_POST["idgroup"] . " )";
					$resultAdd=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}
		}
		sleep(1);
		//จบบันทึก
	}
	
	if($_GET["action"]=="getupdateknow"){
		$sql="select idknow , idgroup, title, detail from tbknowledge where idknow = " . $_POST["id"];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
		echo $row[0] . "|";
		echo $row[1] . "|";
		echo $row[2] . "|";
		echo $row[3] . "|";
		exit();
	}

if($_GET["action"]=="resetdetail"){
		$sql="select detail from tbknowledge where idknow = " . $_GET["id"];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
		$detail=$row[0];
	
	    echo '<script type="text/javascript" src="doctool/fckeditor.js"></script>';
		echo '<textarea id="detail" name="detail"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'.$detail.'</textarea>';
		echo '
		<script type="text/javascript">
				var oFCKeditor = new FCKeditor("detail");
				oFCKeditor.BasePath = "doctool/";
				oFCKeditor.Height = "500";
				oFCKeditor.ReplaceTextarea();	
		</script>';
	
	exit();
}
	
	
	
	mysql_close();
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess; ?> , <?php echo $msgerror; ?>, <?php echo $box; ?> );
</script>