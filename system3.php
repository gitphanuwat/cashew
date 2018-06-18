<?php 
	session_start();
	include('config/config.php');
$pageName="trader";
$subpageName="system";
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
    
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/black-tie/jquery-ui.css">


</head><!--/head-->

<body>

    <div style="font-size: 12px;" id="dialog" title="ข้อมูลสมาชิก"> aaaa
        <div id="dialog-from" >bbbbbb</div>
    </div>

	<?php include("include/head.php");?>
        <div class="container">
        <div class="row">
        
           <div class="col-md-8 col-sm-6 wow fadeInDown">
                      <div class="box box-solid bg-light-blue-gradient">
                                <div class="box-header">
                    				<div class="row">
                    					<div class="col-xs-6">
                                        <h3 class="box-title">จัดการข้อมูลสมาชิก</h3>
                       				 	</div>
                        				<div class="col-xs-6">
                                <form class="navbar-form navbar-right" >
<button type="button" id="butNew" class="btn btn-default">+เพิ่มข้อมูล</button>
								</form>
                        				</div>
                    				</div>
                                </div>

                    					<div class="box-body">
                                        	<div id="member">MEMBER</div>
                                       </div>
                    </div>
                      <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">จัดการข้อมูลสถานประกอบการ</h3>
                                       </div>
                    					<div class="box-body">
                                        	<div id="base">กรุณาเลือกสมาชิก</div>
                                       </div>
                    </div>
                      <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">จัดการข้อมูลสินค้า/บริการ</h3>
                                       </div>
                    					<div class="box-body">
                                        	<div id="product">กรุณาเลือกสถานประกอบการ</div>
                                       </div>
                    </div>
            </div><!--/.wow1-->
            
           <div class="col-md-4 col-sm-6  wow fadeInDown">

                        	<div class="box box-solid bg-green-gradient">
                                <div class="box-header">
                    				<div class="row">
                    					<div class="col-xs-10">
                                    <h3 class="box-title">ข้อมูลประเภทสถานประกอบการ</h3>
                       				 	</div>
                        				<div class="col-xs-2">
                                <form class="navbar-form navbar-right" >
<button type="button" id="butNew2" class="btn btn-default">+เพิ่มข้อมูล</button>
								</form>
                        				</div>
                    				</div>
                                </div>
                            
                            
                                <div class="box-body table-responsive no-padding">
                               	  <div id="group" style="margin:auto;padding:10px;"></div>
                                </div><!-- /.box-body -->
                            </div>
                        	<div class="box box-solid bg-teal-gradient">
                                <div class="box-header">
                    				<div class="row">
                    					<div class="col-xs-10">
                                    <h3 class="box-title">ข้อมูลประเภทสถานประกอบการ</h3>
                       				 	</div>
                        				<div class="col-xs-2">
                                <form class="navbar-form navbar-right" >
<button type="button" id="butNew3" class="btn btn-default">+เพิ่มข้อมูล</button>
								</form>
                        				</div>
                    				</div>
                                </div>
                                <div class="box-body table-responsive no-padding">
                               	  <div id="type" style="margin:auto;padding:10px;"></div>
                                </div><!-- /.box-body -->
                    		</div>
            </div><!-- /.wow2 -->
        </div><!-- /.row -->




        </div><!--/.container-->
        
<?php include("include/foot.php");?>
</body>
</html>
<?php
	mysql_close();
?>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>        
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript">
			$(document).ready(function(){

                $("#dialog").dialog({
                    autoOpen: false, 
                    width : 600, 
                });

                //ข้อมูลสมาชิก

                $("#butNew").click(function(){
                    $("#dialog-from").load("system_data2.php",function(){
                        $("#dialog").dialog( "option", "width", 350 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadDialog").fadeOut();
                    });
                });
				
				$("#member").load("system_data.php");
				//$("#base").load("system_data.php");
				//$("#product").load("system_data.php");
				$("#group").load("system_data.php");
				$("#type").load("system_data.php");
				$("#step2").hide();
				$("#box2").slideUp(0);
				$("#box3").slideUp(0);
				$("#load").fadeOut();

				//จบ function read
			});


            $(document).on('click','.naviPN', function() {
                var url=$(this).attr("href");
                valSearch = $("#txtSearch").val();
                $("#loadInfo").fadeIn();
                $("#boxInfo").load(url + "&action=getSearch&search=" +valSearch  ,function(){
                    $("#loadInfo").fadeOut();
                });
                return false;
            });


		</script>
