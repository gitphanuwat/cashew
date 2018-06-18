<?php
	//member facebook
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

// Logout
if($_GET["Action"] == "Logout")
{
	$facebook->destroySession();
	header("location:index.php");
	exit();
}

// member register
$userName=$_SESSION["IASU_USER_NAME"];
$userState=$_SESSION["IASU_USER_STATE"];
if ($_SESSION["IASU_USER_PICTURE"]){
	$userPic="user/profile_pic/".$_SESSION["IASU_USER_PICTURE"];
} else {
	$userPic="https://graph.facebook.com/".$_SESSION["IASU_USER_FACEBOOK"]."/picture";
}
//else{
	//$userPic="https://graph.facebook.com/".$_SESSION["IASU_USER_FACEBOOK"]."/picture";
	//$userPic="user/profile_pic/user.png";
//}
//////////////main memu
		echo "<li ";
		if($pageName=="home"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='index.php'>";
            		echo "<i class='fa fa-th'></i> <span>หน้าแรก</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($pageName=="trader"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='innovation.php'>";
            		echo "<i class='fa fa-th'></i> <span>ผลิตภัณฑ์</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($pageName=="knowledge"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='trader.php'>";
            		echo "<i class='fa fa-th'></i> <span>เกษตรกร</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($pageName=="about"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='activity.php'>";
            		echo "<i class='fa fa-th'></i> <span>องค์ความรู้</span>";
            echo "</a>";
        echo "</li>";

		if($_SESSION["IASU_USER_STATE"]=="ADMIN" or $_SESSION["IASU_USER_STATE"]=="MANAGER" or $_SESSION["IASU_USER_STATE"]=="USER" or $user!=""){
						echo '
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>'.$userName.' <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header bg-light-blue" align="center">
                                    <img src="'.$userPic .'" class="img-circle" alt="User Image" width="100"/>
                                    <p><font color="#FFFFFF">
                                        '. $userName .' - '. $userState .'
                                        <br><small>Member since '. $_SESSION["IASU_USER_TIME"].'</font></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div align="center">
                                        <a href="signout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div><br>
                                </li>
                            </ul>
                        </li>
                    ';
			}else{
			echo "<li>";
        	echo "<a href='login.php'>";
			echo "<i class='glyphicon glyphicon-user'></i>";
                echo "ระบบสมาชิก";
            echo "</a>";
			echo "</li>";
		}
?>
