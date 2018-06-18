<?php 
	session_start();
	include('config/config.php');
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

    <div style="font-size: 12px;" id="dialog" title="จัดการข้อมูล">
        <div id="dialog-from" >จัดการข้อมูล</div>
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
<button type="button" id="butNew_member" class="btn btn-default">+เพิ่มข้อมูล</button>
								</form>
                        				</div>
                    				</div>
                                </div>
                                     	<iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
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
                                        	<h3 class="box-title">จัดการการบริการวิชาการ</h3>
                                       </div>
                    					<div class="box-body">
                                        	<div id="product">กรุณาเลือกสถานประกอบการ</div>
                                       </div>
                    </div>
            </div><!--/.wow1-->
            
           <div class="col-md-4 col-sm-6  wow fadeInDown">
                        	<div class="box box-solid bg-teal-gradient">
                                <div class="box-header">
                    				<div class="row">
                    					<div class="col-xs-10">
                                    <h3 class="box-title">กลุ่มงานบริการ</h3>
                       				 	</div>
                        				<div class="col-xs-2">
                                <form class="navbar-form navbar-right" >
<button type="button" id="butNew_type" class="btn btn-default">+เพิ่มข้อมูล</button>
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
                $("#dialog2").dialog({
                    autoOpen: false, 
                    width : 600, 
                });
                $("#dialog3").dialog({
                    autoOpen: false, 
                    width : 600, 
                });
                //ข้อมูลสมาชิก

                $("#butNew_member").click(function(){
                    $("#dialog-from").load("system_data_form.php?action=getFromMember",function(){
                        $("#dialog").dialog( "option", "width", 350 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadDialog").fadeOut();
                    });
                });
                $("#butNew_type").click(function(){
                    $("#dialog-from").load("system_data_form.php?action=getFromType",function(){
                        $("#dialog").dialog( "option", "width", 350 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadDialog").fadeOut();
                    });
                });

				$("#member").load("system_data.php?action=loadmember");
				//$("#base").load("system_data.php");
				//$("#product").load("system_data.php");
				$("#type").load("system_data.php?action=loadtype");
				$("#load").fadeOut();
				//จบ function read
			});

            $(document).on('click','.update_member',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("system_data_form.php?action=getFromMember&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                    $("#loadDialog").fadeOut();
                });
            });
			$(document).on('click','.delItem_member', function() { 
				var idbase = $(this).attr("href");
				idbase = idbase.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("system_data.php?action=delete_member",{id:idbase},function(){
						$("#load").fadeOut();
						$("#member").load("system_data.php?action=loadmember");
					});
				}
			});
            $(document).on('click','.update_type',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("system_data_form.php?action=getFromType&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                    $("#loadDialog").fadeOut();
                });
            });
			$(document).on('click','.del_type', function() { 
				var idtype = $(this).attr("href");
				idtype = idtype.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("system_data.php?action=delete_type",{id:idtype},function(){
						$("#load").fadeOut();
						$("#type").load("system_data.php?action=loadtype");
					});
				}
			});
			
			$(document).on('click','.delItem_base', function() { 
				var vuser=$('#vuser').val();
				var idbase = $(this).attr("href");
				idbase = idbase.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("system_data.php?action=delete_base",{id:idbase},function(){
						$("#load").fadeOut();
						$("#base").load("system_data.php?action=loadbase",{id:vuser});
						$("#product").hide();
					});
				}
			});
			$(document).on('click','.delItem_product', function() { 
				var vbase=$('#vbase').val();
				var idproduct = $(this).attr("href");
				idproduct = idproduct.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("system_data.php?action=delete_product",{id:idproduct},function(){
						$("#load").fadeOut();
						$("#product").load("system_data.php?action=loadproduct",{id:vbase});
					});
				}
			});

			$(document).on('click','.naviPN', function() {
				var url=$(this).attr("href");
				$("#member").load(url + "&action=loadmember" ,function(){
					$("#loadRegistered").fadeOut();
				});
				return false;
			});

			$(document).on('click','.getbase', function() { 
				var id_user = $(this).attr("href");
				id_user = id_user.replace("#","");
				$("#base").load("system_data.php?action=loadbase",{id:id_user});
				$("#product").hide();
			});
			$(document).on('click','.getproduct', function() { 
				var id_base = $(this).attr("href");
				id_base = id_base.replace("#","");
				$("#product").load("system_data.php?action=loadproduct",{id:id_base});
				$("#product").show();
			});


            function stopUpload(success , error){
                    if(success ==1){
                        $("#dialog").dialog( "close" );
						$("#member").load("system_data.php?action=loadmember");
						$("#type").load("system_data.php?action=loadtype");
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
		</script>
