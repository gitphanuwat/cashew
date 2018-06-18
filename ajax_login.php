<?php
	//ob_start();
	session_start();
	include('config/config.php');
	
	$uName = $_POST['userid'];
	$pWord = $_POST['password'];
	$ch=$_POST['remember_me'];

require 'sdk/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '861331490662204',
  'secret' => '7eb74f5172f3170430cca12480b05810',
  //'appId'  => '1735181316713944',
  //'secret' => '475ea99597da937d75317e90b68a5655',
));

// Get User ID facebook
$user = $facebook->getUser();

if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

if($_GET["Action"] == "Logout")
{
	$facebook->destroySession();
	header("location:index.php");
	exit();
}

		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
		
	//login สมาชิก
	if($loginState==0){
		$sql="select * from tbuser where `username` = '$uName' and `password`='$pWord' ";
		$sql=$sql . " and permit='1' ";
		$result=mysql_db_query($database,$sql);
		$nRow=mysql_num_rows($result);
		if($nRow !=0){
			//ตรวจสอบการอนมุติการใช้งาน
			if($row["permit"]=='0'){
				echo '0';
			}else{
				$row=mysql_fetch_array($result);
				$_SESSION["IASU_USER_ID"]=$row["iduser"];
				$_SESSION["IASU_USER_NAME"]=$row["firstname"]." ".$row["lastname"];
				$_SESSION["IASU_USER_FACEBOOK"]=$row["facebook"];
				$_SESSION["IASU_USER_PICTURE"]=$row["picture"];
				$_SESSION["IASU_USER_STATE"]=$cf_userlevel[$row["idlevel"]];
				$_SESSION["IASU_USER_TIME"]=$row["updatetime"];

		if($ch=="1"){
			//setcookie (“COOKIE_IASU_USER_ID”,”$row[0]”,time()+1000 );
			//setcookie (“COOKIE_IASU_USER_STATE”,”ADMIN”,time()+1000 );
		}

				$ip=getIP();
				$logdatetime = date("Y-m-d H:i:s");
				$sql="insert into cf_log_userlogin(id_user , logdatetime , ip) ";
				$sql=$sql . " values(" . $row["id_user"] . ", '$logdatetime' , '$ip')";
				$result1=mysql_db_query($database,$sql);
				echo 'true';
			}
		}else{
			echo 'false';
		}
	}
	mysql_close();
	//ob_end_flush();

	function getIP(){
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';	

		return $ipaddress;
	}
?>