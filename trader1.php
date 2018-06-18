<?php 
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");

$pageName="trader";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $PageTitle;?></title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php include("include/head.php");?>
        <div class="container">
          <div class="wow fadeInDown">
    		<div class="row">
            <div class="col-md-8">
    <!--google map start-->
    <div class="contact-map "><br>
      <div id="map_canvas" style="width: 100%; height: 400px">
      </div>
    </div>
    <!--google map end-->
            </div>
            <div class="col-md-4">
        <div class="features"><br>
<?php
	$sql="select * from tbtype order by idtype ASC";
	$result=mysql_db_query($database,$sql);
	   		while($row=mysql_fetch_array($result)){
				$idtype=$row[0];
				$sql1="select count(*) from tbbase where idtype = $idtype";
				$result1=mysql_db_query($database,$sql1);
				$row1=mysql_fetch_array($result1);
				echo '<div class="col-md-3 col-sm-3 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">';
				echo "<div>";
					echo "<a href='#$row[0]' title='แสดงข้อมูล' class='delItem1'><img src=\"icon/$row[4]\" width=\"40\">";
					echo "<a href='#$row[0]' title='แก้ไขข้อมูล' class='delItem2'><img src='img/edit.png'></a> &nbsp;&nbsp;";
					echo "<a href='#$row[0]' title='แก้ไขข้อมูล' class='delItem3'><img src='img/edit.png'></a> &nbsp;&nbsp;";

					echo "<h4>$row[1]($row1[0])</h4></a>";
				echo "</div>";
				echo "</div>";
			}
?>
			</div>
        </div><!--/.services-->
    </div><!--/.row--> 
    </div>


            <div class="get-started center wow fadeInDown">
                <h2>สติถิผู้ประกอบการ</h2>
                <p class="lead">Lt dolore  magna aliqua. <br>  Ut enim ad miquip ex ea commodo</p>
                <div class="request">
                    <h4><a href="#">Request a free Quote</a></h4>
                    <br>
                </div>
            </div><!--/.get-started-->

            <div class="clients-area center wow fadeInDown">
                <h2>สารสนเทศและองค์ความรู้</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client1.png" class="img-circle" alt="">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                        <h4><span>-John Doe /</span>  Director of corlate.com</h4>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client2.png" class="img-circle" alt="">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                        <h4><span>-John Doe /</span>  Director of corlate.com</h4>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client3.png" class="img-circle" alt="">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                        <h4><span>-John Doe /</span>  Director of corlate.com</h4>
                    </div>
                </div>
           </div>

        </div><!--/.container-->

<?php include("include/foot.php");?>
</body>
</html>
<?php		
	mysql_close();
?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>      
    <script src="js/gnewmap.js"></script>
    <script type="text/javascript">  
          $(document).ready(function() {
        //Set the carousel options
				$('#quote-carousel').carousel({
				  pause: true,
				  interval: 4000,
				});
      	   });

	  
			$(document).on('click','.delItem1', function() { 
				var idbase = $(this).attr("href");
				idbase = idbase.replace("#","");
						$("#map_canvas").load("trader_data.php?action=showmap");
			});
						$(document).on('click','.delItem2', function() { 
									$("<script/>", {  
							  "type": "text/javascript",  
							  src: "js/editmap.js"  
							}).appendTo("body");      

						});
				$("#delItem3").click(function(){
					$("#step1").hide();
					$("#box2").slideDown(300);
					$("#box3").slideDown(300);
					$("#step2").slideDown(300);
					$("#map_canvas").load("traderedit_data.php?action=newmap");
				});

	</script>
