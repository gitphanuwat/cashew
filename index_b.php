<?php 
	session_start();
	include('config/config.php');
	$pageName="home";
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

                <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">จุดศูนย์กลางการเชื่อมโยงข้อมูล</h1><h2 class="animation animated-item-1">สร้างความร่วมมือระหว่างกลุ่มประเทศอาเซียน</h2>
                                    <h2 class="animation animated-item-2"สถาบันอาเซียนศึกษา มหาวิทยาลัยราชภัฏอุตรดิตถ์""></h2>
                                    <h2 class="animation animated-item-3">ร่วมกับ "สำนักงานพาณิชย์จังหวัดอุตรดิตถ์"</h2>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img1.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg2.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">ฐานข้อมูลผู้ประกอบการ</h1>
                                    <h2 class="animation animated-item-2">เชื่อมโยงข้อมูลด้านการค้าและการท่องเที่ยว</h2>
                                    <h2 class="animation animated-item-3">ระบบฐานข้อมูลและภูมิสารสนเทศให้บริการ<br>การจัดเก็บข้อมูลและเผยแพร่ประชาสัมพันธ์<br>เพื่อสร้างช่องทางในการให้บริการในระดับสากล</h2>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img2.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(images/slider/bg3.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">องค์ความรู้และงานวิจัย</h1>
                                    <h2 class="animation animated-item-2">สร้างองค์ความรู้และงานวิจัยในภูมิภาคอาเซียน</h2>
                                    <h2 class="animation animated-item-2">ผลงานวิจัย สารสนเทศ และองค์ความรู้ เพื่อสนับสนุนการเข้าสู่ประชาคมอาเซียน</h2>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div><!--/.item-->
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
                            <i class="fa fa-user"></i>
                            <h2>ผู้ประกอบการ</h2>
                            <h3>ระบบฐานข้อมูล, ระบบภูมิสารสนเทศ, การค้าการลงทุนและการท่องเที่ยว</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-leaf"></i>
                            <h2>สถานประกอบการ</h2>
                            <h3>ที่ตั้งสถานประกอบการ, ข้อมูลสินค้าและบริการ, การประชาสัมพันธ์</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cloud-download"></i>
                            <h2>องค์ความรู้</h2>
                            <h3>ความรู้จากงานวิจัย, องค์ความรู้, ข้อมูลประชาคมอาเซียน</h3>
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
					<div class="col-md-3 col-sm-6">
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div>
									<a href="http://www.iasu.uru.ac.th/"><img class="media-object" src="img/logoasean2.png" alt=""></a>
								</div>

								<div class="media-body">
									<h5>สถาบันอาเซียนศึกษา</h5>
									<h5>มหาวิทยาลัยราชภัฏอุตรดิตถ์</h5>
									<ul class="tag clearfix">
										<li class="btn"><a href="http://www.iasu.uru.ac.th/?cat=10">Activity</a></li>
										<li class="btn"><a href="http://www.iasu.uru.ac.th/?cat=12">Research</a></li>
										<li class="btn"><a href="http://www.iasu.uru.ac.th/?cat=6">download</a></li>
										<li class="btn"><a href="https://www.facebook.com/ASEANURU">facebook</a></li>
									</ul>
								</div>
							</div><!--/.media -->
							<p>ประสานสร้างความร่วมมือระหว่างกลุ่มประเทศอาเซียนเพื่อการอยู่ร่วมกันอย่างมีความสุขและยั่งยืน</p>
						</div>
					</div>
                    
					<div class="col-md-3 col-sm-6">
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div>
									<a href="http://pcoc.moc.go.th/wappPCOC/views/dnews.aspx?pv=53"><img class="media-object" src="img/logout4moc.png" alt=""></a>
								</div>

								<div class="media-body">
									<h5>สำนักงานพาณิชย์</h5>
									<h5>จังหวัดอุตรดิตถ์</h5>
									<ul class="tag clearfix">
										<li class="btn"><a href="http://pcoc.moc.go.th/wappPCOC/views/dnews.aspx?pv=53">news</a></li>
										<li class="btn"><a href="http://www.aecthaibiz.com/SitePages/home.aspx">AEC BS center</a></li>
										<li class="btn"><a href="http://www.aecthaibiz.com/province/org.html?pv=53">information</a></li>
										<li class="btn"><a href="https://www.facebook.com/ut4moc">facebook</a></li>
									</ul>
								</div>
							</div><!--/.media -->
							<p>บริการข้อมูลเศรษฐกิจ เชื่อมพันธมิตรการค้า พัฒนาธุรกิจสู่สากล เพื่อทุกคนอยู่ดีมีสุข, ขับเคลื่อนเศรษฐกิจภายในประเทศ</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div>
									<a href="http://www.iasu.uru.ac.th/asean/"><img class="media-object" src="img/logomuseum2.png" alt=""></a>
								</div>

								<div class="media-body">
									<h5>แหล่งท่องเที่ยวเสมือน</h5>
									<h5>มหาวิทยาลัยราชภัฏอุตรดิตถ์</h5>
									<ul class="tag clearfix">
										<li class="btn"><a href="http://www.iasu.uru.ac.th/asean/LapLaeMuseum/Tour/Lap%20Lae%20Museum.html">lablae</a></li>
										<li class="btn"><a href="http://www.iasu.uru.ac.th/asean/TeenJoke/Tour/TeenJoke.html">teen joke fabric</a></li>
										<li class="btn"><a href="http://www.iasu.uru.ac.th/asean/BorLek/Tour/Nam%20Phee%20Museum.html">bor lek namphee</a></li>
									</ul>
								</div>
							</div><!--/.media -->
							<p>อนุรักษ์และเสริมสร้างศิลปะวัฒนธรรมของจังหวัดอุตรดิตถ์ นำเสนอโดยเทคโนโลยีการท่องเที่ยวเสมือนจริง</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div>
									<a href="http://www.easternlanna.org"><img class="media-object" src="img/logotat.png" alt=""></a>
								</div>

								<div class="media-body">
									<h5>การท่องเที่ยวแห่งประเทศไทย</h5>
									<h5>เที่ยวอุตรดิตถ์ แพร่ น่าน</h5>
									<ul class="tag clearfix">
										<li class="btn"><a href="http://www.easternlanna.org/index-utd.php">uttaradit</a></li>
										<li class="btn"><a href="http://www.easternlanna.org/index-phrae.php">phrae</a></li>
										<li class="btn"><a href="http://www.easternlanna.org/index-nan.php">nan</a></li>
										<li class="btn"><a href="http://www.easternlanna.org/callvdo.php">video</a></li>
									</ul>
								</div>
							</div><!--/.media -->
							<p>การพัฒนา อนุรักษ์ทรัพยากรทางการท่องเที่ยว ส่งเสริมเผยแพร่ และคุ้มครองให้ความปลอดภัยแก่นักท่องเที่ยว</p>
						</div>
					</div>




				</div>	<!--/.row-->
			</div><!--section-->
            


            <div class="get-started center wow fadeInDown">
                <br>
                            <div class="row">
                                        <div id="showfeed"></div>
                                            <div id="loadfeed" align="center">
                                                <img src="img/ajax-loader.gif" align="absmiddle" />
                                            </div> 
                                              
                            </div>
                <div class="request">
                    <h4><a href="viewnews.php">ข่าว& กิจกรรม &เครือข่าย</a></h4>
                </div>
            </div><!--/.get-started-->

    <section id="portfolio">
        <div class="container">

            <div class="row">
                        <h1 id="comments_title">ข่าวประชาสัมพันธ์</h1>
                        <div id="shownews"></div>
                            <div id="loadnews" align="center">
                                <img src="img/ajax-loader.gif" align="absmiddle" />
                            </div> 
                              
            </div>
        </div>
    </section><!--/#portfolio-item-->

        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable">                            
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="box box-solid">
                                <div class="box-header">
                                <i class="fa fa-bar-chart-o"></i>
                                    <h4 class="box-title">จำนวนสถานประกอบการ</h4>
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
		$("#shownews").load("index_load.php?action=loadnews" ,function(){
            $("#loadnews").fadeOut();
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
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



