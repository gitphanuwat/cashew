<?php
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	//$idexpert=$_SESSION["IASU_USER_ID"];
	//เพิ่มข้อมูล/แก้ไขข้อมูล
	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;
		
		if($_POST["idexpertlist"]==""){
		
			if($_POST["idg_expert"] == "" || $_POST["nameexpertlist"] == ""){
				$msgerror=4;
			}else{
				if($_FILES["picture"]["name"]==""){
						$sql="insert into tbexpertlist(idexpert, idg_expert , nameexpertlist , picture , latitude , longitude , zoom, detail, contact, tel, facebook, website) ";
						$sql=$sql . " values('"  .$idexpert . "' , '" . $_POST["idg_expert"] .  "' , '" . $_POST["nameexpertlist"] .  "' , '' , '" . $_POST["latitude"] .  "' , '" . $_POST["longitude"].  "' , '" . $_POST["zoom"]. "', '" . $_POST["detail"]. "', '" . $_POST["contact"]. "', '" . $_POST["tel"]. "', '" . $_POST["facebook"]. "', '" . $_POST["website"]. "')";
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
						$sql="insert into tbexpertlist(idexpert, idg_expert , nameexpertlist , picture , latitude , longitude , zoom, detail, contact, tel, facebook, website) ";
						$sql=$sql . " values('"  .$idexpert . "' , '" . $_POST["idg_expert"] .  "' , '" . $_POST["nameexpertlist"] .  "' , $pname' , '" . $_POST["latitude"] .  "' , '" . $_POST["longitude"].  "' , '" . $_POST["zoom"]. "', '" . $_POST["detail"]. "', '" . $_POST["contact"]. "', '" . $_POST["tel"]. "', '" . $_POST["facebook"]. "', '" . $_POST["website"]. "')";
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
			if($_POST["idg_expert"] == "" || $_POST["nameexpertlist"] == ""){
				$msgerror=4;
			}else{
				if($_FILES["picture"]["name"]==""){
					$sql="update tbexpertlist set";
					$sql=$sql." idg_expert ='".$_POST["idg_expert"]."'";
					$sql=$sql . ", nameexpertlist ='".$_POST["nameexpertlist"]."'";
					$sql=$sql . ", latitude ='".$_POST["latitude"]."'";
					$sql=$sql . ", longitude ='".$_POST["longitude"]."'";
					$sql=$sql . ", zoom ='".$_POST["zoom"]."'";
					$sql=$sql . ", detail ='".$_POST["detail"]."'";
					$sql=$sql . ", contact ='".$_POST["contact"]."'";
					$sql=$sql . ", tel ='".$_POST["tel"]."'";
					$sql=$sql . ", facebook ='".$_POST["facebook"]."'";
					$sql=$sql . ", website ='".$_POST["website"]."'";
					$sql=$sql." where idexpertlist = ". $_POST["idexpertlist"];
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

					$sql="update tbexpertlist set";
					$sql=$sql." idg_expert ='".$_POST["idg_expert"]."'";
					$sql=$sql . ", nameexpertlist ='".$_POST["nameexpertlist"]."'";
					$sql=$sql . ", picture ='".$pname."'";
					$sql=$sql . ", latitude ='".$_POST["latitude"]."'";
					$sql=$sql . ", longitude ='".$_POST["longitude"]."'";
					$sql=$sql . ", zoom ='".$_POST["zoom"]."'";
					$sql=$sql . ", detail ='".$_POST["detail"]."'";
					$sql=$sql . ", contact ='".$_POST["contact"]."'";
					$sql=$sql . ", tel ='".$_POST["tel"]."'";
					$sql=$sql . ", facebook ='".$_POST["facebook"]."'";
					$sql=$sql . ", website ='".$_POST["website"]."'";
					$sql=$sql." where idexpertlist = ". $_POST["idexpertlist"];
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
		echo "<script language=\"javascript\">window.location.href = 'expert.php'</script>";
		//exit();
	}
	
	//ดึงข้อมูลมาแสดงแก้ไข
	if($_GET["action"]=="getupdate"){
		$sql="select idexpertlist , nameexpertlist , idg_expert , picture , latitude, longitude, zoom, detail, contact, tel, facebook, website from tbexpertlist where idexpertlist = " . $_POST["id"];
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
	$sql="delete from tbexpert where idexpert = " . $_POST["id"];
	$result=mysql_db_query($database,$sql);
	exit();
}
if($_GET["action"]=="delete_g_expert"){
	$sql="delete from tbg_expert where idg_expert = " . $_POST["id"];
	$result=mysql_db_query($database,$sql);
	exit();
}
if($_GET["action"]=="delete_expertlist"){
	$sql="delete from tbexpertlist where idexpertlist = " . $_POST["id"];
	$result=mysql_db_query($database,$sql);
	exit();
}

if($_GET["action"]=="loadmember"){
	echo "<input type='hidden' class='form-control' name='npage' id='npage' value='". $_GET['s_page']."'>";
	$sql="select * from tbexpert order by firstname ASC";
	
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
    		<th width="50">ลำดับ</th>
    		<th>ชื่อ-สกุล</th>
			<th>จำนวนความเชี่ยวชาญ</th>
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
					echo "<td>".$i++."</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='getexpertlist'>$name</font></a></td>";
			
			$iexpert=$row["idexpert"];
			$sql2="select count(*) from tbexpertlist where idexpert = $iexpert";
			$result2=mysql_db_query($database,$sql2);
			$row1=mysql_fetch_array($result2);
					echo "<td>$row1[0]</td>";
					
					echo "<td><a href='#$row[0]' title='แก้ไขข้อมูล' class='update_member'><img src='img/edit.png'></a> &nbsp;&nbsp;";
					echo "<a href='#$row[0]' title='ลบข้อมูล' class='delItem_member'><img src='img/del.png'></a> </td>";
				echo "</tr>";
			}
	echo "</table>";
	
        if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="expert_data.php?url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);    
					echo "</ul>";
				echo "</div>";
	        echo "</div>";		
		}
	exit();
}

if($_GET["action"]=="loadg_expert"){
	$sql="select * from tbg_expert order by idg_expert ASC";
	$result=mysql_db_query($database,$sql);
	echo '<table class="table table-hover">
    	<tr>
    		<th width="50">ลำดับ</th>
    		<th>ชื่อกลุ่มความเชี่ยวชาญ</th>
            <th width="70">Tools</th>
    	</tr>';
			$i=1;
	   		while($row=mysql_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$i++."</td>";
					echo "<td>$row[1]</td>";
					echo "<td><a href='#$row[0]' title='แก้ไขข้อมูล' class='update_g_expert'><img src='img/edit.png'></a> &nbsp;&nbsp;";
					echo "<a href='#$row[0]' title='ลบข้อมูล' class='del_g_expert'><img src='img/del.png'></a> </td>";
				echo "</tr>";
			}
	echo "</table>";
	exit();
}

if($_GET["action"]=="loadexpertlist"){
	
		$sql="select * from tbexpert where idexpert = " . $_POST["id"];
		$result=mysql_db_query($database,$sql);
		$rowex=mysql_fetch_array($result);
		
		if(is_numeric($rowex["prefix"])){
			$prefix=$cf_prefix[$rowex["prefix"]];
		}else{
			$prefix=$rowex["prefix"];
		}
		$name=$prefix . $rowex['firstname'] . " " . $rowex['lastname'];

		echo "ผู้เชี่ยวชาญ : ".$name."<br>";
		echo "ที่อยู่ : ".$rowex['address'];

	echo '
	<table class="table table-hover">
    	<tr>
    		<th style="width:50px">ลำดับ</th>
    		<th style="width:250px">ความเชี่ยวชาญ</th>
    		<th style="width:250px">กลุ่มความเชี่ยวชาญ</th>
    		<th>tool</th>
    	</tr>';
	   	$n=0;
		$sql="select * from tbexpertlist where idexpert = " . $_POST["id"]."  order by idexpertlist ASC";
		$result=mysql_db_query($database,$sql);
	   	while($row=mysql_fetch_array($result)){
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='getexpertdetail'>$row[3]</font></a></td>";
			$id=$row["idg_expert"];
			$sql3="select * from tbg_expert where idg_expert = $id";
			$result3=mysql_db_query($database,$sql3);
			$row3=mysql_fetch_array($result3);					
					echo "<td>$row3[1]</td>";
					echo "<td>";
					echo "<a href='#$row[0]' title='แก้ไขข้อมูล' class='update_expert'><img src='img/edit.png'></a>&nbsp;&nbsp;<a href='#$row[0]' title='ลบข้อมูล' class='delItem_expertlist'><img src='img/del.png'></a> </td>";
					echo "";
				echo "</tr>";
			}
    echo "</table>";
	echo "<input type='hidden' class='form-control' name='idexpert' id='idexpert' value='". $_POST["id"]."'>";
	exit();		
}
	
mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?>);
</script>