<?php
	
	session_start();
	
	include('counter/counter.php');
	include('config/config.php');
	

	if($_GET["action"]=="add"){
		$today = date("Y-m-d");  
		$sql="select total from counter where `DATE` ='$today' ";
		$result=mysql_db_query($database,$sql);
		$nRow=mysql_num_rows($result);
		if($nRow!=0){
			$row=mysql_fetch_array($result);
			$counter_id=$row[0];
		}
		do_counter_hit($counter_id);
		exit();
	}

	if($_GET["action"]=="getChart"){
		mysql_connect($host,$hostuser,$hostpass);
		mysql_query("SET NAMES UTF8");
		date_default_timezone_set('UTC');

		echo "<div class='chart' id='line-chart' style='height: 275px;''></div> ";

		$nowdate = date("Y-m-d"); 
		$date=date("Y-m-d",strtotime("-6 days",strtotime($nowdate)));
		$end_date = date("Y-m-d"); 

		echo "<script type='text/javascript'>";
			echo "var line = new Morris.Line({";
				echo "element: 'line-chart',";
				echo "resize: true,";
				echo "data: [";
				while (strtotime($date) <= strtotime($end_date)) {
					$sql="select total from counter where `DATE`='$date' ";
					$result=mysql_db_query($database,$sql);
					$nRow=mysql_num_rows($result);
					if($nRow !=0){
						$row=mysql_fetch_array($result);
						$qUser=$row[0];
					}else{
						$qUser=0;
					}
					echo "{y: '$date', item1: $qUser},";
		 			$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
		 		}
		 		echo "],";
		 		echo "xkey: 'y',";
		 		echo "ykeys: ['item1'],";
		 		echo "labels: ['Item 1'],";
		 		echo "lineColors: ['#efefef'],";
		 		echo "lineWidth: 2,";
		 		echo "hideHover: 'auto',";
		 		echo "gridTextColor: '#fff',";
		 		echo "gridStrokeWidth: 0.4,";
		 		echo "pointSize: 4,";
		 		echo "pointStrokeColors: ['#efefef'],";
		 		echo "gridLineColor: '#efefef',";
		 		echo "gridTextFamily: 'Open Sans',";
		 		echo "gridTextSize: 10";
		 	echo "});";
		echo "</script>";
		exit();
	}

	
?>