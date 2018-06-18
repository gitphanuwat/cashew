<?php
	session_start();
	include('config/config.php');
	
		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	if($_GET["action"]=="getFromMember"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tbexpert where idexpert = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$db_prefix=$row["prefix"];
			$db_firstname=$row["firstname"];
			$db_lastname=$row["lastname"];
			$db_address=$row["address"];
			$db_postcode=$row["postcode"];
			$db_mobile=$row["mobile"];
			$db_email=$row["email"];
			$db_facebook=$row["facebook"];
			$db_picture=$row["picture"];
			$db_status=$row["status"];
		}

		echo " <form action='expert_data_form.php?action=insert_member' method='post' target='upload_target' onsubmit='clickSave();' >";
			
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
            				echo "<label >รหัสไปรษณีย์</label>";
							echo "<input type='text' class='form-control' name='postcode' value='$db_postcode'>";
            				echo "<label >เบอร์โทรศัพท์</label>";
            				echo "<input type='text' class='form-control' name='mobile' value='$db_mobile'>";
            				echo "<label >อีเมล์</label>";
							echo "<input type='text' class='form-control' name='email' value='$db_email'>";
            				echo "<label >เฟสบุ๊ค</label>";
							echo "<input type='text' class='form-control' name='facebook' value='$db_facebook'>";
            	echo "</div>";
            	echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-primary' id='butCancel'>Cancel</button>";
                echo "<input name='idexpert' type='hidden' value='$id' />";
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

		echo " <form action='expert_data_form.php?action=insert_group' method='post' target='upload_target' onsubmit='clickSave();' >";			
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

	if($_GET["action"]=="getFromg_expert"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tbg_expert where idg_expert = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$db_nameg_expert=$row["g_expertname"];
			$db_detail=$row["detail"];
			$db_keyman=$row["keyman"];

		}

		echo " <form action='expert_data_form.php?action=insert_g_expert' method='post' target='upload_target' onsubmit='clickSave();' >";			
            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";
            		echo "<label >ชื่อกลุ่มความเชี่ยวชาญ<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' name='g_expertname' placeholder='ชื่อกลุ่ม' value='$db_nameg_expert'>";
            		echo "<label >รายละเอียด</label>";
					echo "<input type='text' class='form-control' name='detail' value='$db_detail'>";
            		echo "<label >ผู้ประสานงาน</label>";
					echo "<input type='text' class='form-control' name='keyman' value='$db_keyman'>";
            	echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-primary' id='butCancel'>Cancel</button>";
                echo "<input name='idg_expert' id='idg_expert' type='hidden' value='$id' />";
				echo "<input name='permit' type='hidden' value='1' />";
				echo "<div id='uploadDialog_process' align='center'></div>";
				echo "<div id='loadDialog' align='center'>";
					echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
				echo "</div>";
            echo "</div>";
		echo "</form>";
		echo '<font color="red">';
		echo "หมายเหตุ การแก้ไข หรือลบ ข้อมูลกลุ่ม <br>กรุณาตรวจสอบผลกระทบกับข้อมูลสมาชิก";
		echo '</font>';
		echo "<script type='text/javascript'>			
			function clickSave(){
                $('#loadDialog').fadeIn();
                return true;
            }
			
		</script>";
		exit();
	}

	if($_GET["action"]=="getFromg_expertlist"){
		$id=$_GET["id"];
		$idexpertlist=$_GET["id"];
		$idexpert=$_GET["idexpert"];
		
		if($id !=""){
			$sql="select * from tbexpertlist where idexpertlist = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$idexpert=$row["idexpert"];
			$idg_expert=$row["idg_expert"];
			$nameexpertlist=$row["nameexpertlist"];
			$detail=$row["detail"];
			$website=$row["website"];
			$comment=$row["comment"];
		}

		echo " <form action='expert_data_form.php?action=insertexpertlist' method='post' target='upload_target' onsubmit='clickSave();' >";			
            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";
            		echo "<label >ชื่อกลุ่มความเชี่ยวชาญ<font color=\"red\">*</font></label>";
                         	
							$sqlg="select * from tbg_expert";
							$resultg=mysql_db_query($database,$sqlg);
							echo "<select class='form-control' id='idg_expert' name='idg_expert'>";
								echo "<option value=''>- เลือกกลุ่มความเชี่ยวชาญ -</option>";
								while($rowg=mysql_fetch_array($resultg)){
                            			echo "<option value='$rowg[0]' ";
                            			if($rowg[0]==$idg_expert){
                            				echo " selected='selected' ";
                            			}
                            			echo ">$rowg[1]</option>";
                            	}
                            echo "</select>";

					echo "<label >ด้านความเชี่ยวชาญ</label>";
					echo "<input type='text' class='form-control' name='nameexpertlist' value='$nameexpertlist'>";
            		echo "<label >รายละเอียด</label>";
					echo "<input type='text' class='form-control' name='detail' value='$detail'>";
            		echo "<label >ข้อมูลอื่นๆ</label>";
					echo "<input type='text' class='form-control' name='comment' value='$comment'>";
            	echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-primary' id='butCancel'>Cancel</button>";
				echo "<input name='idexpertlist' id='idexpertlist' type='hidden' value='$id' />";
				echo "<input name='idexpert' id='idexpert' type='hidden' value='$idexpert' />";
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

		$idexpert=$_POST["idexpert"];
		
		if($_POST["prefix"]!=4){
			$prefix=$_POST["prefix"];
		}else{
			$prefix=$_POST["txt_prefix"];
		}
			$firstname=$_POST["firstname"];
			$lastname=$_POST["lastname"];
			$address=$_POST["address"];
			$postcode=$_POST["postcode"];
			$mobile=$_POST["mobile"];
			$email=$_POST["email"];
			$facebook=$_POST["facebook"];
			$picture=$_POST["picture"];
			$status=$_POST["status"];
			$updatetime=$_POST["updatetime"];
		if($prefix=="" ){
			$msgerror=1;
		}else{
			if($idexpert !=""){
				$sql="update tbexpert set prefix='$prefix' , firstname='$firstname' , lastname='$lastname' ";
				$sql=$sql . " , address='$address', postcode='$postcode' ";
				$sql=$sql . " , mobile='$mobile' , email='$email' , facebook='$facebook' ";
				$sql=$sql . " , picture='$picture' , status='$status', updatetime='$updatetime' ";
				$sql=$sql . " where idexpert=$idexpert";
			}else{
				$sql="INSERT INTO tbexpert( `prefix` ";
				$sql=$sql . ", `firstname`, `lastname`, `address`, `postcode` ";
				$sql=$sql . ", `mobile`, `email`, `facebook`, `picture`, `status`, `updatetime`)";
				$sql=$sql . " VALUES ('$prefix' ";
				$sql=$sql . " , '$firstname', '$lastname', '$address', '$postcode' ";
				$sql=$sql . " , '$mobile', '$email', '$facebook', '$picture', '$status', '$updatetime');";
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

	if($_GET["action"]=="insert_g_expert"){
		$msgsuccess=0;
		$msgerror=0;
			$idg_expert=$_POST["idg_expert"];
			$g_expertname=$_POST["g_expertname"];
			$detail=$_POST["detail"];
			$keyman=$_POST["keyman"];

		if($g_expertname=="" ){
			$msgerror=1;
		}else{
			if($idg_expert !=""){
				$sql="update tbg_expert set g_expertname='$g_expertname' , detail='$detail' , comment='$comment' ";
				$sql=$sql . " , keyman='$keyman' ";
				$sql=$sql . " where idg_expert=$idg_expert";
			}else{
				$sql="INSERT INTO tbg_expert( `g_expertname` ";
				$sql=$sql . ", `detail`, `comment`, `keyman`)";
				$sql=$sql . " VALUES ('$g_expertname' ";
				$sql=$sql . " , '$detail', '$comment', '$keyman');";
			}
			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
	}
	if($_GET["action"]=="insertexpertlist"){
		$msgsuccess=0;
		$msgerror=0;
			$idexpertlist=$_POST["idexpertlist"];
			$idexpert=$_POST["idexpert"];
			$idg_expert=$_POST["idg_expert"];
			$nameexpertlist=$_POST["nameexpertlist"];
			$detail=$_POST["detail"];
			$website=$_POST["website"];
			$comment=$_POST["comment"];

		if($nameexpertlist=="" or $idg_expert==""){
			$msgerror=1;
		}else{
			if($idexpertlist !=""){
				$sql="update tbexpertlist set idg_expert='$idg_expert', nameexpertlist='$nameexpertlist' , detail='$detail' , website='$website' ";
				$sql=$sql . " , comment='$comment' ";
				$sql=$sql . " where idexpertlist=$idexpertlist";
			}else{
				$sql="INSERT INTO tbexpertlist( `idexpert`, `idg_expert`, `nameexpertlist` ";
				$sql=$sql . ", `detail`, `website`, `comment`)";
				$sql=$sql . " VALUES ('$idexpert', '$idg_expert', '$nameexpertlist' ";
				$sql=$sql . " , '$detail', '$website', '$comment');";
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