<?php 
	session_start();
	include('config/config.php');
	$subpageName="vdo";
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

    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/black-tie/jquery-ui.css">
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head><!--/head-->

<body class="homepage">
    <div style="font-size: 12px;" id="dialog" title="อัพโหลดวีดีโอ"> 
        <div id="dialog-from" ></div>
    </div>
    
	<?php include("include/head.php");?>
        <div class="container">
        
                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">	ข้อมูลวีดีโอ</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                                    <div class="container-fluid">
                                                    <?php if($_SESSION["IASU_USER_STATE"]=='ADMIN'){?>
                                                    <form class="navbar-form navbar-right" >
                                                      <button type="button" id="butNew" class="btn btn-default">เพิ่มข้อมูล</button>
                                                      
                                                    </form><?php }?>
                                                  
                                                  <div class="container-fluid">
                                                    <div class="navbar-form navbar-left" role="search2">
                                                      <div class="form-group">
                                                        <input type="text" id="txtSearch_edit" class="form-control" placeholder="ค้นจากชื่อเรื่อง">
                                                      </div>
                                                      <button type="button" id="butSearch_edit" class="btn btn-default">ค้นหา</button>
                                                    </div>
                                                  </div>


                                                </nav>
                                                <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                        		<div id="boxRegistered" style="margin:auto;padding:10px;">
                                        			<div id="loadRegistered" align="center">
                                                        <img src="img/ajax-loader.gif" align="absmiddle" />
                                                    </div>
                                        		</div>
                                        	</div>
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
                
           
        </div><!--/.container-->


<?php include("include/foot.php");?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    
</body>
</html>
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
                    width : 1000, 
                });


                $("#butSearch_edit").click(function(){
                    valSearch = $("#txtSearch_edit").val();
                    $("#loadInfo").fadeIn();
                    $("#boxRegistered").load("viewvdo_data.php?action=getRegistered&search=" + valSearch ,function(){
                        $("#loadInfo").fadeOut();
                    });
                });
				
				$("#boxRegistered").load("viewvdo_data.php?action=getRegistered" ,function(){
					$("#loadRegistered").fadeOut();
				});

                $("#butNew").click(function(){
                    $("#dialog-from").load("viewvdo_form.php?action=getFormNews",function(){
                        $("#dialog").dialog( "option", "width", 400 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadDialog").fadeOut();
                    });
                });
				//จบ function read
			});

			$(document).on('click','.delItemRegistered', function() { 
				var id = $(this).attr("href");
				id = id.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#loadRegistered").fadeIn();
					$.post("viewvdo_data.php?action=delUser",{id:id},function(){
						$("#boxRegistered").load("viewvdo_data.php?action=getRegistered" ,function(){
							$("#loadRegistered").fadeOut();
						});
					});
				}
			});

            $(document).on('click','.viewItemRegistered',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("viewvdo_data.php?action=getDetail&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                });
            });

            $(document).on('click','.editItemRegistered',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("viewvdo_form.php?action=getFormNews&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                    $("#loadDialog").fadeOut();
                });
            });

            $(document).on('click','#butExit',function(){
                $("#dialog").dialog( "close" );
            });

            function clickupload(){
                $("#loadInfo").fadeIn();
                return true;
            }

            function stopUpload(success , error){
                    if(success ==1){
                        $("#dialog").dialog( "close" );
                        $("#loadRegistered").fadeIn();
                        $("#boxRegistered").load("viewvdo_data.php?action=getRegistered" ,function(){
                            $("#loadRegistered").fadeOut();
                        });
                    }else{
                        if(error==1){
                            $("#uploadDialog_process").html("<font color='red'>กรุณากรอกข้อมูลให้ครบด้วย</font>");
                        }
                    }
                return true;
            }

            $(document).on('click',"#butCancel",function(){
                $("#dialog").dialog( "close" );
            });

			$(document).on('click','.naviPN', function() {
				var url=$(this).attr("href");
				$("#loadRegistered").fadeIn();
				$("#boxRegistered").load(url + "&action=getRegistered" ,function(){
					$("#loadRegistered").fadeOut();
				});
				return false;
			});

            $(document).on('click','.naviPN1', function() {
                var url=$(this).attr("href");
                valSearch = $("#txtSearch").val();
                $("#loadInfo").fadeIn();
                $("#boxInfo").load(url + "&action=getSearch&search=" +valSearch  ,function(){
                    $("#loadInfo").fadeOut();
                });
                return false;
            });


		</script>
