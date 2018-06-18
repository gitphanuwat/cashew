<?php
	session_start();
	include('config/config.php');
	$pageName="index";
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");

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

    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head><!--/head-->

<body class="homepage">
	<?php include("include/head.php");?>

    <section id="main-slider" class="no-margin" >
        <div class="carousel slide" >
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                    <div id="showbanner"></div>
                    <div id="loadbanner" align="center">
                        <img src="img/ajax-loader.gif" align="absmiddle" />
                    </div>
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->


    <section id="feature" class="transparent-bg">
        <div class="container">
            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                        <a href="innovation.php">
                            <i class="fa fa-user"></i></a>
            <?php
						$sql1="select count(*) from tbinnovation";
						$result1=mysql_db_query($database,$sql1);
						$row1=mysql_fetch_array($result1);
			?>
                            <h2>ผลิตภัฑ์(<?php echo $row1[0];?>)</h2>
                            <h3>ระบบฐานข้อมูล, รวบรวมผู้ประกอบการที่เป็นเครือข่ายความร่วมมือ</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                        <a href="trader.php">
                            <i class="fa fa-leaf"></i></a>
            <?php

										$sql1="select count(*) from tbuser where idlevel = 3";
										$result1=mysql_db_query($database,$sql1);
										$row1=mysql_fetch_array($result1);
			?>
                            <h2>เกษตรกร(<?php echo '17';//echo $row1[0];?>)</h2>
                            <h3>การส่งเสริมและพัฒนาทางด้านนวัตกรรมและเทคโนโลยี ในท้องถิ่นชุมชน</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                        <a href="innovation.php">
                            <i class="fa fa-comments"></i></a>
            <?php
				$sql1="select count(*) from tb_case";
				$result1=mysql_db_query($database,$sql1);
				$row1=mysql_fetch_array($result1);
			?>
                            <h2>องค์ความรู้(<?php echo $row1[0];?>)</h2>
                            <h3>ระบบประสานและรับโจทย์ปัญหาจากชุมชน เพื่อเปิดช่องทางในการเข้าถึงของชุมชน</h3>
                        </div>
                    </div><!--/.col-md-4-->

                </div><!--/.services-->
            </div><!--/.row-->




	<!-- our-team -->
	<div class="team">
				<div class="row team-bar">
					<div class="first-one-arrow hidden-xs">
						<hr>
					</div>
					<div class="first-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					<div class="second-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>
					<div class="third-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					<div class="fourth-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>
				</div> <!--skill_border-->

				<div class="row clearfix">
                        <div id="showactivity"></div>
                        <div id="loadactivity" align="center">
                                <img src="img/ajax-loader.gif" align="absmiddle" />
                        </div>
				</div>	<!--/.row-->
	</div><!--section-->

        </div><!--/.container-->
    </section><!--/#feature-->

<section class="well">
  <div class="container">
    <div class="row">
     <div id="showvdo"></div>
      <div id="loadvdo" align="center">
      <img src="img/ajax-loader.gif" align="absmiddle" />
      </div>
    </div>
  </div>
</section>

    <div class="get-started center wow fadeInDown">
        <div id="showfeed"></div>
            <div id="loadfeed" align="center">
                <img src="img/ajax-loader.gif" align="absmiddle" />
        </div>
        <div class="request">
            <h4><a href="viewnews.php">ข่าว& กิจกรรม &เครือข่าย</a></h4>
        </div>
    </div><!--/.get-started-->

    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="box box-solid">
                                <div class="box-header">
                                <i class="fa fa-bar-chart-o"></i>
                                    <h4 class="box-title">จำนวนผู้ประกอบการ</h4>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                 	<div id="showperson">
                                 	</div>
                                 	<div id="loadperson" align="center">
                                        <img src="img/ajax-loader.gif" align="absmiddle" />
                                  	</div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            </section>
                        <section class="col-lg-6 connectedSortable">
                             <div class="box box-solid bg-teal-gradient">
                                <div class="box-header">
                                    <i class="fa fa-th"></i>
                                    <h4 class="box-title">สถิติการใช้ระบบ</h4>
                                </div>
                                <div class="box-body border-radius-none">
                                    <div id="boxChart">

                                    </div>
                                    <div id="loadChart" align="center">
                                        <img src="img/ajax-loader.gif" align="absmiddle" />
                                    </div>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->
						</section>
            </div>
        </div>

    </section><!--/#bottom-->
<?php //include("include/link.php");?>
<?php include("include/foot.php");?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
		$("#showperson").load("index_load.php?action=loadbase" ,function(){
            $("#loadperson").fadeOut();
        });
		$("#showfeed").load("index_load.php?action=loadfeed" ,function(){
            $("#loadfeed").fadeOut();
        });
		$("#showbanner").load("index_load.php?action=loadbanner" ,function(){
            $("#loadbanner").fadeOut();
        });
		$("#showactivity").load("index_load.php?action=loadactivity" ,function(){
            $("#loadactivity").fadeOut();
        });
		//$("#shownews").load("index_load.php?action=loadnews" ,function(){
      //      $("#loadnews").fadeOut();
        //});
		$("#showvdo").load("index_load.php?action=loadvdo" ,function(){
            $("#loadvdo").fadeOut();
        });
        $.post( "counter.php?action=add");
        $("#boxChart").load("counter.php?action=getChart",function(){
            $("#loadChart").fadeOut();
        });
    });
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
