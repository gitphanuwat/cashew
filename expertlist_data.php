<?php
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	

if($_GET["action"]=="loadmember"){
	echo "<input type='hidden' class='form-control' name='npage' id='npage' value='". $_GET['s_page']."'>";
	$sql="select * from tbexpert order by firstname ASC";
	
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
	
	echo '<table class="table table-hover">
    	<tr>
    		<th width="50">ลำดับ</th>
    		<th>ชื่อ-สกุล</th>
			<th>จำนวนด้านความเชี่ยวชาญ</th>
    	</tr>';
	   		while($row=mysql_fetch_array($result)){
				
				if(is_numeric($row["prefix"])){
					$prefix=$cf_prefix[$row["prefix"]];
				}else{
					$prefix=$row["prefix"];
				}
				$name=$prefix . $row['firstname'] . " " . $row['lastname'];
				echo "<tr>";
					echo "<td>".$i++."</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='getexpertlist'>$name</font></a></td>";
			
			$iexpert=$row["idexpert"];
			$sql2="select count(*) from tbexpertlist where idexpert = $iexpert";
			$result2=mysql_db_query($database,$sql2);
			$row1=mysql_fetch_array($result2);
					echo "<td>$row1[0]</td>";
				echo "</tr>";
			}
	echo "</table>";
	
        if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="expertlist_data.php?url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);    
					echo "</ul>";
				echo "</div>";
	        echo "</div>";		
		}
	exit();
}

if($_GET["action"]=="loads_expert"){
	$idg_expert = $_GET['id'];
	echo "<input type='hidden' class='form-control' name='npage' id='npage' value='". $_GET['s_page']."'>";
			
			$sql="select * from tbexpertlist where idg_expert = $idg_expert order by idg_expert ASC";
    		$result=mysql_db_query($database,$sql);

	echo '<table class="table table-hover">
    	<tr>
    		<th width="50">ลำดับ</th>
    		<th>ชื่อ-สกุล</th>
			<th>จำนวนด้านความเชี่ยวชาญ</th>
    	</tr>';
		$i=1;
	   		while($row=mysql_fetch_array($result)){
				if($idx!=$row['idexpert']){
				$idx = $row['idexpert'];
				$sqlx="select * from tbexpert where idexpert = $idx";
    			$resultx=mysql_db_query($database,$sqlx);
				$rowx=mysql_fetch_array($resultx);
				if(is_numeric($rowx["prefix"])){
					$prefix=$cf_prefix[$rowx["prefix"]];
				}else{
					$prefix=$rowx["prefix"];
				}
				$name=$prefix . $rowx['firstname'] . " " . $rowx['lastname'];
				echo "<tr>";
					echo "<td>".$i++."</td>";
					echo "<td><a href='#$rowx[0]' title='แสดงรายละเอียดข้อมูล' class='getexpertlist'>$name</font></a></td>";
			
			$iexpert=$rowx["idexpert"];
			$sql2="select count(*) from tbexpertlist where idexpert = $iexpert";
			$result2=mysql_db_query($database,$sql2);
			$row1=mysql_fetch_array($result2);
					echo "<td>$row1[0]</td>";
				echo "</tr>";
			}}
	echo "</table>";
	
	exit();
}

if($_GET["action"]=="loadg_expert"){
	$sql="select * from tbg_expert order by idg_expert ASC";
	$result=mysql_db_query($database,$sql);
	echo '<table class="table table-hover">
    	<tr>
    		<th width="50">ลำดับ</th>
    		<th>ชื่อกลุ่มความเชี่ยวชาญ</th>
    	</tr>';
			$i=1;
	   		while($row=mysql_fetch_array($result)){
				$ig_expert=$row["idg_expert"];
				$sql2="select count(*) from tbexpertlist where idg_expert = $ig_expert";
				$result2=mysql_db_query($database,$sql2);
				$row2=mysql_fetch_array($result2);
				$cexpert=$row2[0];
				echo "<tr>";
					echo "<td>".$i++."</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='gets_expert'>$row[1]</a>($cexpert)</td>";
				echo "</tr>";
			}
	echo "</table>";
	exit();
}

if($_GET["action"]=="loadexpertlist"){
	
		$sql="select * from tbexpert where idexpert = " . $_POST["id"];
		$result=mysql_db_query($database,$sql);
		$rowex=mysql_fetch_array($result);
		
		if(is_numeric($rowex["prefix"])){
			$prefix=$cf_prefix[$rowex["prefix"]];
		}else{
			$prefix=$rowex["prefix"];
		}
		$name=$prefix . $rowex['firstname'] . " " . $rowex['lastname'];

		echo "ผู้เชี่ยวชาญ : ".$name."<br>";
		echo "ที่อยู่ : ".$rowex['address'];
	echo '
	<table class="table table-hover">
    	<tr>
    		<th style="width:50px">ลำดับ</th>
    		<th style="width:250px">ความเชี่ยวชาญ</th>
    		<th style="width:250px">กลุ่มความเชี่ยวชาญ</th>
    	</tr>';
	   	$n=0;
		$sql="select * from tbexpertlist where idexpert = " . $_POST["id"]."  order by idexpertlist ASC";
		$result=mysql_db_query($database,$sql);
	   	while($row=mysql_fetch_array($result)){
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='getexpertdetail'>$row[3]</font></a></td>";
			$id=$row["idg_expert"];
			$sql3="select * from tbg_expert where idg_expert = $id";
			$result3=mysql_db_query($database,$sql3);
			$row3=mysql_fetch_array($result3);					
					echo "<td>$row3[1]</td>";
				echo "</tr>";
			}
    echo "</table>";
	echo "<input type='hidden' class='form-control' name='idexpert' id='idexpert' value='". $_POST["id"]."'>";
	exit();		
}

mysql_close();
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?>);
</script>