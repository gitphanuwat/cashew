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
		echo "<script language=\"javascript\">window.location.href = 'system.php'</script>";
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
	
if($_GET["action"]=="delete_member"){
	$sql="delete from tbuser where iduser = " . $_POST["id"];
	$result=mysql_db_query($database,$sql);
	exit();
}
if($_GET["action"]=="delete_type"){
	$sql="delete from tbtype where idtype = " . $_POST["id"];
	$result=mysql_db_query($database,$sql);
	exit();
}
if($_GET["action"]=="delete_base"){
	$sql="delete from tbbase where idbase = " . $_POST["id"];
	$result=mysql_db_query($database,$sql);
	exit();
}
if($_GET["action"]=="delete_product"){
	$sql="delete from tbproduct where idproduct = " . $_POST["id"];
	$result=mysql_db_query($database,$sql);
	exit();
}

if($_GET["action"]=="loadmember"){
	$sql="select picture, firstname, lastname, prefix, iduser, idlevel from tbuser order by firstname ASC";
	
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

	echo '<table class="table table-hover">
    	<tr>
    		<th width="50"></th>
    		<th>ชื่อ-สกุล</th>
			<th>ประเภทสมาชิก</th>
    		<th  width="170">สถานประกอบการ</th>
    		<th  width="170">การบริการวิชาการ</th>
            <th width="70">Tools</th>
    	</tr>';
	   		while($row=mysql_fetch_array($result)){
				
				if(is_numeric($row["prefix"])){
					$prefix=$cf_prefix[$row["prefix"]];
				}else{
					$prefix=$row["prefix"];
				}
				$name=$prefix . $row['firstname'] . " " . $row['lastname'];
				echo "<tr>";
				if($row[0]==""){
					echo "<td><img src='user/profile_pic/user1.png' class='img-circle' width='25'></td>";
			}else{
					echo "<td><img src='user/profile_pic/$row[0]' class='img-circle' width='25'></td>";
			}		
					echo "<td><a href='#$row[4]' title='แสดงรายละเอียดข้อมูล' class='getbase'><font color=\"white\">$name</font></a></td>";
					echo "<td>".$cf_userlevel[$row[5]]."</td>";
			
			$iuser=$row["iduser"];
			$sql2="select count(*) from tbbase where iduser = $iuser";
			$result2=mysql_db_query($database,$sql2);
			$row1=mysql_fetch_array($result2);
					echo "<td>$row1[0]</td>";
					
			$iuser=$row["iduser"];
			$sql2="select count(*) from tbproduct where iduser = $iuser";
			$result2=mysql_db_query($database,$sql2);
			$row2=mysql_fetch_array($result2);
					echo "<td>$row2[0]</td>";
					echo "<td><a href='#$row[4]' title='แก้ไขข้อมูล' class='update_member'><img src='img/edit.png'></a> &nbsp;&nbsp;";
					echo "<a href='#$row[4]' title='ลบข้อมูล' class='delItem_member'><img src='img/del.png'></a> </td>";
				echo "</tr>";
			}
	echo "</table>";
        if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="system_data.php?url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);    
					echo "</ul>";
				echo "</div>";
	        echo "</div>";		
		}
	exit();
}
if($_GET["action"]=="loadtype"){
	$sql="select * from tbtype order by idtype ASC";
	$result=mysql_db_query($database,$sql);
	echo '<table class="table table-hover">
    	<tr>
    		<th width="50"></th>
    		<th>ประเภทข้อมูล</th>
            <th width="70">Tools</th>
    	</tr>';
	   		while($row=mysql_fetch_array($result)){
				echo "<tr>";
					echo "<td><img src='icon/$row[4]'></td>";
					echo "<td>$row[1]</td>";
					echo "<td><a href='#$row[0]' title='แก้ไขข้อมูล' class='update_type'><img src='img/edit.png'></a> &nbsp;&nbsp;";
					echo "<a href='#$row[0]' title='ลบข้อมูล' class='del_type'><img src='img/del.png'></a> </td>";
				echo "</tr>";
			}
	echo "</table>";
	exit();
}

	if($_GET["action"]=="loadbase"){
	echo '
	<table class="table table-hover">
    	<tr>
    		<th style="width:50px">ลำดับ</th>
    		<th style="width:250px">สถานประกอบการ</th>
    		<th style="width:250px">กลุ่มงานบริการ</th>
    		<th style="width:100px">จำนวนการบริการวิชาการ</th>
    		<th>tool</th>
    	</tr>';
	   	$n=0;
		$sql="select * from tbbase where iduser = " . $_POST["id"]."  order by idbase ASC";
		$result=mysql_db_query($database,$sql);
	   	while($row=mysql_fetch_array($result)){
			$idba=$row[0];
			$sql2="select count(*) from tbproduct
			 where idbase = $idba";
			$result2=mysql_db_query($database,$sql2);
			@$row2=mysql_fetch_array($result2);
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='getproduct'>$row[3]</a></td>";
			$id=$row["idtype"];
			$sql3="select * from tbtype where idtype = $id";
			$result3=mysql_db_query($database,$sql3);
			$row3=mysql_fetch_array($result3);					
					echo "<td>$row3[1]</td>";
					echo "<td>$row2[0] รายการ</td>";
					echo "<td>";
					echo "<a href='#$row[0]' title='ลบข้อมูล' class='delItem_base'><img src='img/del.png'></a> </td>";
					echo "";
				echo "</tr>";
			}
    echo "</table>";
    echo "<input type='hidden' class='form-control' name='vuser' id='vuser' value='". $_POST["id"]."'>";
	exit();		
	}

	if($_GET["action"]=="loadproduct"){
	echo '
	<table class="table table-hover">
    	<tr>
    		<th style="width:50px">ลำดับ</th>
    		<th style="width:250px">การบริการวิชาการ</th>
    		<th>รายละเอียด</th>
    		<th>tool</th>
    	</tr>';
	   	$n=0;
		$sql="select * from tbproduct where idbase = " . $_POST["id"]."  order by idproduct ASC";
		$result=mysql_db_query($database,$sql);
	   	while($row=mysql_fetch_array($result)){
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='getdetail'>$row[3]</a></td>";
					echo "<td>$row[4]</td>";
					echo "<td>";
					echo "<a href='#$row[0]' title='ลบข้อมูล' class='delItem_product'><img src='img/del.png'></a> </td>";
				echo "</tr>";
			}
    echo "</table>";
	echo "<input type='hidden' class='form-control' name='vbase' id='vbase' value='". $_POST["id"]."'>";
	exit();		
	}
		
mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?>);
</script>