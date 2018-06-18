<?php
if($_SESSION["IASU_USER_ID"]==""){
		$_SESSION["IASU_USER_ID"]=-1;
		$userPic="user/profile_pic/logo.png";
}else{
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
		$sql="select  firstname , lastname , `picture` , updatetime  from tbuser where iduser=" . $_SESSION["IASU_USER_ID"];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
		$userName=$row[0] . " " . $row[1];
		$userRegDay=$row[3];
		if($row[2] !=""){
			$userPic="user/profile_pic/" . $row[2];
		}else{
			$userPic="user/profile_pic/user1.png";
		}
}
//////////////memu for Admin
	if($_SESSION["IASU_USER_STATE"]=="ADMIN"){
		echo "<li ";
		if($pageName=="home"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='index.php'>";
            		echo "<i class='fa fa-th'></i> <span>Home</span>";
            echo "</a>";
        echo "</li>";
		
		echo "<li class='treeview";
		if($pageName=="system"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='fa fa-laptop'></i>";
                echo "<span>จัดการข้อมูลระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="term"){
					echo " class='active'";
				}
				echo "><a href='adminViewTerm.php'><i class='fa fa-angle-double-right'></i> เทอมการศึกษา</a></li>";
				
				echo "<li";
				if($subpageName=="mainwork"){
					echo " class='active'";
				}
				echo "><a href='adminViewMainWork.php'><i class='fa fa-angle-double-right'></i> เตรียมหัวข้อภาระงาน</a></li>";
				
				echo "<li";
				if($subpageName=="source"){
					echo " class='active'";
				}
				echo "><a href='adminViewSource.php'><i class='fa fa-angle-double-right'></i> รายชื่อแหล่งทุน</a></li>";
            echo "</ul>";
        echo "</li>";
		
		echo "<li class='treeview";
		if($pageName=="config"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-list-alt'></i>";
                echo "<span>จัดการข้อมูลหน่วยงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="faculty"){
					echo " class='active'";
				}
				echo "><a href='cf_faculty.php'><i class='fa fa-angle-double-right'></i> คณะวิชา</a></li>";
				echo "<li";
				if($subpageName=="department"){
					echo " class='active'";
				}
				echo "><a href='cf_department.php'><i class='fa fa-angle-double-right'></i> ภาควิชา</a></li>";
				
				echo "<li";
				if($subpageName=="course"){
					echo " class='active'";
				}
				echo "><a href='cf_course.php'><i class='fa fa-angle-double-right'></i> หลักสูตร</a></li>";
				echo "<li";
				if($subpageName=="position"){
					echo " class='active'";
				}
				echo "><a href='cf_position.php'><i class='fa fa-angle-double-right'></i> ตำแหน่ง</a></li>";
				echo "<li";
				if($subpageName=="member"){
					echo " class='active'";
				}
				echo "><a href='adminMember.php'><i class='fa fa-angle-double-right'></i> สมาชิก</a></li>";
            echo "</ul>";
        echo "</li>";
		
		echo "<li class='treeview";
		if($pageName=="analyze"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-stats'></i>";
                echo "<span>วิเคราะห์ระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="mng_load"){
					echo " class='active'";
				}
				echo "><a href='mng_load.php'><i class='fa fa-angle-double-right'></i> สรุปติดตามภาระงาน</a></li>";
				
				echo "<li";
				if($subpageName=="statistics"){
					echo " class='active'";
				}
				echo "><a href='statistics.php'><i class='fa fa-angle-double-right'></i> รายงานสถิติผู้ใช้ระบบ</a></li>";
				
				echo "<li";
				if($subpageName=="analyze_by_User"){
					echo " class='active'";
				}
				echo "><a href='analyze_user.php'><i class='fa fa-angle-double-right'></i> ติดตามผู้ใช้ระบบ</a></li>";
            echo "</ul>";
        echo "</li>";
		echo "<li class='treeview";
		if($pageName=="report"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-th-list'></i>";
                echo "<span>สรุปรายงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="faculty"){
					echo " class='active'";
				}
				echo "><a href='rep_faculty.php'><i class='fa fa-angle-double-right'></i> บุคลากรแยกตามคณะ</a></li>";
				
				echo "<li";
				if($subpageName=="department"){
					echo " class='active'";
				}
				echo "><a href='rep_department.php'><i class='fa fa-angle-double-right'></i> บุคลากรแยกตามภาควิชา</a></li>";
				
				echo "<li";
				if($subpageName=="course"){
					echo " class='active'";
				}
				echo "><a href='rep_course.php'><i class='fa fa-angle-double-right'></i> บุคลากรแยกตามหลักสูตร</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="backups"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-cog'></i>";
                echo "<span>สำรองข้อมูลระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="term"){
					echo " class='active'";
				}
				echo "><a href='#'><i class='fa fa-angle-double-right'></i> สำรองระบบฐานข้อมูล</a></li>";
				
				echo "<li";
				if($subpageName=="mainwork"){
					echo " class='active'";
				}
				echo "><a href='#'><i class='fa fa-angle-double-right'></i> สำรองไฟล์ระบบ</a></li>";
				
				echo "<li";
				if($subpageName=="source"){
					echo " class='active'";
				}
				echo "><a href='#'><i class='fa fa-angle-double-right'></i> สำรองเอกสารระบบ</a></li>";
            echo "</ul>";
        echo "</li>";
		
		echo "<li class='treeview";
		if($pageName=="news"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-file'></i>";
                echo "<span>จัดการข่าวสารระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="News"){
					echo " class='active'";
				}
				echo "><a href='adminNews.php'><i class='fa fa-angle-double-right'></i> ข้อมูลข่าวสาร</a></li>";
				
				echo "<li";
				if($subpageName=="Calendar"){
					echo " class='active'";
				}
				echo "><a href='adminCalendar.php'><i class='fa fa-angle-double-right'></i> ปฏิทินกิจกรรม</a></li>";
				
				echo "<li";
				if($subpageName=="information"){
					echo " class='active'";
				}
				echo "><a href='adminInformation.php'><i class='fa fa-angle-double-right'></i> ข้อมูลอัพเดทระบบ</a></li>";
            echo "</ul>";
        echo "</li>";
					 echo'<li class="user-footer">
							<div class="pull-left">
								<a href="Profile.php" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="signout.php" class="btn btn-default btn-flat">Sign out</a>
							</div>
                          </li>';
	}
	
//////////////memu for Manager
	if($_SESSION["IASU_USER_STATE"]=="MANAGER"){
		echo "<li ";
		if($pageName=="home"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='index.php'>";
            		echo "<i class='fa fa-th'></i> <span>Home</span>";
            echo "</a>";
        echo "</li>";
		
		echo "<li class='treeview";
		if($pageName=="MemberProfile"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='fa fa-group'></i>";
                echo "<span>ประวัติส่วนตัว</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="Profile"){
					echo " class='active'";
				}
				echo "><a href='UserProfile.php'><i class='fa fa-angle-double-right'></i> ข้อมูลทั่วไป</a></li>";
								
				echo "<li";
				if($subpageName=="Hiswork"){
					echo " class='active'";
				}
				echo "><a href='UserHistoryWork.php'><i class='fa fa-angle-double-right'></i> ประวัติการทำงาน</a></li>";
				
				echo "<li";
				if($subpageName=="Education"){
					echo " class='active'";
				}
				echo "><a href='UserEducation.php'><i class='fa fa-angle-double-right'></i> ประวัติการศึกษา</a></li>";
				
				echo "<li";
				if($subpageName=="Expert"){
					echo " class='active'";
				}
				echo "><a href='UserExpert.php'><i class='fa fa-angle-double-right'></i> ความเชี่ยวชาญ</a></li>";
				
			echo "</ul>";
		echo "</li>";
		
		echo "<li class='treeview";
		if($pageName=="MemberTerm"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='fa fa-suitcase'></i>";
                echo "<span>ภาระงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
					$sql="select id_term , term , status from tb_term order by id_term desc";
					$result=mysql_db_query($database,$sql);
					while($row=mysql_fetch_array($result)){
						echo "<li";
						if($subpageName=="Term$row[0]"){
							echo " class='active'";
						}
						
						if($row[2]==1){
							$u=randomText(350);
							$hrefURL="workload.php?url=$u&term=$row[0]";
							$lbl="<small class='badge pull-right bg-green'>open</small>";
						}else{
							$hrefURL="#";
						}
						echo "><a href='$hrefURL'><i class='fa fa-angle-double-right'></i> $row[1] $lbl</a></li>";
					}
			echo "</ul>";
		echo "</li>";
		echo "<li class='treeview";
		if($pageName=="analyze"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-stats'></i>";
                echo "<span>วิเคราะห์ระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="mng_load"){
					echo " class='active'";
				}
				echo "><a href='mng_load.php'><i class='fa fa-angle-double-right'></i> สรุปติดตามภาระงาน</a></li>";
				
				echo "<li";
				if($subpageName=="statistics"){
					echo " class='active'";
				}
				echo "><a href='statistics.php'><i class='fa fa-angle-double-right'></i> รายงานสถิติผู้ใช้ระบบ</a></li>";
				
				echo "<li";
				if($subpageName=="analyze_by_User"){
					echo " class='active'";
				}
				echo "><a href='analyze_user.php'><i class='fa fa-angle-double-right'></i> ติดตามผู้ใช้ระบบ</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="information"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-tasks'></i>";
                echo "<span>ระบบสารสนเทศ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="allload"){
					echo " class='active'";
				}
				echo "><a href='x_total_load.php'><i class='fa fa-angle-double-right'></i> ข้อมูลภาระงานภาพรวม</a></li>";
				
				echo "<li";
				if($subpageName=="load"){
					echo " class='active'";
				}
				echo "><a href='x_report_load.php'><i class='fa fa-angle-double-right'></i> รายงานภาระงาน</a></li>";
				
				echo "<li";
				if($subpageName=="export"){
					echo " class='active'";
				}
				echo "><a href='x_staff_view_all.php'><i class='fa fa-angle-double-right'></i> ส่งออกประวัติส่วนตัว</a></li>";
				
			echo "</ul>";
		echo "</li>";

		echo "<li class='treeview";
		if($pageName=="report"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-th-list'></i>";
                echo "<span>สรุปรายงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="faculty"){
					echo " class='active'";
				}
				echo "><a href='rep_faculty.php'><i class='fa fa-angle-double-right'></i> บุคลากรแยกตามคณะ</a></li>";
				
				echo "<li";
				if($subpageName=="department"){
					echo " class='active'";
				}
				echo "><a href='rep_department.php'><i class='fa fa-angle-double-right'></i> บุคลากรแยกตามภาควิชา</a></li>";
				
				echo "<li";
				if($subpageName=="course"){
					echo " class='active'";
				}
				echo "><a href='rep_course.php'><i class='fa fa-angle-double-right'></i> บุคลากรแยกตามหลักสูตร</a></li>";
            echo "</ul>";
        echo "</li>";

        echo "<li class='treeview";
		if($pageName=="analyze1"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-hdd'></i>";
                echo "<span>สถิติการใช้ระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";				
				echo "<li";
				if($subpageName=="userstat"){
					echo " class='active'";
				}
				echo "><a href='statistics_by_user.php'><i class='fa fa-angle-double-right'></i> ประวัติการใช้ระบบ</a></li>";
								
			echo "</ul>";
		echo "</li>";
	}
	
//////////////memu for DEAN
	if($_SESSION["IASU_USER_STATE"]=="DEAN"){
		echo "<li ";
		if($pageName=="home"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='index.php'>";
            		echo "<i class='fa fa-th'></i> <span>Home</span>";
            echo "</a>";
        echo "</li>";
		
		echo "<li class='treeview";
		if($pageName=="MemberProfile"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='fa fa-group'></i>";
                echo "<span>ประวัติส่วนตัว</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="Profile"){
					echo " class='active'";
				}
				echo "><a href='UserProfile.php'><i class='fa fa-angle-double-right'></i> ข้อมูลทั่วไป</a></li>";
								
				echo "<li";
				if($subpageName=="Hiswork"){
					echo " class='active'";
				}
				echo "><a href='UserHistoryWork.php'><i class='fa fa-angle-double-right'></i> ประวัติการทำงาน</a></li>";
				
				echo "<li";
				if($subpageName=="Education"){
					echo " class='active'";
				}
				echo "><a href='UserEducation.php'><i class='fa fa-angle-double-right'></i> ประวัติการศึกษา</a></li>";
				
				echo "<li";
				if($subpageName=="Expert"){
					echo " class='active'";
				}
				echo "><a href='UserExpert.php'><i class='fa fa-angle-double-right'></i> ความเชี่ยวชาญ</a></li>";
				
			echo "</ul>";
		echo "</li>";
		
		echo "<li class='treeview";
		if($pageName=="MemberTerm"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='fa fa-suitcase'></i>";
                echo "<span>ภาระงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
					$sql="select id_term , term , status from tb_term order by id_term desc";
					$result=mysql_db_query($database,$sql);
					while($row=mysql_fetch_array($result)){
						echo "<li";
						if($subpageName=="Term$row[0]"){
							echo " class='active'";
						}
						
						if($row[2]==1){
							$u=randomText(350);
							$hrefURL="workload.php?url=$u&term=$row[0]";
							$lbl="<small class='badge pull-right bg-green'>open</small>";
						}else{
							$hrefURL="#";
						}
						echo "><a href='$hrefURL'><i class='fa fa-angle-double-right'></i> $row[1] $lbl</a></li>";
					}
			echo "</ul>";
		echo "</li>";

		echo "<li class='treeview";
		if($pageName=="faculty"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='fa fa-home'></i>";
                echo "<span>จัดการข้อมูลหน่วยงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="courseedit"){
					echo " class='active'";
				}
				echo "><a href='fac_course.php'><i class='fa fa-angle-double-right'></i> จัดการข้อมูลหลักสูตร</a></li>";
				
				echo "<li";
				if($subpageName=="personedit"){
					echo " class='active'";
				}
				echo "><a href='fac_person.php'><i class='fa fa-angle-double-right'></i> จัดการข้อมูลบุคลากร</a></li>";
				
				echo "<li";
				if($subpageName=="loadreport"){
					echo " class='active'";
				}
				echo "><a href='fac_load.php'><i class='fa fa-angle-double-right'></i> สรุปรายงานภาระงาน</a></li>";
				
			echo "</ul>";
		echo "</li>";

		echo "<li class='treeview";
		if($pageName=="information"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-tasks'></i>";
                echo "<span>ระบบสารสนเทศ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="allload"){
					echo " class='active'";
				}
				echo "><a href='x_total_load.php'><i class='fa fa-angle-double-right'></i> ข้อมูลภาระงานภาพรวม</a></li>";
				
				echo "<li";
				if($subpageName=="load"){
					echo " class='active'";
				}
				echo "><a href='x_report_load.php'><i class='fa fa-angle-double-right'></i> รายงานภาระงาน</a></li>";
				
				echo "<li";
				if($subpageName=="export"){
					echo " class='active'";
				}
				echo "><a href='x_staff_view_all.php'><i class='fa fa-angle-double-right'></i> ส่งออกประวัติส่วนตัว</a></li>";
				
			echo "</ul>";
		echo "</li>";

		echo "<li class='treeview";
		if($pageName=="report"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-th-list'></i>";
                echo "<span>สรุปรายงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="faculty"){
					echo " class='active'";
				}
				echo "><a href='rep_faculty.php'><i class='fa fa-angle-double-right'></i> บุคลากรแยกตามคณะ</a></li>";
				
				echo "<li";
				if($subpageName=="department"){
					echo " class='active'";
				}
				echo "><a href='rep_department.php'><i class='fa fa-angle-double-right'></i> บุคลากรแยกตามภาควิชา</a></li>";
				
				echo "<li";
				if($subpageName=="course"){
					echo " class='active'";
				}
				echo "><a href='rep_course.php'><i class='fa fa-angle-double-right'></i> บุคลากรแยกตามหลักสูตร</a></li>";
            echo "</ul>";
        echo "</li>";


		echo "<li class='treeview";
		if($pageName=="analyze"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-hdd'></i>";
                echo "<span>สถิติการใช้ระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="statistics"){
					echo " class='active'";
				}
				echo "><a href='statistics.php'><i class='fa fa-angle-double-right'></i> รายงานสถิติผู้ใช้ระบบ</a></li>";
				
				echo "<li";
				if($subpageName=="userstat"){
					echo " class='active'";
				}
				echo "><a href='statistics_by_user.php'><i class='fa fa-angle-double-right'></i> ประวัติการใช้ระบบ</a></li>";
								
			echo "</ul>";
		echo "</li>";
	}
	
//////////////memu for User
	if($_SESSION["IASU_USER_STATE"]=="USER"){
		
echo '    
<div class="collapse navbar-collapse navbar-right">
<ul class="nav navbar-nav">';
		echo "<li ";
		if($subpageName=="traderedit"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='traderedit.php'>";
            		echo "<i class='fa fa-th'></i> <span>แก้ไขข้อมูลแผนที่</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="trader"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='trader.php'>";
            		echo "<i class='fa fa-th'></i> <span>ผู้ประกอบการ</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="knowledge"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='knowledge.php'>";
            		echo "<i class='fa fa-th'></i> <span>องค์ความรู้</span>";
            echo "</a>";
        echo "</li>";
		echo "<li ";
		if($subpageName=="about"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='about.php'>";
            		echo "<i class='fa fa-th'></i> <span>About</span>";
            echo "</a>";
        echo "</li>";
echo "</ul>";
echo "</div>";
}
//////////////memu for Guest

?>