<?php 
	session_start();
	include('config/config.php');
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
        <div class="row">
           <div class="col-md-8 col-sm-6 wow fadeInDown">
           <br>
                    <!--google map start-->
                    <div class="contact-map">
                                    <div id="map_canvas" style="width: 100%; height: 400px"> </div>
                    </div>
                    <!--google map end-->

	<div class="wow fadeInDown">
                                    <form action="trader_data.php?action=insert" method="post" enctype="multipart/form-data" name="form_package"  id="form_package" target="upload_target" onsubmit="clickupload();" >
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">จัดการข้อมูลสถานประกอบการ</h3>
                                    	</div><!-- /.box-header -->
                                        
                                        <div class="box-body">
                                        	<div class="row">
           										<div class="col-md-12">
                                        	<div id="box1">
                                                <div class="form-group">
                                                    <label>ชื่อสถานประกอบการ </label>
                                                    <div id="namebase" class="label label-info"></div>
                                                </div>
                                            </div>  <!-- /end box1 -->
                                            <div class="box-footer">
                                        		<button type="button" class="btn btn-info" id="step1">Next >></button>
                                    		</div>
                                            <div id="box2">
                                        	<div class="row">
           										<div class="col-md-4">
                                                <div class="form-group">
                                                    <label >พิกัดละติจูด</label>
                                                    <span id="latitude" name="latitude" class="label label-info"></span>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >พิกัดลองจิจูด</label>
                                                    <span id="longitude" name="longitude" class="label label-info"></span>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >ระดับการซูม</label>
                                                    <span id="zoom" name="zoom" class="label label-info"></span>
                                                </div>
                                                </div>
                                           </div>
                                        	<div class="row">
           										<div class="col-md-6">
                                            	<div class="form-group">
                                                    <label >ประเภทสถานประกอบการ</label>
        <?php
		echo "<select id='idtype' name='idtype' class='form-control input-sm pull-right' disabled>";
			echo "<option value=''> == ประเภทสถานประกอบการ == </option>";
		$sql="select idtype , nametype from tbtype order by idtype ASC";
		$result=mysql_db_query($database,$sql);
		while($row=mysql_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
		?>
                                                </div>
                                                </div>
           										<div class="col-md-6">
                                                <div class="form-group">
                                                    <label >ไฟล์รูปภาพ</label>
                                                    <img src="picture/<?php echo $rs['picture']?>" width="250">
                                                </div>
                                                </div>
                                             </div>
                                                <div class="form-group">
                                                    <label >รายละเอียด</label>
                                                    <span id="detail" name="detail" class="label label-info"></span>
                                                </div>
                                        	<div class="row">
           										<div class="col-md-6">
                                                <div class="form-group">
                                                    <label >ชื่อผู้ติดต่อ</label>
                                                    <span id="contact" name="contact" class="label label-info"></span>
                                                </div>
                                                </div>
           										<div class="col-md-6">
                                                <div class="form-group">
                                                    <label >เบอร์โทร</label>
                                                    <span id="tel" name="tel" class="label label-info"></span>
                                                </div>
                                                </div>
                                            </div>
                                        	<div class="row">
           										<div class="col-md-6">
                                                <div class="form-group">
                                                    <label >เฟสบุ๊ค</label>
                                                    <span id="facebook" name="facebook" class="label label-info"></span>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >เว็บไซต์</label>
                                                    <span id="website" name="website" class="label label-info"></span>
                                                </div>
                                                </div>
                                              </div>
                                            </div>  <!-- /end box2 -->
                                            </div>
                                            <div class="col-md-6">
                                            <div id="box3">
                                            </div>
                                            </div>
                                            </div><!-- /end row -->
                                            <div id ="step2">
                                            	<div class="box-footer">
                                                    <button type="submit" class="btn btn-primary" id="Save">Save</button>
                                                    <button type="reset" class="btn btn-primary" id="Cancel">Cancel</button>
                                                    <input name="idbase" id="idbase" name="idbase" type="hidden" value="" />
                                                </div>
                                            </div><!-- /end step2 -->
                                        </div><!-- /end box-body -->
                                     </div> <!-- /end box -->
                                  </form>
                                  <div id="load" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                  <div id="upload_process" align="center"></div>
	</div><!--/.wow2-->

            </div><!--/.wow1-->
           <div class="col-md-4 col-sm-6  wow fadeInDown">
            <aside class="right-side">
                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รายการข้อมูลทั้งหมดของ <?php echo $_SESSION["IASU_USER_NAME"];?></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>
                                    <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            </div><!-- /.wow -->
        </div><!-- /.row -->





        </div><!--/.container-->
        
<?php include("include/foot.php");?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>      
    <script src="js/gmap.js"></script>
    <script type="text/javascript">  
          $(document).ready(function() {
        //Set the carousel options
				$('#quote-carousel').carousel({
				  pause: true,
				  interval: 4000,
				});
      });
	</script>
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
					$("#showData").load("trader_data.php");
					$("#step2").hide();
					$("#box2").slideUp(0);
					$("#box3").slideUp(0);
					$("#load").fadeOut();
					
					$("#step1").click(function(){
						$("#step1").hide();
						$("#box2").slideDown(300);
						$("#box3").slideDown(300);
						$("#step2").slideDown(300);
						$("#map_canvas").load("trader_data.php?action=newmap");
					});
				
				$("#Cancel").click(function(){
					$("#errTotalLoad").hide();
					$("#errTerm").hide();
					$("#errYear").hide();
					
					$("#form_package")[0].reset();
					$("#step2").hide();
					$("#box2").slideUp(300);
					$("#box3").slideUp(300);
					$("#step1").show();
					$("#map_canvas").load("trader_data.php?action=startmap");
				});
				
				$("#namebase").keyup(function(){
					$("#errnamebase").hide();
					if($("#namebase").val()==""){
						$("#errnamebase").html("<font color='red'>กรุณากรอกข้อมูลชื่อ</font>").show().fadeIn(2000);
						return false;
					}
				});

				//จบ function read
			});
						
			$(document).on('click','.showitem', function() { 
	
						$("#map_canvas").load("trader_data.php?action=startmap");

			});
			
			$(document).on('click','.updateItem', function() { 
				var idbase = $(this).attr("href");
				idbase = idbase.replace("#","");
				$.post("trader_data.php?action=getupdate",{id:idbase},function(data){
					var returnData=data.split("|");
					$("#idbase").val(returnData[0]);
					$("#namebase").html(returnData[1]);
					$("#idtype").val(returnData[2]);
					//$("#picture").val(returnData[3]);
					$("#latitude").html(returnData[4]);
					lat = returnData[4];
					$("#longitude").val(returnData[5]);
					long = returnData[5];
					$("#zoom").val(returnData[6]);
					$("#detail").val(returnData[7]);
					$("#contact").val(returnData[8]);
					$("#tel").val(returnData[9]);
					$("#facebook").val(returnData[10]);
					$("#website").val(returnData[11]);
					$("#step1").hide();
					$("#box2").slideDown(300);
					$("#box3").slideDown(300);
					$("#step2").slideDown(300);
					//$("#map_canvas").load("trader_data.php?action=editmap");
					/*$("<script/>", {  
      "type": "text/javascript",  
      src: "js/editmap.js"  
    }).appendTo("body"); */     

				});
			});
						
			function clickupload(){
				$("#load").fadeIn();
				return true;
			}
			
			function stopUpload(success , error){
				var response="";
				if(success ==1){
					$("#upload_process").html("บันทึกข้อมูลเรียบร้อยแล้ว");
					$("#showData").load("trader_data.php");
					$("#load").fadeOut();
					
					$("#errTotalLoad").hide();
					$("#errTerm").hide();
					$("#errYear").hide();
					
					$("#form_package")[0].reset();
					$("#step2").hide();
					$("#box2").slideUp(300);
					$("#box3").slideUp(300);
					$("#step1").show();
					$("#map_canvas").load("trader_data.php?action=startmap");
					
				}else{
					if(error==1){
						$("#upload_process").html("<font color='red'>file ที่ upload จะต้องไฟล์รูปภาพเท่านั้น</font>");
						$("#load").fadeOut();
					}else if(error==2){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  เกิดปัญหาไม่สามารถ upload file ได้</font>");
						$("#load").fadeOut();
					}else if(error==3){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  เนื่องจากข้อมูลเทอมที่ท่านกรอกมีอยู่แล้ว</font>");
						$("#load").fadeOut();
					}else if(error==4){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  กรุณากรอกข้อมูลให้ครบด้วย</font>");
						$("#load").fadeOut();
					}
				}
				
				return true;
			}
</script>
