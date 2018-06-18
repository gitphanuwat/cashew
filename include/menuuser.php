<?php 
  echo '<ul class="nav nav-tabs navbar-right">';
		echo "<li ";
		if($subpageName=="news"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='news.php'>";
            		echo "<i class='fa fa-envelope-o'></i> <span>ประกาศ</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="traderedit"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='traderedit.php'>";
            		echo "<i class='fa fa-globe'></i> <span>ผู้ประกอบการ</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="userprofile"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='UserProfile.php'>";
            		echo "<i class='fa fa-user'></i> <span>แก้ไขข้อมูลส่วนตัว</span>";
            echo "</a>";
        echo "</li>";
		//admin
		if($_SESSION["IASU_USER_STATE"]=="ADMIN"){
		echo "<li ";
		if($subpageName=="banner"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='banner.php'>";
            		echo "<i class='fa  fa-columns'></i> <span>ป้ายประชาสัมพันธ์</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="activityedit"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='activityedit.php'>";
            		echo "<i class='fa fa-clipboard'></i> <span>องค์ความรู้</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="innoedit"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='innoedit.php'>";
            		echo "<i class='fa fa-clipboard'></i> <span>งานนวัตกรรม</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="case"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='case.php'>";
            		echo "<i class='fa fa-clipboard'></i> <span>โจทย์วิจัยชุมชน</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="expert"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='expert.php'>";
            		echo "<i class='fa fa-clipboard'></i> <span>ฐานข้อมูลผู้เชี่ยวชาญ</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="newsfb"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='viewnews.php'>";
            		echo "<i class='fa fa-envelope-o'></i> <span>ข่าวสารเฟสบุ๊ค</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="vdo"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='viewvdo.php'>";
            		echo "<i class='fa fa-clipboard'></i> <span>วีดีโอ</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="download"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='download.php'>";
            		echo "<i class='fa fa-clipboard'></i> <span>ดาว์นโหลด</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="system"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='system.php'>";
            		echo "<i class='fa fa-gear'></i> <span>จัดการข้อมูลระบบ</span>";
            echo "</a>";
        echo "</li>";
		}
		//end admin
  echo '</ul>';	
?>

