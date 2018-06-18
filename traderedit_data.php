<?php
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	$iduser=$_SESSION["IASU_USER_ID"];
	
	
	//เพิ่มข้อมูล/แก้ไขข้อมูล
	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;
		
		if($_POST["idbase"]==""){
		
			if($_POST["idtype"] == "" || $_POST["namebase"] == ""){
				$msgerror=4;
			}else{
				if($_FILES["picture"]["name"]==""){
						$sql="insert into tbbase(iduser, idtype , namebase , picture , latitude , longitude , zoom, detail, contact, tel, facebook, website) ";
						$sql=$sql . " values('"  .$iduser . "' , '" . $_POST["idtype"] .  "' , '" . $_POST["namebase"] .  "' , '' , '" . $_POST["latitude"] .  "' , '" . $_POST["longitude"].  "' , '" . $_POST["zoom"]. "', '" . $_POST["detail"]. "', '" . $_POST["contact"]. "', '" . $_POST["tel"]. "', '" . $_POST["facebook"]. "', '" . $_POST["website"]. "')";
						$resultAdd=mysql_db_query($database,$sql);
								$msgsuccess=1;

				}else{
						$accept_type=array("image/jpeg" , "image/gif" , "image/png");
						$file=$_FILES["picture"]["name"];
						$typefile=$_FILES["picture"]["type"];
						$sizefile=$_FILES["picture"]["size"];
						$tempfile=$_FILES["picture"]["tmp_name"];
						
						if(!in_array($typefile,$accept_type)){
							$msgerror=1;
						}else{
							$Str_file = explode(".",$file);
							$carr = count($Str_file)-1;
							$strname = $Str_file[$carr];
							$pname= "pic_" . randomText(10) . "." . $strname;
							$target_path = "picture/" . $pname;


							if(@move_uploaded_file($tempfile,$target_path)){
						$sql="insert into tbbase(iduser, idtype , namebase , picture , latitude , longitude , zoom, detail, contact, tel, facebook, website) ";
						$sql=$sql . " values('"  .$iduser . "' , '" . $_POST["idtype"] .  "' , '" . $_POST["namebase"] .  "' , $pname' , '" . $_POST["latitude"] .  "' , '" . $_POST["longitude"].  "' , '" . $_POST["zoom"]. "', '" . $_POST["detail"]. "', '" . $_POST["contact"]. "', '" . $_POST["tel"]. "', '" . $_POST["facebook"]. "', '" . $_POST["website"]. "')";
						$resultAdd=mysql_db_query($database,$sql);
								$msgsuccess=1;
							}else{
								$msgerror=2;
							}
					}
				}
			}
		}else{
			//แก้ไขข้อมูล
			if($_POST["idtype"] == "" || $_POST["namebase"] == ""){
				$msgerror=4;
			}else{
				if($_FILES["picture"]["name"]==""){
					$sql="update tbbase set";
					$sql=$sql." idtype ='".$_POST["idtype"]."'";
					$sql=$sql . ", namebase ='".$_POST["namebase"]."'";
					$sql=$sql . ", latitude ='".$_POST["latitude"]."'";
					$sql=$sql . ", longitude ='".$_POST["longitude"]."'";
					$sql=$sql . ", zoom ='".$_POST["zoom"]."'";
					$sql=$sql . ", detail ='".$_POST["detail"]."'";
					$sql=$sql . ", contact ='".$_POST["contact"]."'";
					$sql=$sql . ", tel ='".$_POST["tel"]."'";
					$sql=$sql . ", facebook ='".$_POST["facebook"]."'";
					$sql=$sql . ", website ='".$_POST["website"]."'";
					$sql=$sql." where idbase = ". $_POST["idbase"];
					$resultAdd=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}else{
						$accept_type=array("image/jpeg" , "image/gif" , "image/png");
						$file=$_FILES["picture"]["name"];
						$typefile=$_FILES["picture"]["type"];
						$sizefile=$_FILES["picture"]["size"];
						$tempfile=$_FILES["picture"]["tmp_name"];
						
						if(!in_array($typefile,$accept_type)){
							$msgerror=1;
						}else{
							$Str_file = explode(".",$file);
							$carr = count($Str_file)-1;
							$strname = $Str_file[$carr];
							$pname= "pic_" . randomText(10) . "." . $strname;
							$target_path = "picture/" . $pname;

							if(@move_uploaded_file($tempfile,$target_path)){

					$sql="update tbbase set";
					$sql=$sql." idtype ='".$_POST["idtype"]."'";
					$sql=$sql . ", namebase ='".$_POST["namebase"]."'";
					$sql=$sql . ", picture ='".$pname."'";
					$sql=$sql . ", latitude ='".$_POST["latitude"]."'";
					$sql=$sql . ", longitude ='".$_POST["longitude"]."'";
					$sql=$sql . ", zoom ='".$_POST["zoom"]."'";
					$sql=$sql . ", detail ='".$_POST["detail"]."'";
					$sql=$sql . ", contact ='".$_POST["contact"]."'";
					$sql=$sql . ", tel ='".$_POST["tel"]."'";
					$sql=$sql . ", facebook ='".$_POST["facebook"]."'";
					$sql=$sql . ", website ='".$_POST["website"]."'";
					$sql=$sql." where idbase = ". $_POST["idbase"];
					$resultAdd=mysql_db_query($database,$sql);
								$msgsuccess=1;
							}else{
								$msgerror=2;
							}
						}
				}
			}
		}
		sleep(1);
		echo "<script language=\"javascript\">window.location.href = 'traderedit.php'</script>";
		//exit();
	}
	
	//ดึงข้อมูลมาแสดงแก้ไข
	if($_GET["action"]=="getupdate"){
		$sql="select idbase , namebase , idtype , picture , latitude, longitude, zoom, detail, contact, tel, facebook, website from tbbase where idbase = " . $_POST["id"];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
		echo $row[0] . "|";
		echo $row[1] . "|";
		echo $row[2] . "|";
		echo $row[3] . "|";
		echo $row[4] . "|";
		echo $row[5] . "|";
		echo $row[6] . "|";
		echo $row[7] . "|";
		echo $row[8] . "|";
		echo $row[9] . "|";
		echo $row[10] . "|";
		echo $row[11] . "|";
		exit();
	}
	
	if($_GET["action"]=="delete"){
		$sql="delete from tbbase where idbase = " . $_POST["id"];
		$result=mysql_db_query($database,$sql);
		exit();
	}
	if($_GET["action"]=="deleteproduct"){
		$sql="delete from tbproduct where idproduct = " . $_POST["id"];
		$result=mysql_db_query($database,$sql);
		exit();
	}


	//แผนที่ กำหนดจุด
	if($_GET["action"]=="newmap"){
		echo '<script src="js/gnewmap.js"></script>';
	}
	//แผนที่เริ่มต้น
	if($_GET["action"]=="startmap"){
		echo '<script src="js/gmapuser.js"></script>';
	}

	

	$sql="select tbtype.icon, tbbase.namebase, tbtype.nametype, tbbase.idbase from tbbase, tbtype where tbbase.idtype=tbtype.idtype 
	and iduser = $iduser order by tbbase.idbase ASC";
	$result=mysql_db_query($database,$sql);
?>
	<table class="table table-hover">
    	<tr>
    		<th></th>
    		<th>ชื่อ</th>
    		<th  width="80">กลุ่มงานบริการ</th>
            <th width="100">Tools</th>
    	</tr>
       <?php
	   		while($row=mysql_fetch_array($result)){
				echo "<tr>";
					echo "<td><img src='icon/$row[0]'></td>";
					echo "<td>$row[1]</td>";
					echo "<td>$row[2]</td>";
					echo "<td><a href='#$row[3]' title='หัวเรื่องการบริการ' class='updateproduct'><img src='img/product.png'></a>&nbsp;<a href='#$row[3]' title='แก้ไขข้อมูล' class='updateItem'><img src='img/edit.png'></a>&nbsp;";
					echo "<a href='#$row[3]' title='ลบข้อมูล' class='delItem'><img src='img/del.png'></a> </td>";
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