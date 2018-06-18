<?php
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");


	if($_GET["action"]=="getgroup"){

		$sql="select iduser , idgroup from tbuser where iduser =" . $_SESSION["IASU_USER_ID"];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);

		$user_group=$row[1];
		
		$sql="select idgroup , groupname from tbgroup";
		$result=mysql_db_query($database,$sql);
		//echo $_SESSION["IASU_USER_ID"];
		echo "<div class='form-group'>";
	        echo "<label >กลุ่ม/เครือข่าย</label>";
	        echo "<select class='form-control' name='cboGroup' >";
	        	echo "<option value='0'>:: เลือกกลุ่ม/เครือข่าย :: </option>";
		        while($row=mysql_fetch_array($result)){
		        	echo "<option value='$row[0]' ";
			        if($row[0]==$user_group){
			        	echo " selected='selected' ";
			        }
			        echo ">$row[1]</option>";
		        }
	        echo "</select>";
	    echo "</div>";

		exit();
	}
	
	
	if($_GET["action"]=="getData"){
		$pData=$_POST["pData"];
		$sql="select * from tbuser where iduser =" . $_SESSION["IASU_USER_ID"];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
			echo $row["iduser"] . "|";
			echo $row["idgroup"] . "|";
			echo $row["prefix"] . "|";
			echo $row["firstname"] . "|";
			echo $row["lastname"] . "|";
			echo $row["business"] . "|";
			echo $row["bu_address"] . "|";
			echo $row["bu_position"] . "|";
			echo $row["bu_tel"] . "|";
			echo $row["bu_fax"] . "|";
			echo $row["address"] . "|";
			echo $row["postcode"] . "|";
			echo $row["country"] . "|";
			echo $row["mobile"] . "|";
			echo $row["email"] . "|";
			echo $row["facebook"] . "|";
			echo $row["picture"] . "|";
			echo $row["username"] . "|";
			echo $row["password"] . "|";
		exit();
	}

	if($_GET["action"]=="getPic"){
			$sql= "select `picture` from tbuser where iduser= " . $_SESSION["IASU_USER_ID"];
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);
			if($row[0]==""){
				$userPic1="https://graph.facebook.com/".$_SESSION["IASU_USER_FACEBOOK"]."/picture";
				//$userPic1="user/profile_pic/logo.jpg";
			}else{
				$userPic1="user/profile_pic/" . $row[0];
			}		
		echo "<img src='$userPic1' width='115' height='115' class='img-rounded'/>";
		exit();
	}

	
	if($_GET["action"]=="update_data"){
		$msgsuccess=0;
		$msgerror=0;
		
		$box=$_POST["box"];
		if($box==1){
			//box 1
			$prefix=$_POST["cboPrefix"];
			if($prefix==4){
				$prefix=$_POST["txtPrefix"];
			}
			$firstname=$_POST["txtFirstname"];
			$lastname=$_POST["txtLastname"];
			$username=$_POST["username"];
			$password=$_POST["password"];
			
			if($firstname=="" || $lastname==""){
				$msgerror=1;
			}else{
				$sql="update tbuser set prefix='$prefix' ";
				$sql=$sql . " , firstname='$firstname' , lastname='$lastname' , username='$username' , password='$password' ";
				$sql=$sql . " where iduser=" . $_SESSION["IASU_USER_ID"];
				$resultAdd=mysql_db_query($database,$sql);
				$msgsuccess=1;
			}
		}else if ($box==3){
			//box 3
			$address=$_POST["txtAddress"];
			$postcode=$_POST["txtPostcode"];
			$country=$_POST["cbocf_country"];
			$mobile=$_POST["txtMobile"];
			$email=$_POST["txtEmail"];
			$facebook=$_POST["txtFacebook"];
			
			
			$sql="update tbuser set address='$address' , postcode='$postcode' , country='$country' , mobile='$mobile' ";
			$sql=$sql . " , email='$email', facebook='$facebook'  where iduser=" . $_SESSION["IASU_USER_ID"];
			$resultAdd=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}else if ($box==4){
			//box 4
			$work=$_POST["work"];
			$bu_address=$_POST["bu_address"];
			$bu_position=$_POST["bu_position"];
			$bu_tel=$_POST["bu_tel"];
			$bu_fax=$_POST["bu_fax"];
			$cboGroup=$_POST["cboGroup"];
			$sql="update tbuser set business='$work' , bu_address='$bu_address' , bu_position='$bu_position' , bu_tel='$bu_tel' , bu_fax='$bu_fax', idgroup='$cboGroup' ";
			$sql=$sql . " where iduser=" . $_SESSION["IASU_USER_ID"];
			$resultAdd=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
		sleep(1);
	}
	
	if($_GET["action"]=="update_pic"){
		$msgsuccess=0;
		$msgerror=0;
		$box=2;
		
		if($_FILES["fileField"]["error"]==4){
			$msgerror=1;
		}else{
			$accept_type=array("image/jpeg" , "image/gif" , "image/png");
			$file=$_FILES["fileField"]["name"];
			$typefile=$_FILES["fileField"]["type"];
			$sizefile=$_FILES["fileField"]["size"];
			$tempfile=$_FILES["fileField"]["tmp_name"];
			if(!in_array($typefile,$accept_type)){
				$msgerror=2;
			}else{
				$Str_file = explode(".",$file);
				$carr = count($Str_file)-1;
				$strname = $Str_file[$carr];
				$pname= "pic_" . randomText(10) . "." . $strname;
				$target_path = "user/profile_pic/" . $pname;
				if(@move_uploaded_file($tempfile,$target_path)){
						$sql="update tbuser set `picture`='$pname' ";
					$sql=$sql . "  where iduser=" .$_SESSION["IASU_USER_ID"];
					$result=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}else{
					$msgerror=3;
				}
			}
		}
		sleep(1);
	}
	
	
?>
<?php	
	mysql_close();
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> , <?php echo $box ?> );
</script>