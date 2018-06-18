<?php
	session_start();
	include('config/config.php');
	
		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");

	//กำลังลงทะเบียน
	if($_GET["action"]=="getRegistered"){
		$search = $_GET["search"];
		echo "<table class='table table-hover'>";
        	echo "<tr>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th>ชื่อเรื่อง</th>";
                echo "<th>VDO บน WWW.YOUTUBE.COM</th>";
                echo "<th width='100'>วันที่อัพเดท</th>";
				if($_SESSION["IASU_USER_STATE"]=='ADMIN'){
                	echo "<th width='120'>Tools</th>";
				}
            echo "</tr>";
            $sql="select * ";
            $sql=$sql . " from tb_vdo ";
			 if($search !=""){
            	$sql=$sql . " WHERE title like '%$search%' ";
            }
	
			$sql=$sql . " order by idvdo DESC";

            $result=mysql_db_query($database,$sql);
			$total=mysql_num_rows($result);
			$e_page=10;

			if(!isset($_GET['s_page'])){   
				$_GET['s_page']=0;   
			}else{   
				$chk_page=$_GET['s_page'];     
				$_GET['s_page']=$_GET['s_page']*$e_page;   
			}   
			$sql=$sql . " LIMIT " . $_GET['s_page'] . " , $e_page";
			$result=mysql_db_query($database,$sql);
			if(mysql_num_rows($result)>=1){
				$plus_p=($chk_page*$e_page)+mysql_num_rows($result);
			}else{
				$plus_p=($chk_page*$e_page); 
			}
			$total_p=ceil($total/$e_page);   
			$before_p=($chk_page*$e_page)+1;
			$i=$before_p;
			while($row=mysql_fetch_array($result)){
			$svdo=substr($row[2], 32);
				echo "<tr>";
					echo "<td>".$i++."</td>";
					echo "<td>$row[1]</td>";
					echo '<td>
			<iframe src="https://www.youtube.com/embed/'.$svdo.'" frameborder="0" allowfullscreen></iframe> 
					</td>';
					echo "<td>$row[4]</td>";
					if($_SESSION["IASU_USER_STATE"]=='ADMIN'){
					echo "<td>&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='แก้ไขข้อมูล' class='editItemRegistered' ><img src='img/edit.png'></a> ";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='ลบข้อมูล' class='delItemRegistered'><img src='img/del.png'></td>";
					}
				echo "</tr>";
			}

        echo "</table>";

        if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="viewvdo_data.php?url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);    
					echo "</ul>";
				echo "</div>";
	        echo "</div>";		
		}

		exit();
	}

	
	//ลบข้อมูลสาชิก
	if($_GET["action"]=="delUser"){
		$id=$_POST["id"];

		$sql="delete from tb_vdo where idvdo=$id";
		$result=mysql_db_query($database,$sql);

		exit();
	}


	mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>