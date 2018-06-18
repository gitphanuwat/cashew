<?php
	session_start();
	include('config/config.php');
	
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	$iduser=$_SESSION["IASU_USER_ID"];
	
	if($_GET["action"]=="showproduct"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tbproduct where idproduct = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$idproduct=$row["idproduct"];
			$product=$row["product"];
			$detail=$row["detail"];
			$price=$row["price"];
			$promote=$row["promote"];
			$picture=$row["picture"];
		}
			echo "<div class='row'>";
				echo "<div class='col-lg-12'>";
					echo "<div class='box'>";
						echo "<div class='box-header'>";
							echo "<img src='user/profile_pic/$picture' width='300'>";
							echo "<h3 class='box-title'>$product</h3>";
						echo "</div>";
						echo "<div class='box-body table-responsive no-padding'>";
							echo "<p><b>หัวเรื่องบริการ</b> : $product</p>";
							echo "<p><b>รายละเอียด</b> : $detail</p>";
							echo "<p><b>ผู้ติดต่อ</b> : $price</p>";
							echo "<p><b>อื่นๆ</b> : $promote</p>";
						echo "</div>";
						 echo "<button type='button' class='btn btn-primary' id='butclose'>Close</button>";
					echo "</div>";
				echo "</div>";
			echo "</div>";

		exit();
	}
	
	if($_GET["action"]=="showproduct"){
	$sql="select * from tbproduct where idbase = $idbase 
	order by idproduct ASC";
	$result=mysql_db_query($database,$sql);
	echo '<table class="table table-hover">
    	<tr>
    		<th></th>
    		<th>หัวข้อบริการ</th>
    		<th>ผู้ติดต่อ</th>
            <th></th>
    	</tr>';

	   		while($row=mysql_fetch_array($result)){
				echo "<tr>";
					echo "<td><img src='user/profile_pic/$row[7]' width='120'></td>";
					echo "<td>$row[3]</td>";
					echo "<td>$row1[5]</td>";
					echo "<td><a href='#$row[0]' title='แสดงข้อมูล'id='but' class='but'><span class=\"label label-primary\">แสดงข้อมูล</span></a> 
					</td>";
				echo "</tr>";
				
			}
	   echo "</table>";
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
			$msgerror=4;
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

						$sql="update tbknowgroup set namegroup='$namegroup' , detail='$detail' , icon='$icon' ";
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
					$sql="INSERT INTO tbknowgroup( `namegroup` ";
					$sql=$sql . ", `detail`, `icon`)";
					$sql=$sql . " VALUES ('$namegroup' ";
					$sql=$sql . " , '$detail', '$icon');";
				}
			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
}

//--------------------------------------------product --------------------------------------------------------
	if($_GET["action"]=="editproduct"){
		$id=$_GET["id"];
		$idbase=$_GET["idbase"];
		
		if($id !=0){
			$sql="select * from tbproduct where idproduct = $id";
			$result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);

			$idproduct=$row["idproduct"];
			$idbase=$row["idbase"];
			$product=$row["product"];
			$detail=$row["detail"];
			$price=$row["price"];
			$promote=$row["promote"];
			$picture=$row["picture"];
		}
		echo " <form action='trader_data_form.php?action=updateproduct' method='post' enctype='multipart/form-data' target='upload_target' onsubmit='clickSaveproduct();' >";
            	echo "<div class='form-group'>";
            		echo "<label >หัวข้อการบริการ<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' name='product' value='$product'>";
            		echo "<label >รายละเอียด</label><br>";
					echo "<textarea name='detail' cols='75' id='detail'>$detail</textarea><br>";
            		echo "<label >ผู้ติดต่อ</label>";
            		echo "<input type='text' class='form-control' name='price' value='$price'>";
            		echo "<label >อื่นๆ</label><br>";
					echo "<textarea name='promote' cols='75' id='promote'>$promote</textarea>";

            		echo "<input type='hidden' class='form-control' name='icon' id='icon' value='$icon'>";
            	echo "</div>";
            echo "<div class='box-footer'>";
			echo '
				<div class="box-body border-radius-none">
            		<label>รูปภาพประกอบ</label>
					<div class="form-group">
						<div id="picbox" style="margin:auto;padding:10px;"><img src="user/profile_pic/'.$picture.'" width="120"></div>
					</div>
					<div class="form-group">
						<label>เปลียนรูปภาพ</label>
						<input type="file" name="fileField" id="fileField" >
					</div>
				</div>
			';
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-primary' id='butclose'>Cancel</button>";
                
				echo "<input name='idproduct' type='hidden' value='$idproduct' />";
				echo "<input name='idbase' type='hidden' value='$idbase' />";
				echo "<input name='iduser' type='hidden' value='$iduser' />";
				echo "<input name='picture' type='hidden' value='$picture' />";
				
				echo "<div id='uploadformproduct' align='center'></div>";
				echo "<div id='loadformproduct' align='center'>";
					echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
				echo "</div>";
            echo "</div>";
		echo "</form>";

		exit();
	}


if($_GET["action"]=="updateproduct"){
		$msgsuccess=0;
		$msgerror=0;
		$box=2;

			$idproduct=$_POST["idproduct"];
			$idbase=$_POST["idbase"];
			$product=$_POST["product"];
			$detail=$_POST["detail"];
			$price=$_POST["price"];
			$promote=$_POST["promote"];
			$picture=$_POST["picture"];

		if($product=="" ){
			$msgerror=1;
		}else{
				if($idproduct !=""){
					
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
								$picture=$pname;
								$msgsuccess=1;
							}else{
								$msgerror=3;
							}
						}
					}

						$sql="update tbproduct set product='$product' , detail='$detail' , price='$price', promote='$promote', picture='$picture' ";
						$sql=$sql . " where idproduct=$idproduct";
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
								$picture=$pname;
								$msgsuccess=1;
							}else{
								$msgerror=3;
							}
						}
					}
					$sql="INSERT INTO tbproduct( `idbase`, `iduser`, `product` ";
					$sql=$sql . ", `detail`, `price`, `promote`, `picture`)";
					$sql=$sql . " VALUES ('$idbase', '$iduser', '$product' ";
					$sql=$sql . " , '$detail', '$price', '$promote', '$picture');";
				}
			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
}

	mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?>, <?php echo $box ?>, <?php echo $idbase ?> );
</script>