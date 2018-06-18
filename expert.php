<?php 
	session_start();
	include('config/config.php');
$subpageName="expert";
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
                      <div class="box box-primary">
                                <div class="box-header">
                    				<div class="row">
                    					<div class="col-xs-6">
                                        <h3 class="box-title">จัดการข้อมูลผู้เชี่ยวชาญ</h3>
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
                    				<div class="row">
                    					<div class="col-xs-6">
                                        <h3 class="box-title">จัดการข้อมูลความเชี่ยวชาญ</h3>
                       				 	</div>
                        				<div class="col-xs-6">
                                        <div id="expertlistbn">
                                <form class="navbar-form navbar-right" >
<button type="button" id="butNew_expertlist" class="btn btn-default">+เพิ่มข้อมูล</button>
								</form>
                                		</div>
                        				</div>
                    				</div>
                                </div>
                    					<div class="box-body">
                                        	<div id="expertlist">กรุณาเลือกผู้เชี่ยวชาญ</div>
                                       </div>
                    </div>
            </div><!--/.wow1-->
            
           <div class="col-md-4 col-sm-6  wow fadeInDown">
                        	<div class="box box-primary">
                                <div class="box-header">
                    				<div class="row">
                    					<div class="col-xs-10">
                                    <h3 class="box-title">กลุ่มความเชี่ยวชาญ</h3>
                       				 	</div>
                        				<div class="col-xs-2">
                                <form class="navbar-form navbar-right" >
<button type="button" id="butNew_g_expert" class="btn btn-default">+เพิ่มข้อมูล</button>
								</form>
                        				</div>
                    				</div>
                                </div>
                                <div class="box-body table-responsive no-padding">
                               	  <div id="g_expert" style="margin:auto;padding:10px;"></div>
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
                    $("#dialog-from").load("expert_data_form.php?action=getFromMember",function(){
                        $("#dialog").dialog( "option", "width", 350 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadDialog").fadeOut();
                    });
                });
                $("#butNew_expertlist").click(function(){
					var idexpert=$('#idexpert').val();
                    $("#dialog-from").load("expert_data_form.php?action=getFromg_expertlist&idexpert="+idexpert,function(){
                        $("#dialog").dialog( "option", "width", 350 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadDialog").fadeOut();
                    });
                });
                $("#butNew_g_expert").click(function(){
                    $("#dialog-from").load("expert_data_form.php?action=getFromg_expert",function(){
                        $("#dialog").dialog( "option", "width", 350 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadDialog").fadeOut();
                    });
                });

				$("#member").load("expert_data.php?action=loadmember");
				$("#g_expert").load("expert_data.php?action=loadg_expert");
				$("#expertlistbn").hide();
				$("#load").fadeOut();
				//จบ function read
			});

            $(document).on('click','.update_member',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("expert_data_form.php?action=getFromMember&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                    $("#loadDialog").fadeOut();
                });
            });
			$(document).on('click','.delItem_member', function() { 
				var idexpertlist = $(this).attr("href");
				idexpertlist = idexpertlist.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("expert_data.php?action=delete_member",{id:idexpertlist},function(){
						$("#load").fadeOut();
						$("#member").load("expert_data.php?action=loadmember");
					});
				}
			});
            $(document).on('click','.update_g_expert',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("expert_data_form.php?action=getFromg_expert&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                    $("#loadDialog").fadeOut();
                });
            });
            $(document).on('click','.update_expert',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("expert_data_form.php?action=getFromg_expertlist&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                    $("#loadDialog").fadeOut();
                });
            });
			$(document).on('click','.del_g_expert', function() { 
				var idg_expert = $(this).attr("href");
				idg_expert = idg_expert.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("expert_data.php?action=delete_g_expert",{id:idg_expert},function(){
						$("#load").fadeOut();
						$("#g_expert").load("expert_data.php?action=loadg_expert");
					});
				}
			});
			
			$(document).on('click','.delItem_expertlist', function() { 
				var idexpert=$('#idexpert').val();
				var idexpertlist = $(this).attr("href");
				idexpertlist = idexpertlist.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("expert_data.php?action=delete_expertlist",{id:idexpertlist},function(){
						$("#load").fadeOut();
						$("#expertlist").load("expert_data.php?action=loadexpertlist",{id:idexpert});
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

			$(document).on('click','.getexpertlist', function() { 
				var idexpert = $(this).attr("href");
				idexpert = idexpert.replace("#","");
				$("#expertlist").load("expert_data.php?action=loadexpertlist",{id:idexpert});
				$("#expertlistbn").show();
			});
			
			 $(document).on('click','.getexpertdetail',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("expertlist_form.php?action=loadexpertdetail&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                   // $("#loadDialog").fadeOut();
                })
            });


            function stopUpload(success , error){
				var idexpert = $('#idexpert').val();
				var npage = $('#npage').val();
                    if(success ==1){
                        $("#dialog").dialog( "close" );
						$("#member").load("expert_data.php?action=loadmember&s_page="+npage);
						$("#g_expert").load("expert_data.php?action=loadg_expert");
						$("#expertlist").load("expert_data.php?action=loadexpertlist",{id:idexpert});
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
