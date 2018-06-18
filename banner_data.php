<?php
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");



	if($_GET["action"]=="getPic_bg1"){
			$sql= "select `background1` from tbbanner";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);
				$bgPic1="user/profile_pic/" . $row[0];
		echo "<img src='$bgPic1' width='115' height='115' class='img-rounded'/>";
		exit();
	}
	if($_GET["action"]=="getPic_bg2"){
			$sql= "select `background2` from tbbanner";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);
				$bgPic2="user/profile_pic/" . $row[0];
		echo "<img src='$bgPic2' width='115' height='115' class='img-rounded'/>";
		exit();
	}
	if($_GET["action"]=="getPic_bg3"){
			$sql= "select `background3` from tbbanner";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);
				$bgPic3="user/profile_pic/" . $row[0];
		echo "<img src='$bgPic3' width='115' height='115' class='img-rounded'/>";
		exit();
	}

	if($_GET["action"]=="getPic_im1"){
			$sql= "select `images1` from tbbanner";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);
				$imPic1="user/profile_pic/" . $row[0];
		echo "<img src='$imPic1' width='115' height='115' class='img-rounded'/>";
		exit();
	}
	if($_GET["action"]=="getPic_im2"){
			$sql= "select `images2` from tbbanner";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);
				$imPic2="user/profile_pic/" . $row[0];
		echo "<img src='$imPic2' width='115' height='115' class='img-rounded'/>";
		exit();
	}
	if($_GET["action"]=="getPic_im3"){
			$sql= "select `images3` from tbbanner";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);
				$imPic3="user/profile_pic/" . $row[0];
		echo "<img src='$imPic3' width='115' height='115' class='img-rounded'/>";
		exit();
	}
	
	if($_GET["action"]=="insertPic_bg1"){
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
						$sql="update tbbanner set `background1`='$pname' ";
					$sql=$sql . "  where idbanner=" .$_POST["idbanner"];
					$result=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}else{
					$msgerror=3;
				}
			}
		}
		sleep(1);
	}
	if($_GET["action"]=="insertPic_bg2"){
		$msgsuccess=0;
		$msgerror=0;
		$box=5;
		
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
						$sql="update tbbanner set `background2`='$pname' ";
					$sql=$sql . "  where idbanner=" .$_POST["idbanner"];
					$result=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}else{
					$msgerror=3;
				}
			}
		}
		sleep(1);
	}
	if($_GET["action"]=="insertPic_bg3"){
		$msgsuccess=0;
		$msgerror=0;
		$box=8;
		
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
						$sql="update tbbanner set `background3`='$pname' ";
					$sql=$sql . "  where idbanner=" .$_POST["idbanner"];
					$result=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}else{
					$msgerror=3;
				}
			}
		}
		sleep(1);
	}
	
	
	
	
	if($_GET["action"]=="insertPic_im1"){
		$msgsuccess=0;
		$msgerror=0;
		$box=3;
		
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
						$sql="update tbbanner set `images1`='$pname' ";
					$sql=$sql . "  where idbanner=" .$_POST["idbanner"];
					$result=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}else{
					$msgerror=3;
				}
			}
		}
		sleep(1);
	}
	if($_GET["action"]=="insertPic_im2"){
		$msgsuccess=0;
		$msgerror=0;
		$box=6;
		
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
						$sql="update tbbanner set `images2`='$pname' ";
					$sql=$sql . "  where idbanner=" .$_POST["idbanner"];
					$result=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}else{
					$msgerror=3;
				}
			}
		}
		sleep(1);
	}
	if($_GET["action"]=="insertPic_im3"){
		$msgsuccess=0;
		$msgerror=0;
		$box=9;
		
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
						$sql="update tbbanner set `images3`='$pname' ";
					$sql=$sql . "  where idbanner=" .$_POST["idbanner"];
					$result=mysql_db_query($database,$sql);
					$msgsuccess=1;
				}else{
					$msgerror=3;
				}
			}
		}
		sleep(1);
	}



	if($_GET["action"]=="updatebanner1"){
		$msgsuccess=0;
		$msgerror=0;
		$box=1;
		$title1=$_POST["title1"];
		$title2=$_POST["title2"];
		$title3=$_POST["title3"];
		if($title1==""){
			$msgerror=1;
		}else{
			$sql="update tbbanner set  title1='$title1' , title2='$title2' , title3='$title3' ";
			$sql=$sql . " where idbanner = " . $_POST["idbanner"];
			$resultAdd=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
		sleep(1);
	}
	if($_GET["action"]=="updatebanner2"){
		$msgsuccess=0;
		$msgerror=0;
		$box=4;
		$title4=$_POST["title4"];
		$title5=$_POST["title5"];
		$title6=$_POST["title6"];
		if($title4==""){
			$msgerror=1;
		}else{
			$sql="update tbbanner set  title4='$title4' , title5='$title5' , title6='$title6' ";
			$sql=$sql . " where idbanner = " . $_POST["idbanner"];
			$resultAdd=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
		sleep(1);
	}
	if($_GET["action"]=="updatebanner3"){
		$msgsuccess=0;
		$msgerror=0;
		$box=7;
		$title7=$_POST["title7"];
		$title8=$_POST["title8"];
		$title9=$_POST["title9"];
		if($title7==""){
			$msgerror=1;
		}else{
			$sql="update tbbanner set  title7='$title7' , title8='$title8' , title9='$title9' ";
			$sql=$sql . " where idbanner = " . $_POST["idbanner"];
			$resultAdd=mysql_db_query($database,$sql);
			$msgsuccess=1;
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