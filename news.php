<?php 
	session_start();
	include('config/config.php');
	$subpageName="news";
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
    
    <script type="text/javascript" src="doctool/fckeditor.js"></script>
    

</head><!--/head-->

<body class="homepage">
    <div style="font-size: 12px;" id="dialog" title="ข้อมูลข่าวประชาสัมพันธ์"> 
        <div id="dialog-from" ></div>
    </div>
    
	<?php include("include/head.php");?>
        <div class="container">

                <!-- Main content -->

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">ข่าวประชาสัมพันธ์</h3>
                                     <?php if($_SESSION["IASU_USER_ID"]){?>
                                    <form class="navbar-form navbar-right" role="search">
									  <button type="button" id="butNew" class="btn btn-primary">เพิ่มรายการ</button>
									</form>
                                  <?php }?>  
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>
                               	  <div id="loadBar" align="center">
                               	  	<img src="img/ajax-loader.gif" align="absmiddle" />
                               	  </div>
                               	  <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                </div><!-- /.box-body -->
                            </div>
                            <div class="box box-info" id="boxView">

                            </div>
                            <div class="box box-info" id="boxEdit">

                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
           
        </div><!--/.container-->

<?php //include("include/link.php");?>
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
                });

                $("#boxView").hide();
                $("#showData").load("news_data.php?action=getData",function(){
                    $("#loadBar").fadeOut();
                });

                $("#butNew").click(function(){
                    $("#dialog-from").load("news_data.php?action=getForm",function(){
                        $("#dialog").dialog( "option", "width", 450 );
                        $( "#dialog" ).dialog( "open" );
                    });
                });
				//จบ function read
			});

            function clickuploadDoc(){
                $("#loadFormUpload").fadeIn();
                return true;
            }

            function clickupload(){
                $("#loadForm").fadeIn();
                return true;
            }

            function stopUpload(success , error ,actionPage , id ){
                if(actionPage=="news"){
                    $("#loadForm").fadeOut();

                    if(success ==1){
                        $("#loadBar").fadeIn();
                        $("#showData").load("news_data.php?action=getData",function(){
                            $("#loadBar").fadeOut();
                            $("#dialog").dialog( "close" );
                        });
                    }else{
                        if(error==1){
                            $("#boxMessageForm").html("<font color='red'>กรุณากรอกหัวข้อด้วย</font>");
                        }
                    }
                }else{
                    //upload เอกสาร
                    $("#loadFormUpload").fadeOut();
                    if(success ==1){
                        $("#showDoc").load("news_data.php?action=getDocList&id="+id);
                    }else{
                        if(error==1){
                            $("#boxMessageFormUpload").html("<font color='red'>กรุณากรอกชื่อเอกสารด้วย</font>");
                        }else if(error==2){
                            $("#boxMessageFormUpload").html("<font color='red'>กรุณากรอกเอกสารด้วย</font>");
                        }else if(error==3){
                            $("#boxMessageFormUpload").html("<font color='red'>เอกสารที่ upload ต้องเป็น pdf file เท่านั้น</font>");
                        }
                    }
                }
                return true;
            }

            $(document).on('click',".delItemsDoc",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                yid=id.split("|");

                if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
                    $.post("news_data.php?action=deleteDoc",{id:yid[0]},function(){
                        $("#showDoc").load("news_data.php?action=getDocList&id="+yid[1]);
                    });
                }
            });

            $(document).on('click',".editItem1",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                $("#dialog-from").load("news_data.php?action=getForm&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 450 );
                    $( "#dialog" ).dialog( "open" );
                });
            });

            $(document).on("click",".delItem",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
                    $("#loadBar").fadeIn();
                    $.post("news_data.php?action=delete",{id:id},function(){
                        $("#showData").load("news_data.php?action=getData",function(){
                            $("#loadBar").fadeOut();
                        });
                    });
                }
             });

            $(document).on("click",".uploadItem",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                $("#dialog-from").load("news_data.php?action=getFormUpload&id="+id,function(){
                    $("#showDoc").load("news_data.php?action=getDocList&id="+id);
                    $("#dialog").dialog( "option", "width", 450 );
                    $( "#dialog" ).dialog( "open" );
                });
            });

            $(document).on("click",".viewItem",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                $("#boxView").load("news_data.php?action=getView&id="+id,function(){
                    $("#boxView").show();
					$("#boxEdit").hide();
                });
             });
			 
            $(document).on("click",".editItem",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                $("#boxEdit").load("news_data.php?action=getForm&id="+id,function(){
					$("#boxEdit").show();
                    $("#boxView").hide();
					$("#loadForm").fadeOut();
                });
             });

            $(document).on('click',"#butCancel",function(){
                $("#dialog").dialog( "close" );
            });

		</script>