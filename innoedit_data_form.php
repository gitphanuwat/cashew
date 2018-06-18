<?php
	session_start();
	include('config/config.php');
	
		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	
	if($_GET["action"]=="getgroup"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tbinnogroup where idgroup = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$idgroup=$row["idgroup"];
			$namegroup=$row["namegroup"];
			$detail=$row["detail"];
			$icon=$row["icon"];
		}
		echo " <form action='innoedit_data_form.php?action=updategroup' method='post' enctype='multipart/form-data' target='upload_target' onsubmit='clickSavegroup();' >";
            	echo "<div class='form-group'>";
            		echo "<label >ชื่อผลงาน<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' name='namegroup' value='$namegroup'>";
            		echo "<label >ชื่อเจ้าของผลงาน</label><br>";
					//echo "<textarea name='detail' cols='50' rows='5' id='detail'>$detail</textarea>";
					echo "<textarea name='detail' class='textarea' style='width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;''>$detail</textarea>";
            		echo "<input type='hidden' class='form-control' name='icon' id='icon' value='$icon'>";
            	echo "</div>";
            echo "<div class='box-footer'>";
			echo '
				<div class="box-body border-radius-none">
            		<label>ไอคอนรูปภาพ</label>
					<div class="form-group">
						<div id="picbox" style="margin:auto;padding:10px;"></div>
					</div>
					<div class="form-group">
						<label>เปลียนรูปภาพ</label>
						<input type="file" name="fileField" id="fileField" >
					</div>
				</div>
			';
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-primary' id='butCancel'>Cancel</button>";
                echo "<input name='idgroup' type='hidden' value='$idgroup' />";
				echo "<div id='uploadformgroup' align='center'></div>";
				echo "<div id='loadformgroup' align='center'>";
					echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
				echo "</div>";
            echo "</div>";
		echo "</form>";


        echo "<script type='text/javascript'>";
        echo "</script>";

		echo "<script type='text/javascript'>";
            echo "$(document).ready(function(){";
                echo "$( '#datepicker' ).datepicker();";
                echo "$('.textarea').wysihtml5();";
                echo "$('#loadForm').fadeOut();";
            echo "});";
			echo "function clickSave(){
                $('#loadgroup').fadeIn();
                return true;
            }
		</script>";
		exit();
	}

	
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
			$db_tel=$row["tel"];
			$db_email=$row["email"];
			$db_position=$row["position"];
			$db_username=$row["username"];
			$db_password=$row["password"];
			$db_permit=$row["permit"];
			$db_idlevel=$row["idlevel"];

		}

		echo " <form action='innoedit_data_form.php?action=insert' method='post' target='upload_target' onsubmit='clickSave();' >";
			
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
                            				$db_prefix=$db_prefix;
                            			}else{
                            				$db_prefix=4;
                            			}

                            			if($i==$db_prefix){
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
                            if( is_numeric($db_prefix)){
                            }else{
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
							echo "<input type='text' class='form-control' name='tel' value='$db_tel'>";
            				echo "<label >อีเมล์</label>";
            				echo "<input type='text' class='form-control' name='email' value='$db_email'>";
            				echo "<label >ตำแหน่งงาน</label>";
							echo "<input type='text' class='form-control' name='position' value='$db_position'>";
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
                            			if(is_numeric($db_idlevel)){
                            				$db_idlevel=$db_idlevel;
                            			}else{
                            				$db_idlevel=4;
                            			}

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
				
				var prefix=$('#cboPrefix').val();
				if(prefix==4){
					$('#txtPrefix').show();
				}else{
					$('#txtPrefix').hide();
				}

				$('#cboPrefix').change(function(){
					var id=this.value;
					if(id==4){
						$('#txtPrefix').show();
					}else{
						$('#txtPrefix').hide();
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

if($_GET["action"]=="updategroup"){
		$msgsuccess=0;
		$msgerror=0;
		$box=1;

			$idgroup=$_POST["idgroup"];
			$namegroup=$_POST["namegroup"];
			$detail=$_POST["detail"];
			$icon=$_POST["icon"];
		
		if($namegroup=="" ){
			$msgerror=1;
		}else{
				if($idgroup !=""){
					
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
									$icon=$pname;
								$msgsuccess=1;
							}else{
								$msgerror=3;
							}
						}
					}

						$sql="update tbinnogroup set namegroup='$namegroup' , detail='$detail' , icon='$icon' ";
						$sql=$sql . " where idgroup=$idgroup";
				}else{
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
									$icon=$pname;
								$msgsuccess=1;
							}else{
								$msgerror=3;
							}
						}
					}
					$sql="INSERT INTO tbinnogroup( `namegroup` ";
					$sql=$sql . ", `detail`, `icon`)";
					$sql=$sql . " VALUES ('$namegroup' ";
					$sql=$sql . " , '$detail', '$icon');";
				}
			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
}

	mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?>, <?php echo $box ?>);
</script>