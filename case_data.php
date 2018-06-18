<?php
	session_start();
	include('config/config.php');

	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	if($_GET["action"]=="getData"){
		echo "<table class='table table-hover'>";
        	echo "<tr>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th width='120'>วันที่</th>";
                echo "<th>หัวข้อ</th>";
				echo "<th>สถานะ</th>";
                echo "<th width='100'>Views</th>";
				if($_SESSION["IASU_USER_STATE"]=='MEMBER'){
                	echo "<th width='100'>Tools</th>";
				}
            echo "</tr>";
            $i=1;
            $sql="select case_id , day_in , title , count_view, status from tb_case order by case_id desc";
            $sql=$sql . " LIMIT 10 ";
            $result=mysql_db_query($database,$sql);
            while($row=mysql_fetch_array($result)){
            	echo "<tr>";
            		echo "<td>$i</td>";
					$day_in=strtotime($row["day_in"]);
					$day_in=date("d/m/Y",$day_in);
            		echo "<td>$day_in</td>";
            		echo "<td><a href='#$row[0]' class='viewItem' >$row[2]</a></td><td>";
					if($row[4]==1){
						echo "<small class='label label-danger'>บันทึกใหม่</small>";
						}else if($row[4]==2){
							echo "<small class='label label-info'>ดำเนินการ</small>";
							}else if($row[4]==3){
								echo "<small class='label label-success'>เสร็จสิ้น</small>";
								}
                    echo "</td><td><small class='label label-default'><i class='fa fa-clock-o'></i>&nbsp;ดู $row[3]  ครั้ง </small></td>";
					if($_SESSION["IASU_USER_STATE"]=='ADMIN'){
                    echo "<td><a href='#$row[0]' title='upload file' class='uploadItem'><img src='img/file.png'></a>&nbsp;&nbsp;";
            		echo "<a href='#$row[0]' title='Edit' class='editItem'><img src='img/edit.png'></a>&nbsp;&nbsp;";
                    echo "<a href='#$row[0]' title='Delete' class='delItem'><img src='img/del.png'></a></td>";
					}
            	echo "</tr>";
            	$i++;
            }
        echo "</table>";

		exit();
	}


    if($_GET["action"]=="getForm"){
		if($_SESSION["IASU_USER_STATE"]=='ADMIN' or $_SESSION["IASU_USER_STATE"]=='USER'){
        $id=$_GET["id"];
        $day_in=date("Y/m/d");

        if($id !=""){
            $sql="select * from tb_case where case_id = $id";
            $result=mysql_db_query($database,$sql);
            $row=mysql_fetch_array($result);
            $title=$row["title"];
            $detail=$row["detail"];
            $day_in=strtotime($row["day_in"]);
            $day_in=date("d/m/Y",$day_in);
			$idg_expert=$row["idg_expert"];
			$status=$row["status"];
        }

        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>รายการโจทย์วิจัย</h3>";
        echo "</div>";
        echo " <form action='case_data.php?action=saveData' method='post' target='upload_target' onsubmit='clickupload();' >";
            echo "<div class='box-body'>";
                echo "<div class='form-group'>";
                    echo "<label >หัวข้อ</label>";
                    echo "<input type='text' name='txtTitle' class='form-control' value='$title'>";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<label >กลุ่มโจทย์วิจัย</label>";
					
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
					
                    echo "<input type='hidden' id='day_in' name='day_in' class='form-control' value='$day_in'>";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<label >รายละเอียดโจทย์วิจัย</label>";
                    echo "<textarea name='txtDetail' class='textarea' style='width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;''>$detail</textarea>";
					echo "<label >ผู้ส่งข้อมูล : ".$_SESSION['IASU_USER_NAME']."</label>";
					echo "<input type='hidden' id='iduser' name='iduser' class='form-control' value='".$_SESSION['IASU_USER_ID']."'>";
					if($id != ""){
                    echo "<label >สถานะดำเนินการ</label>";
                            echo "<select class='form-control' id='status' name='status'>";
                            	$i=0;
                            	foreach ($cf_staus as &$value) {
                            		if($i>0){
                            			echo "<option value='$i' ";
                            			if($i==$status){
                            				echo " selected='selected' ";
                            			}
                            			echo ">$value</option>";
                            		}
                            		$i++;
                            	}
                            echo "</select>";
					}
                echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
                echo "<div class='col-lg-12'>";
                    echo "<input name='id' type='hidden' value='$id' />";
					//echo "<input name='status' type='text' value='$status' />";
                    echo "<button type='submit' class='btn btn-success' id='butSave'>Save</button>";
                    echo "&nbsp&nbsp";
                    echo "<button type='button' class='btn btn-danger' id='butCancel'>Close</button>";
                    echo "<div id='loadForm' align='center'>";
                            echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
                    echo "</div>";
                    echo "<div id='boxMessageForm' align='center'></div>";
                echo "</div>";
            echo "</div>";
        echo "</form>";

        echo "<script type='text/javascript'>";
            echo "$(document).ready(function(){";
                echo "$('.textarea').wysihtml5();";
                echo "$('#loadForm').fadeOut();";
            echo "});";
        echo "</script>";
        exit();
		
		
		}else{

        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>เข้าระบบเพื่อบันทึกโจทย์วิจัยชุมชน</h3>";
			echo "<h5 class='box-title'>สามารถเข้าสู่ระบบได้ 2 ช่องทางคือ<br> สมาชิกระบบหรือผ่านทางเฟสบุ๊ค</h5>";
        echo "</div>";
            echo "<div class='box-footer'>";
                echo "<div class='col-lg-12'>";
                echo "<h4><a href='login.php'> เข้าสู่ระบบ </a></h4>";
                echo "</div>";
            echo "</div><br><br><br>";
        exit();
		}
    }

    if($_GET["action"]=="getDocList"){
        $id=$_GET["id"];

        echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th>ชื่อเอกสาร</th>";
                echo "<th width='100'>Tools</th>";
            echo "</tr>";
            $i=1;
            $sql="select autoid , file_name , file_value from tb_case_item";
            $sql=$sql . " where case_id = $id order by autoid";
            $result=mysql_db_query($database,$sql);
            while($row=mysql_fetch_array($result)){
                echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td><a href='user/case/$row[2]' target='_blank'>$row[1]</a></td>";
                    echo "<td><a href='#$row[0]|$id' class='delItemsDoc'><span class='label label-danger'> ลบ </span></a></td>";
                echo "</tr>";
                $i++;
            }
        echo "<table>";

        exit();
    }
	
    if($_GET["action"]=="getmember"){
        $id=$_GET["id"];
            $sql="select * from tbexpert";
            $sql=$sql . " where idexpert = $id";
            $result=mysql_db_query($database,$sql);
			$row=mysql_fetch_array($result);
		echo "<b>ข้อมูลผู้เชี่ยวชาญ</b>";
        echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th width='80'>ชื่อ</th>";
                echo "<td>$row[2] $row[3]</td>";
            	echo "</tr>";
                echo "<tr>";
                echo "<th>ที่อยู่</th>";
                echo "<td>$row[4] $row[5]</td>";
            	echo "</tr>";
                echo "<tr>";
                echo "<th>ข้อมูลติดต่อ</th>";
                echo "<td>$row[6], $row[7], $row[8]</td>";
            	echo "</tr>";
        echo "<table>";
				
		echo "<b>ความเชี่ยวชาญ</b>";
        echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th>ความเชี่ยวชาญ</th>";
            echo "</tr>";
            $i=1;
            $sql="select nameexpertlist from tbexpertlist";
            $sql=$sql . " where idexpert = $id";
            $result=mysql_db_query($database,$sql);
            while($row=mysql_fetch_array($result)){
                echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>$row[0]</td>";
                echo "</tr>";
                $i++;
            }
        echo "<table>";

        exit();
    }

    if($_GET["action"]=="deleteDoc"){
        $id=$_POST["id"];
        $sql="delete from tb_case_item where autoid = $id";
        $result1=mysql_db_query($database,$sql);
        exit();
    }

    if($_GET["action"]=="getFormUpload"){

        $id=$_GET["id"];

        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>รายการเอกสาร</h3>";
        echo "</div>";
        echo "<div class='box-body'>";
            echo "<div class='form-group'>";
                echo "<label >เอกสารอ้างอิง</label>";
                echo "<div id='showDoc'></div>";
            echo "</div>";
            echo " <form id='frmDoc' action='case_data.php?action=insertDoc' enctype='multipart/form-data' method='post' target='upload_target' onsubmit='clickuploadDoc();' >";
                echo "<div class='form-group'>";
                    echo "<label >upload เอกสาร</label>";
                    echo "<input type='text' class='form-control' name='txtfile_name' placeholder='ชื่อเอกสาร'>";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<label >File</label>";
                    echo "<input type='file' name='fileField' id='fileField' >";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<button type='submit' class='btn btn-primary'>Upload</button>";
                    echo "<input name='id' type='hidden' value='$id' />";
            echo "</form><hr>";
        echo "</div>";
        echo "<div class='box-footer'>";
            echo "<div class='col-lg-12'>";
                echo "<button type='button' class='btn btn-danger' id='butCancel'>Close</button>";
                echo "<div id='loadFormUpload' align='center'>";
                        echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
                echo "</div>";
                echo "<div id='boxMessageFormUpload' align='center'></div>";
            echo "</div>";
        echo "</div>";
        echo "<script type='text/javascript'>";
            echo "$(document).ready(function(){";
                echo "$('#loadFormUpload').fadeOut();";
            echo "});";
        echo "</script>";
        exit();
    }

    if($_GET["action"]=="insertDoc"){
        $msgsuccess=0;
        $msgerror=0;
        $actionPage="doc";

        $id=$_POST["id"];
        $PID=$id;
        $txtfile_name=$_POST["txtfile_name"];

        if($txtfile_name==""){
            $msgerror=1;
        }else{
            if($_FILES["fileField"]["error"]==4){
                $msgerror=2;
            }else{
                $accept_type=array("application/pdf");
                $file=$_FILES["fileField"]["name"];
                $typefile=$_FILES["fileField"]["type"];
                $sizefile=$_FILES["fileField"]["size"];
                $tempfile=$_FILES["fileField"]["tmp_name"];
                if(!in_array($typefile,$accept_type)){
                    $msgerror=3;
                }else{
                    $Str_file = explode(".",$file);
                    $carr = count($Str_file)-1;
                    $strname = $Str_file[$carr];
                    $pname= "case_" . randomText(10) . "." . $strname;
                    $target_path = "user/case/" . $pname;
                    if(@move_uploaded_file($tempfile,$target_path)){
                        $sql="insert into tb_case_item(case_id , file_name , file_value )";
                        $sql=$sql . " values($id , '$txtfile_name' ,'$pname') ";
                        $result1=mysql_db_query($database,$sql);
                        $msgsuccess=1;
                    }else{
                        $msgerror=5;
                    }

                }
            }
        }

    }

    if($_GET["action"]=="getView"){
        $id=$_GET["id"];
		
		$sql="update tb_case set count_view=count_view+1 where case_id=$id";
		$result=mysql_db_query($database,$sql);

        $sql="select * from tb_case where case_id = $id";
        $result=mysql_db_query($database,$sql);
        $row=mysql_fetch_array($result);
        $title=$row["title"];
        $detail=$row["detail"];
        //$day_in=$row["day_in"];
		$day_in=strtotime($row["day_in"]);
        $day_in=date("d/m/Y",$day_in);
		$iduser=$row["iduser"];
		$idg_expert=$row["idg_expert"];
        
        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>$title</h3>";
        echo "</div>";
        echo "<div class='box-body'>";
		        $sqlu="select firstname, lastname from tbuser where iduser = $iduser";
				$resultu=mysql_db_query($database,$sqlu);
				@$rowu=mysql_fetch_array($resultu);

            echo "<p>ผู้ส่งข้อมูล : $rowu[0] $rowu[1]</p>";
            echo "<p>วันที่บันทึก : $day_in</p>";
            echo "<p>$detail</p>";
            $sql="select * from tb_case_item where case_id = $id order by autoid";
            $result=mysql_db_query($database,$sql);
            $nRow=mysql_num_rows($result);			
            if($nRow !=0){
                echo "<br><p><b>เอกสารอ้างอิง</b></p>";
                while($row=mysql_fetch_array($result)){
                    echo "<p>&nbsp&nbsp<a href='user/case/$row[3]' target='_blank'>$row[2]</a></p>";
                }
            }
			
            $sql="select g_expertname from tbg_expert where idg_expert = $idg_expert";
            $result=mysql_db_query($database,$sql);
            $nRow=mysql_num_rows($result);
			$row=mysql_fetch_array($result);
			echo "<br><p><b>กลุ่มของโจทย์วิจัย</b> $row[0]</p>";
			
			echo "<p><b>ผู้เชี่ยวชาญในสาขาที่เกี่ยวข้อง</b></p>";
            $sql1="select idexpert, nameexpertlist from tbexpertlist where idg_expert = $idg_expert";
            $result1=mysql_db_query($database,$sql1);
			$i=1;
			 while($row1=mysql_fetch_array($result1)){
				$idexpert = $row1[0];
				$sql2="select idexpert, firstname, lastname from tbexpert where idexpert = $idexpert";
           		$result2=mysql_db_query($database,$sql2);
			 	while($row2=mysql_fetch_array($result2)){
					echo $i++.") <a href='#$row2[0]' class='viewmember'>".$row2[1]." ".$row2[2]."</a> เชี่ยวชาญด้าน : ".$row1[1]."<br>";
					
				}
			 }
			echo "<p>วันที่รับโจทย์วิจัยชุมชน : $day_in</p>";
        echo "</div>";
        exit();
    }

    if($_GET["action"]=="delete"){
        $id=$_POST["id"];

        $sql="delete from tb_case where case_id = $id";
        $result=mysql_db_query($database,$sql);
        exit();
    }

    if($_GET["action"]=="loadstate"){
			$sql1="select count(*) from tb_case where status = 1";
			$result1=mysql_db_query($database,$sql1);
			$row1=mysql_fetch_array($result1);
			$sql2="select count(*) from tb_case where status = 2";
			$result2=mysql_db_query($database,$sql2);
			$row2=mysql_fetch_array($result2);
			$sql3="select count(*) from tb_case where status = 3";
			$result3=mysql_db_query($database,$sql3);
			$row3=mysql_fetch_array($result3);
echo '<button type="button" class="btn btn-default">บันทึก <div class="label label-danger">'.$row1[0].'</div> </button>
<button type="button" class="btn btn-default">ดำเนินการ <div class="label label-info">'.$row2[0].'</div> </button>
<button type="button" class="btn btn-default"> เสร็จสิ้น <div class="label label-success">'.$row3[0].'</div> </button>';
        exit();
    }
	
    if($_GET["action"]=="saveData"){
        date_default_timezone_set('UTC');

        $msgsuccess=0;
        $msgerror=0;
        $actionPage="case";
        $PID=0;

        $id=$_POST["id"];
        $day_in=$_POST["day_in"];
        $txtTitle=$_POST["txtTitle"];
        $idg_expert=$_POST["idg_expert"];
        $txtDetail=$_POST["txtDetail"];
		$iduser=$_POST["iduser"];
		$status=$_POST["status"];

        if($txtTitle =="" or $idg_expert == ""){
            $msgerror=1;
        }else{

            if($id !=""){
                $sql="update tb_case set idg_expert='$idg_expert' , title='$txtTitle' ";
                $sql=$sql . " , detail='$txtDetail', status='$status' where case_id=$id ";
            }else{
                $sql="insert into tb_case(day_in , title, idg_expert, detail , count_view, iduser, status ) ";
                $sql=$sql . " value('$day_in' , '$txtTitle', '$idg_expert', '$txtDetail'  , 0,'$iduser', 1)";
            }
            $result=mysql_db_query($database,$sql);
            $msgsuccess=1;
        }
    }


	
	mysql_close();
?>

<script language="javascript">
    window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> , "<?php echo $actionPage ?>" , <?php echo $PID ?>);
</script>