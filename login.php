<?php
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");

require 'sdk/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '861331490662204',
  'secret' => '7eb74f5172f3170430cca12480b05810',
  //'appId'  => '1735181316713944',
  //'secret' => '475ea99597da937d75317e90b68a5655',
));

// Get User ID
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

if ($user) {
	if($_GET["code"] != "")
	{
		$sql="select * from tbuser where `facebook` = ".$user_profile["id"];
		$result=mysql_db_query($database,$sql);
		$nRow=mysql_num_rows($result);
		if($nRow ==0){
				$sql ="  INSERT INTO  tbuser (firstname,lastname,facebook,idlevel,permit,updatetime)
					VALUES
					('".trim($user_profile["name"])."',
					'(FB)',
					'".trim($user_profile["id"])."',
					'3',
					'1',
					'".trim(date("Y-m-d H:i:s"))."')";
				$result=mysql_db_query($database,$sql);
		}
	}
		$sql="select * from tbuser where facebook = ".$user_profile["id"];
		$sql=$sql . " and permit ='1' ";
		$result=mysql_db_query($database,$sql);
		$nRow=mysql_num_rows($result);
		if($nRow !=0){
				$row=mysql_fetch_array($result);
				$_SESSION["IASU_USER_ID"]=$row["iduser"];
				$_SESSION["IASU_USER_NAME"]=$row["firstname"]." ".$row["lastname"];
				$_SESSION["IASU_USER_FACEBOOK"]=$row["facebook"];
				$_SESSION["IASU_USER_PICTURE"]=$row["picture"];
				$_SESSION["IASU_USER_STATE"]=$cf_userlevel[$row["idlevel"]];
				$_SESSION["IASU_USER_TIME"]=$row["updatetime"];
		}
		mysql_close();
  	header("location:index.php");
}

if($_GET["Action"] == "Logout")
{
	$facebook->destroySession();
	header("location:index.php");
	exit();
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="bg-black">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $PageTitle ?></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-black">
<?php 	if($_GET['action']=='ok'){
			echo "<br><br><br><h3 class='text-center'>ลงทะเบียนเสร็จสิ้น สามารถล็อกอินเข้าระบบได้ทันที</h3>";
		}
?>
		<div class="form-box" id="login-box">
            <div class="header" style="background-color:#CCCCCC"> <a href="http://localhost/cashew/" target="_blank"><img src='images/logo2.png' width="200" /></a> Sign In</div>
            <form action="./" method="post">
                <div class="body bg-gray">
                	<div  id="add_err"></div>
                    				<div class="form-group">
                        			<input type="text" id="userid" name="userid" class="form-control" placeholder="User ID"  value="demo"/>
                  				  </div>
                   			 		<div class="form-group">
                       				 <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="demo"/>
                    			</div>
                    		<div class="form-group">
                                <input name="remember_me" type="checkbox" id="remember_me" value="1"/>
                              	Remember me
                    		</div>
                </div>
                <div class="footer">
                      <div class="row">
                    		<div class="col-md-6">
                    <button type="submit" class="btn bg-olive btn-block" id="login">Sign me in</button>
                                                   </div>
                    		<div class="col-md-6">
  <button type="submit" class="btn bg-olive btn-block" id="cancle">Cancel</button>
      </div>
          </div><br />
                    <i class='glyphicon glyphicon-user'> </i><a href="register.php" class="text-center">Register a new membership</a>
                    <br />
        			<i class="fa fa-facebook"> </i><a href="<?php echo $loginUrl; ?>"> Login with <div class='label label-primary'>FACEBOOK</div></a>

                </div>
            </form>

        </div>

</body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/login.js"></script>
