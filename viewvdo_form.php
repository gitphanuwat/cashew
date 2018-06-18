<?php
	session_start();
	include('config/config.php');
	
		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	if($_GET["action"]=="getFormNews"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tb_vdo where idvdo = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$db_title=$row["title"];
			$db_vdo=$row["vdo"];
		}
			$uploadtime=date("Y/m/d");
			
		echo " <form action='viewvdo_form.php?action=insert' method='post' onsubmit='clickSave();' >";
			
            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";
            		echo "<label >ชื่อวีดีโอ<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' name='title' placeholder='โปรดระบุ' value='$db_title'>";
            		echo "<label >url วีดีโอ (YOUTUBE.COM)</label>";
					echo "<textarea class='form-control' name='vdo' rows='4'>$db_vdo</textarea>";
            		echo "<label >เวลา</label>";
            		echo "<input type='text' class='form-control' name='uploadtime' value='$uploadtime'>";
            	echo "</div>";
            echo "</div>";
			
			echo "<div class='box-footer'>";
				echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
				echo "<button type='button' class='btn btn-primary' id='butCancel'>Cancel</button>";
				echo "<input name='idvdo' id='idvdo' type='hidden' value='$id' />";
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

		$idvdo=$_POST["idvdo"];
		
		$title=$_POST["title"];
		$vdo=$_POST["vdo"];
		$uploadtime=$_POST["uploadtime"];			

		
		if($title=="" ){//|| $firstname=="" || $lastname=="" || $address==""|| $username==""|| $password==""
			$msgerror=1;
		}else{
			if($idvdo !=""){
				$sql="update tb_vdo set uploadtime='$uploadtime' , title='$title' , vdo='$vdo' ";
				$sql=$sql . " where idvdo=$idvdo";
			}else{
				$sql="INSERT INTO tb_vdo( `uploadtime` ";
				$sql=$sql . ", `title`, `vdo`)";
				$sql=$sql . " VALUES ('$uploadtime' ";
				$sql=$sql . " , '$title', '$vdo');";
			}
			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
		echo "<script language=\"javascript\">window.location.href = 'viewvdo.php'</script>";
	}

	mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>