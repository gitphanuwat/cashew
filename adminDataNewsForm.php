<?php
	session_start();
	include('config/config.php');
	
		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	if($_GET["action"]=="getFormNews"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tbnews where news_id = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$db_title=$row["title"];
			$db_detail=$row["detail"];
		}
			$day_in=date("Y/m/d");
			
		echo " <form action='adminDataNewsForm.php?action=insert' method='post' onsubmit='clickSave();' >";
			
            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";
            		echo "<label >หัวข้อข่าว<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' name='title' placeholder='โปรดระบุ' value='$db_title'>";
            		echo "<label >url บนเฟสบุ๊ค</label>";
					echo "<textarea class='form-control' name='detail' rows='4'>$db_detail</textarea>";
            		echo "<label >เวลา</label>";
            		echo "<input type='text' class='form-control' name='day_in' value='$day_in'>";
            	echo "</div>";
            echo "</div>";
			
			echo "<div class='box-footer'>";
				echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
				echo "<button type='button' class='btn btn-primary' id='butCancel'>Cancel</button>";
				echo "<input name='news_id' id='news_id' type='hidden' value='$id' />";
				echo "<div id='uploadDialog_process' align='center'></div>";
				echo "<div id='loadDialog' align='center'>";
					echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
				echo "</div>";				
			echo "</div>";
		echo "</form>";

		echo "<script type='text/javascript'>
			function clickSave(){
                $('#loadDialog').fadeIn();
                return true;
            }
		</script>";
		exit();
	}


	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;

		$news_id=$_POST["news_id"];
		
		$title=$_POST["title"];
		$detail=$_POST["detail"];
		$day_in=$_POST["day_in"];			

		
		if($title=="" ){//|| $firstname=="" || $lastname=="" || $address==""|| $username==""|| $password==""
			$msgerror=1;
		}else{
			if($news_id !=""){
				$sql="update tbnews set day_in='$day_in' , title='$title' , detail='$detail' ";
				$sql=$sql . " where news_id=$news_id";
			}else{
				$sql="INSERT INTO tbnews( `day_in` ";
				$sql=$sql . ", `title`, `detail`)";
				$sql=$sql . " VALUES ('$day_in' ";
				$sql=$sql . " , '$title', '$detail');";
			}
			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
		echo "<script language=\"javascript\">window.location.href = 'viewnews.php'</script>";
	}

	mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>