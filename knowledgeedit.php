<?php 
	session_start();
	include('config/config.php');
	$subpageName="knowledgeedit";
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
    <div style="font-size: 12px;" id="dialog" title="ข้อมูลองค์ความรู้"> 
        <div id="dialog-from" ></div>
    </div>
    
	<?php include("include/head.php");?>
        <div class="container">
        
                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            <div class="row">
                            <div class="col-xs-8">
                            	<div class="box-header">
                                    <h3 class="box-title">หมวดหมู่องค์ความรู้</h3>
                                </div><!-- /.box-header -->
                            </div>
                            <div class="col-xs-4">
                                                    <form class="navbar-form navbar-right" >
                                                     <button type="button" id="butNewgroup" class="btn btn-default">เพิ่มหมวดหมู่</button>
                                                    </form>
                            </div>
                            </div>

                                <div class="box-body table-responsive no-padding">
                                                    <div class="container-fluid">
                                                <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                        		<div id="boxgroup" style="margin:auto;padding:10px;">
                                        			<div id="loadgroup" align="center">
                                                        <img src="img/ajax-loader.gif" align="absmiddle" />
                                                    </div>
                                        		</div>
                                        	</div>
                            	</div>
                        </div>
                    </div>
                </div>
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รายการองค์ความรู้</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                                    <div class="container-fluid">
                                                  <div class="container-fluid">
                                                    <div class="navbar-form navbar-left" role="search2">
                                                      <div class="form-group">
                                                        <input type="text" id="txtSearch_edit" class="form-control" placeholder="ค้นจากชื่อเรื่อง">
                                                      </div>
                                                      <button type="button" id="butSearch_edit" class="btn btn-default">ค้นหา</button>
                                                    </div>
                                                  </div>
                                                <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                        		<div id="boxknow" style="margin:auto;padding:10px;">
                                        			<div id="loadknow" align="center">
                                                        <img src="img/ajax-loader.gif" align="absmiddle" />
                                                    </div>
                                        		</div>
                                        	</div>
                            </div>
                        </div>
                        
                        
                        
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>
                                    
                                    <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                    <form action="knowledgeedit_data.php?action=insertknow" method="post" enctype="multipart/form-data" name="form_package"  id="form_package" target="upload_target" onsubmit="clickuploadknow();">
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">เพิ่มองค์ความรู้</h3>
                                    	</div><!-- /.box-header -->
                                        
                                        <div class="box-body">
                                        	<div id="box1">
                                                <div class="form-group">
                                                    <label>หัวเรื่ององค์ความรู้</label>
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="หัวเรื่ององค์ความรู้">
                                                    <span id="errtitle" class="error"></span>
                                                </div>
                                                
                                            </div>  <!-- /end box1 -->
                                            <div class="box-footer">
                                        		<button type="button" class="btn btn-info" id="step1">Next >></button>
                                    		</div>
                                            <div id="box2">
                                            	<div class="form-group">
                                                    <label >หมวดหมู่</label>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div id="showlistgroup" ></div>
                                                        </div>
                                                    	<span id="errTotalLoad" class="error"></span>
                                                    </div>
                                                </div>
                                            	<div class="form-group">
                                                    <label >เนื้อหา</label>
                                                    <div id="iddetail" name="iddetail">
                                                  	 <textarea id="detail" name="detail"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                     </div>
                                                </div>
                                            </div>  <!-- /end box2 -->
                                            <div id ="step2">
                                            	<div class="box-footer">
                                                    <button type="submit" class="btn btn-primary" id="Save">Save</button>
                                                    <button type="button" class="btn btn-danger" id="butCancelknow">Cancel</button>
                                                    <input name="idknow" id="idknow" type="hidden" value="" />
                                                </div>
                                            </div><!-- /end step2 -->
                                        </div>
                                     </div> 
                                  </form>
                                  
                                </div><!-- /.box-body -->
                        
                        
                        
                        
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
        
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
  

		<script type="text/javascript">
			var oFCKeditor = new FCKeditor('detail');
			oFCKeditor.BasePath = 'doctool/';
			oFCKeditor.Height = '500';
			oFCKeditor.ReplaceTextarea();
		</script>
        
        <script type="text/javascript">
            $(function() {
                $(".textarea").wysihtml5();
            });
        </script>
        <script type="text/javascript">
			$(document).ready(function(){

                $("#dialog").dialog({
                    autoOpen: false, 
                    width : 600, 
                });


                $("#butSearch_edit").click(function(){
                    valSearch = $("#txtSearch_edit").val();
                    $("#loadInfo").fadeIn();
                    $("#boxknow").load("knowledgeedit_data.php?action=getknow&search=" + valSearch ,function(){
                        $("#loadInfo").fadeOut();
                    });
                });
				
                //หมวดหมู่
				$("#boxgroup").load("knowledgeedit_data.php?action=getgroup" ,function(){
					$("#loadgroup").fadeOut();
				});
                //องค์ความรู้
				$("#boxknow").load("knowledgeedit_data.php?action=getknow" ,function(){
					$("#loadknow").fadeOut();
				});

                $("#butNewgroup").click(function(){
                    $("#dialog-from").load("knowledgeedit_data_form.php?action=getgroup",function(){
                        $("#dialog").dialog( "option", "width", 400 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadformgroup").fadeOut();
                    });
                });
                $("#butNew").click(function(){
                    $("#dialog-from").load("knowledgeedit_data_form.php?action=getFromMember",function(){
                        $("#dialog").dialog( "option", "width", 400 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadDialog").fadeOut();
                    });
                });
				//จบ function read
				
				$("#step2").hide();
				$("#box2").slideUp(0);
				
				$("#step1").click(function(){
					$("#step1").hide();
					$("#box2").slideDown(300);
					$("#step2").slideDown(300);
				});
				
				$("#showlistgroup").load("knowledgeedit_data.php?action=loadlistgroup" );

				
				
				
			});


			$(document).on('click','.delgroup', function() { 
				var id = $(this).attr("href");
				id = id.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#loadgroup").fadeIn();
					$.post("knowledgeedit_data.php?action=delgroup",{id:id},function(){
						$("#boxgroup").load("knowledgeedit_data.php?action=getgroup" ,function(){
							$("#loadgroup").fadeOut();
						});
					});
				}
			});
			$(document).on('click','.delknow', function() { 
				var id = $(this).attr("href");
				id = id.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#loadknow").fadeIn();
					$.post("knowledgeedit_data.php?action=delknow",{id:id},function(){
						$("#boxknow").load("knowledgeedit_data.php?action=getknow" ,function(){
							$("#loadknow").fadeOut();
						});
					});
				}
			});

            $(document).on('click','.viewknow',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("knowledgeedit_data.php?action=getDetail&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                });
            });

            $(document).on('click','.editgroup',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("knowledgeedit_data_form.php?action=getgroup&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
					$("#picbox").load("knowledgeedit_data.php?action=getPicgroup&id="+id,function(){
                    	$("#loadformgroup").fadeOut();
					});
                });
            });
			
            $(document).on('click','.editknow1',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("knowledgeedit_data_form.php?action=getFromMember&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                    $("#loadDialog").fadeOut();
                });
            });
			
			$(document).on('click','.editknow', function() { 
				var id = $(this).attr("href");
				id = id.replace("#","");
				$.post("knowledgeedit_data.php?action=getupdateknow",{id:id},function(data){
					var returnData=data.split("|");
					$("#idknow").val(returnData[0]);
					$("#idgroup").val(returnData[1]);
					$("#title").val(returnData[2]);
					//$("#detail").data("wysihtml5").editor.setValue(returnData[3]);
					
					//oFCKeditor.ReplaceTextarea();
					$("#iddetail").load("knowledgeedit_data.php?action=resetdetail&id="+returnData[0]);
					//$("#detail").val(returnData[3]);

					$("#step1").hide();
					$("#box2").slideDown(300);
					$("#step2").slideDown(300);
			
				});
			});

            $(document).on('click','#butExit',function(){
                $("#dialog").dialog( "close" );
            });

            function clickuploadknows(){
                $("#loadknow").fadeIn();
                return true;
            }

            function stopUpload(success , error, box){
                    if(success ==1){
						if(box==1){
							$("#dialog").dialog( "close" );
							$("#loadgroup").fadeIn();
								$("#boxgroup").load("knowledgeedit_data.php?action=getgroup" ,function(){
									$("#loadgroup").fadeOut();
								});
						}else if(box==2){
							$("#loadknow").fadeIn();
								$("#boxknow").load("knowledgeedit_data.php?action=getknow" ,function(){
									$("#loadknow").fadeOut();
									$("#box2").hide();
									$("#step2").hide();
									$("#form_package")[0].reset();
									$("#iddetail").load("knowledgeedit_data.php?action=resetdetail&id=-1");
									$("#step1").show();

								});
						}
                    }else{
                        if(error==1){
                            $("#loadknow").html("<font color='red'>กรุณากรอกข้อมูลให้ครบด้วย</font>");
                        }
                    }
                return true;
            }

            $(document).on('click',"#butCancel",function(){
                $("#dialog").dialog( "close" );
            });
			
            $(document).on('click',"#butCancelknow",function(){
					$("#form_package")[0].reset();
					$("#iddetail").load("knowledgeedit_data.php?action=resetdetail&id=-1");					
					$("#box2").hide();
					$("#step2").hide();
					$("#step1").show();
            });

			$(document).on('click','.naviPN', function() {
				var url=$(this).attr("href");
				$("#loadknow").fadeIn();
				$("#boxknow").load(url + "&action=getknow" ,function(){
					$("#loadknow").fadeOut();
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
