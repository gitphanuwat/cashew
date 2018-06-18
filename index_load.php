<?php
	session_start();
	include('config/config.php');

	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");


	if($_GET["action"]=="loadbanner"){
		$sql="select * from tbbanner";
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result); 
        //while($row=mysql_fetch_array($result)){
			echo '<div class="item active" style="background-image: url(user/profile_pic/'.$row[10].')">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">'.$row[1].'</h1>
                                    <h2 class="animation animated-item-2">'.$row[2].'</h2>
                                    <h2 class="animation animated-item-3">'.$row[3].'</h2>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="user/profile_pic/'.$row[13].'" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>';
			echo '<div class="item" style="background-image: url(user/profile_pic/'.$row[11].')">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">'.$row[4].'</h1>
                                    <h2 class="animation animated-item-2">'.$row[5].'</h2>
                                    <h2 class="animation animated-item-3">'.$row[6].'</h2>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="user/profile_pic/'.$row[14].'" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>';
			echo '<div class="item" style="background-image: url(user/profile_pic/'.$row[12].')">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">'.$row[7].'</h1>
                                    <h2 class="animation animated-item-2">'.$row[8].'</h2>
                                    <h2 class="animation animated-item-3">'.$row[9].'</h2>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="user/profile_pic/'.$row[15].'" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>';
		//}
		exit();
	}
	if($_GET["action"]=="loadactivity"){
		$sql="select * from tbknowledge ";
		$sql=$sql . " order by idknow desc LIMIT 4";
		$result=mysql_db_query($database,$sql);
        while($row=mysql_fetch_array($result)){
		$sdetail =  iconv_substr($row['detail'],0,200,"UTF-8");
        echo '
							<div class="col-md-3 col-sm-6">
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div class="media-body">
									<h4>'.$row['title'].'</h5>
									<h5>'.$sdetail.'...'.'</h5>
									<ul class="tag clearfix">
										<li class="btn"><a href="activity.php?id='.$row['idknow'].'&idgroup='.$row['idgroup'].'">รายละเอียด</a></li>
									</ul>
								</div>
							</div><!--/.media -->
						</div>
					</div>
		 ';
		}
		exit();
	}
	if($_GET["action"]=="loadnews"){
		echo "<ul class='todo-list'>";
		$sql="select news_id , day_in , title ,detail, count_view from tb_news ";
		$sql=$sql . " order by news_id desc LIMIT 1";
		$result=mysql_db_query($database,$sql);
        while($row=mysql_fetch_array($result)){
        echo "                <div class='media comment_section'>
                            <div class='pull-left post_comments'>
                                <a href='#'><img src='images/pic_nsp.png' class='img-circle' alt='' /></a>
                            </div>
                            <div class='media-body'>
                                <h3>".$row[2]."</h3>
                                <h4>".$row[1]."</h4>
                                <p>".$row[3]."</p>";
								
								$id=$row[0];
$sqlf="select * from tb_news_item where news_id = $id order by autoid";
            $resultf=mysql_db_query($database,$sqlf);
            $nRow=mysql_num_rows($resultf);
            if($nRow !=0){
                echo "<br><p><b>เอกสารแนบ</b></p>";
                while($rowf=mysql_fetch_array($resultf)){
                    echo "<p>&nbsp&nbsp<a href='user/news/$rowf[3]' target='_blank'>$rowf[2]</a></p>";
                }
            }								
								
								echo "<div class='label label-info'><i class='fa fa-clock-o'></i><a href='news.php'>ข่าวทั้งหมด</a></div>
								
                            </div>
                        </div> ";
		}
		exit();
	}


if($_GET["action"]=="loadvdo"){
		$sql="select idvdo, title, vdo, view from tb_vdo ";
		$sql=$sql . " order by idvdo desc LIMIT 4";
		$result=mysql_db_query($database,$sql);
        while($row=mysql_fetch_array($result)){
			$svdo=substr($row[2], 32);
			echo '<div class="col-lg-3">
        	<div class="embed-responsive embed-responsive-16by9">';
			echo '<iframe src="https://www.youtube.com/embed/'.$svdo.'" frameborder="0" allowfullscreen></iframe>'.$row[1];		
			echo '</div>
      		</div>';
		}
		exit();
	}


if($_GET["action"]=="loadfeed"){
		$sql="select news_id , day_in , title ,detail, count_view from tbnews ";
		$sql=$sql . " order by news_id desc LIMIT 2";
		$result=mysql_db_query($database,$sql);
        while($row=mysql_fetch_array($result)){
					echo "
			<script src=\"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.2\" async></script>  
             <div class=\"fb-post\" data-href=\"".$row[3]."\"
                        data-width=\"550\"></div>
					";
		}
		exit();
}

	if($_GET["action"]=="loadbase"){

		echo "<div class='chart' id='bar-chart-action' style='height: 240px;''></div> ";
		echo "<script type='text/javascript'>";
			echo "var bar = new Morris.Bar({";
				echo "element: 'bar-chart-action',";
				echo "resize: true,";
				echo "data: [";
			$sumperson=0;
    		$sql="select idtype , nametype from tbtype order by nametype";
			$result=mysql_db_query($database,$sql);
			while($row=mysql_fetch_array($result)){
				$sql="select count(*) from tbbase where idtype = $row[0] ";
					$result1=mysql_db_query($database,$sql);
					$nRow=mysql_num_rows($result1);
					if($nRow !=0){
						$row1=mysql_fetch_array($result1);
						$qFaculty=$row1[0];
					}else{
						$qFaculty=0;
					}

					echo "{y: '$row[1]', a: $qFaculty },";
					$i++;
					$sumperson=$sumperson+$qFaculty;
		 	}//faculty
		 		echo "],";
		 		echo "barColors: ['#00A65A'],";
		 		echo "gridLineColor: '#666666',";
		 		echo "gridTextColor: '#000000',";
                echo "xkey: 'y',";
                echo "ykeys: ['a' ],";
                echo "labels: ['ประเภทข้อมูล'],";
                echo "hideHover: 'auto'";
		 	echo "});";
		echo "</script>";

		echo "<div class='row'>";
			echo "<div class='col-md-12 col-sm-12 col-lg-12'>";
				echo "<div class='progress'>";
                		echo "<div class='progress-bar progress-bar-green' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:100%' >จำนวนสถานประกอบการ $sumperson แห่ง</div>";
            	echo "</div>";
			echo "</div>";
		echo "</div>";

		exit();
	}

	mysql_close();
?>