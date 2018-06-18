<?php
	session_start();
	include('config/config.php');
	
		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	if($_GET["action"]=="getFromMember"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tbuser where iduser = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$db_prefix=$row["prefix"];
			$db_firstname=$row["firstname"];
			$db_lastname=$row["lastname"];
			$db_address=$row["address"];
			$db_mobile=$row["mobile"];
			$db_email=$row["email"];
			$db_bu_position=$row["bu_position"];
			$db_username=$row["username"];
			$db_password=$row["password"];
			$db_permit=$row["permit"];
			$db_idlevel=$row["idlevel"];

		}

		echo " <form action='system_data_form.php?action=insert_member' method='post' target='upload_target' onsubmit='clickSave();' >";
			
            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";
            		echo "<label>คำนำหน้า<font color=\"red\">*</font></label>";
            		echo "<div class='row'>";
                        echo "<div class='col-lg-6'>";
                            echo "<select class='form-control' id='prefix' name='prefix'>";
                            	$i=0;
                            	foreach ($cf_prefix as &$value) {
                            		if($i>0){
                            			echo "<option value='$i' ";
                            			if(is_numeric($db_prefix)){
                            				$db_prefixset=$db_prefix;
                            			}else{
                            				$db_prefixset=4;
                            			}

                            			if($i==$db_prefixset){
                            				echo " selected='selected' ";
                            			}
                            			echo ">$value</option>";
                            		}
                            		$i++;
                            	}
                            echo "</select>";
                        echo "</div>";
                        echo "<div class='col-lg-6'>";
                            echo "<input type='text' class='form-control' id='txt_prefix' name='txt_prefix' ";
                            if( $db_prefixset==4){
								echo " value='$db_prefix' ";
                            }
                            echo " placeholder='คำนำหน้าชื่อ'>";
                        echo "</div>";
                    echo "</div>";
            	echo "</div>";
            	echo "<div class='form-group'>";
            		echo "<div class='row'>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >ชื่อ<font color=\"red\">*</font></label>";
            				echo "<input type='text' class='form-control' name='firstname' value='$db_firstname'>";
            			echo "</div>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >นามสกุล<font color=\"red\">*</font></label>";
            				echo "<input type='text' class='form-control' name='lastname' value='$db_lastname'>";
            			echo "</div>";
            		echo "</div>";
            	echo "</div>";
            	echo "<div class='form-group'>";
            		echo "<label >ที่อยู่<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' name='address' placeholder='ที่อยู่' value='$db_address'>";
            				echo "<label >เบอร์โทร</label>";
							echo "<input type='text' class='form-control' name='mobile' value='$db_mobile'>";
            				echo "<label >อีเมล์</label>";
            				echo "<input type='text' class='form-control' name='email' value='$db_email'>";
            				echo "<label >อาชีพ</label>";
							echo "<input type='text' class='form-control' name='bu_position' value='$db_bu_position'>";
            		echo "<div class='row'>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >ชื่อล็อกอิน<font color=\"red\">*</font></label>";
							echo "<input type='text' class='form-control' name='username' value='$db_username'>";
            			echo "</div>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >รหัสผ่าน<font color=\"red\">*</font></label>";
							echo "<input type='text' class='form-control' name='password' value='$db_password'>";
            			echo "</div>";
            		echo "</div>";
            				echo "<label >ระดับสิทธิ์การใช้ระบบ<font color=\"red\">*</font></label>";
                            echo "<select class='form-control' id='idlevel' name='idlevel'>";
                            	$i=0;
                            	foreach ($cf_userlevel as &$value) {
                            		if($i>0){
                            			echo "<option value='$i' ";
                            			if($i==$db_idlevel){
                            				echo " selected='selected' ";
                            			}
                            			echo ">$value</option>";
                            		}
                            		$i++;
                            	}
                            echo "</select>";
							
							
            	echo "</div>";
            	echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-primary' id='butCancel'>Cancel</button>";
                echo "<input name='iduser' type='hidden' value='$id' />";
				echo "<input name='permit' type='hidden' value='1' />";
				echo "<div id='uploadDialog_process' align='center'></div>";
				echo "<div id='loadDialog' align='center'>";
					echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
				echo "</div>";
            echo "</div>";
		echo "</form>";

		echo "<script type='text/javascript'>
			$(document).ready(function(){
				
				var prefix=$('#prefix').val();
				if(prefix==4){
					$('#txt_prefix').show();
				}else{
					$('#txt_prefix').hide();
				}

				$('#prefix').change(function(){
					var id=this.value;
					if(id==4){
						$('#txt_prefix').show();
					}else{
						$('#txt_prefix').hide();
					}
				});

				
			});
			
			function clickSave(){
                $('#loadDialog').fadeIn();
                return true;
            }
			
		</script>";
		exit();
	}

	if($_GET["action"]=="getFromGroup"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tbgroup where idgroup = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$db_groupname=$row["groupname"];
			$db_detail=$row["detail"];
			$db_comment=$row["comment"];
			$db_keyman=$row["keyman"];

		}

		echo " <form action='system_data_form.php?action=insert_group' method='post' target='upload_target' onsubmit='clickSave();' >";			
            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";
            		echo "<label >ชื่อกลุ่ม/เครือข่าย<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' name='groupname' placeholder='ที่อยู่' value='$db_groupname'>";
            		echo "<label >รายละเอียด</label>";
					echo "<input type='text' class='form-control' name='detail' value='$db_detail'>";
            		echo "<label >ที่ติดต่อ</label>";
            		echo "<input type='text' class='form-control' name='comment' value='$db_comment'>";
            		echo "<label >ผู้ประสานงาน</label>";
					echo "<input type='text' class='form-control' name='keyman' value='$db_keyman'>";
            	echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-primary' id='butCancel'>Cancel</button>";
                echo "<input name='idgroup' id='idgroup' type='hidden' value='$id' />";
				echo "<input name='permit' type='hidden' value='1' />";
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

	if($_GET["action"]=="getFromType"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tbtype where idtype = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$db_nametype=$row["nametype"];
			$db_detail=$row["detail"];
			$db_comment=$row["comment"];
			$db_icon=$row["icon"];

		}

		echo " <form action='system_data_form.php?action=insert_type' method='post' target='upload_target' onsubmit='clickSave();' >";			
            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";
            		echo "<label >ชื่อกลุ่มงาน<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' name='nametype' placeholder='ที่อยู่' value='$db_nametype'>";
            		echo "<label >รายละเอียด</label>";
					echo "<input type='text' class='form-control' name='detail' value='$db_detail'>";
            		echo "<label >อื่นๆ</label>";
            		echo "<input type='text' class='form-control' name='comment' value='$db_comment'>";
            		echo "<label >ไอคอน</label>";
					echo "<input type='text' class='form-control' name='icon' value='$db_icon'>";
            	echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-primary' id='butCancel'>Cancel</button>";
                echo "<input name='idtype' id='idtype' type='hidden' value='$id' />";
				echo "<input name='permit' type='hidden' value='1' />";
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



	if($_GET["action"]=="insert_member"){
		$msgsuccess=0;
		$msgerror=0;

		$iduser=$_POST["iduser"];
		
		if($_POST["prefix"]!=4){
			$prefix=$_POST["prefix"];
		}else{
			$prefix=$_POST["txt_prefix"];
		}
			$firstname=$_POST["firstname"];
			$lastname=$_POST["lastname"];
			$address=$_POST["address"];
			$mobile=$_POST["mobile"];
			$email=$_POST["email"];
			$bu_position=$_POST["bu_position"];
			$username=$_POST["username"];
			$password=$_POST["password"];
			$idlevel=$_POST["idlevel"];
			$permit=$_POST["permit"];
		if($prefix=="" ){
			$msgerror=1;
		}else{
			if($iduser !=""){
				$sql="update tbuser set prefix='$prefix' , firstname='$firstname' , lastname='$lastname' ";
				$sql=$sql . " , address='$address' ";
				$sql=$sql . " , mobile='$mobile' , email='$email' , bu_position='$bu_position' ";
				$sql=$sql . " , username='$username' , password='$password', idlevel='$idlevel', permit='$permit' ";
				$sql=$sql . " where iduser=$iduser";
			}else{
				$sql="INSERT INTO tbuser( `prefix` ";
				$sql=$sql . ", `firstname`, `lastname`, `address`";
				$sql=$sql . ", `mobile`, `email`, `bu_position`, `username`, `password`, `idlevel`, `permit`)";
				$sql=$sql . " VALUES ('$prefix' ";
				$sql=$sql . " , '$firstname', '$lastname', '$address' ";
				$sql=$sql . " , '$mobile', '$email', '$bu_position', '$username', '$password', '$idlevel', '$permit');";
			}
			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
	}

	if($_GET["action"]=="insert_group"){
		$msgsuccess=0;
		$msgerror=0;
			$idgroup=$_POST["idgroup"];
			$groupname=$_POST["groupname"];
			$detail=$_POST["detail"];
			$comment=$_POST["comment"];
			$keyman=$_POST["keyman"];

		if($groupname=="" ){
			$msgerror=1;
		}else{
			if($idgroup !=""){
				$sql="update tbgroup set groupname='$groupname' , detail='$detail' , comment='$comment' ";
				$sql=$sql . " , keyman='$keyman' ";
				$sql=$sql . " where idgroup=$idgroup";
			}else{
				$sql="INSERT INTO tbgroup( `groupname` ";
				$sql=$sql . ", `detail`, `comment`, `keyman`)";
				$sql=$sql . " VALUES ('$groupname' ";
				$sql=$sql . " , '$detail', '$comment', '$keyman');";
			}
			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
	}

	if($_GET["action"]=="insert_type"){
		$msgsuccess=0;
		$msgerror=0;
			$idtype=$_POST["idtype"];
			$nametype=$_POST["nametype"];
			$detail=$_POST["detail"];
			$comment=$_POST["comment"];
			$icon=$_POST["icon"];

		if($nametype=="" ){
			$msgerror=1;
		}else{
			if($idtype !=""){
				$sql="update tbtype set nametype='$nametype' , detail='$detail' , comment='$comment' ";
				$sql=$sql . " , icon='$icon' ";
				$sql=$sql . " where idtype=$idtype";
			}else{
				$sql="INSERT INTO tbtype( `nametype` ";
				$sql=$sql . ", `detail`, `comment`, `icon`)";
				$sql=$sql . " VALUES ('$nametype' ";
				$sql=$sql . " , '$detail', '$comment', '$icon');";
			}
			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
	}


	mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>