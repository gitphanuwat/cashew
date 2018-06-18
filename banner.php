<?php 
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");

$subpageName="banner";
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
    
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />


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
    <?php 
	
		$sql="select * from tbbanner";
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);

	
	?>
    <br>
        <div class="container">
                	<div class="row">
                		<!-- left column -->
                    	<div class="col-md-4">
                    		<div class="box box-solid bg-light-blue-gradient">
                    			<iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                    			<form action="banner_data.php?action=updatebanner1" method="post" target="upload_target" onsubmit="clickupload1();" >
                    				<div class="box-header">
	                                    <!-- tools box -->
	                                    <i class="fa fa-group"></i>
	                                    <h3 class="box-title">ป้ายประชาสัมพันธ์1</h3>
	                                </div>
	                                <div class="box-body">
	                                    <div class="form-group">
	                                    	<label >title1</label>
	                                        <input type="text" class="form-control" id="title1" name="title1" value="<?php echo $row['title1'];?>">
	                                        <span id="lblErrorFirstname" class="error"></span>
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >title2</label>
	                                        <input type="text" class="form-control" id="title2" name="title2" value="<?php echo $row['title2'];?>">
	                                        <span id="lblErrorLastname" class="error"></span>
	                                    </div>
	                                	<div class="form-group">
	                                    	<label >title3</label>
	                                        <input type="text" class="form-control" id="title3" name="title3" value="<?php echo $row['title3'];?>">
	                                    </div>
	                                </div>
	                                <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-primary" id="butBox1Save">Save</button>
                                        <div id="msbox1" align="center"></div>
                                        <input type="hidden" id="idbanner" name="idbanner" value="<?php echo $row['idbanner'];?>">
	                                </div>
                    			</form>
	                    		<form action="banner_data.php?action=insertPic_bg1" method="post" enctype="multipart/form-data"  target="upload_target" onsubmit="clickuploadbg1();" >
		                    		<div class="box-header">
			                            <!-- tools box -->
			                            <i class="fa fa-camera"></i>
			                            <h3 class="box-title">รูปภาพพื้นหลัง</h3>
			                        </div>
			                        <div class="box-body border-radius-none">
			                        	<div class="form-group">
                                                        	
                                            <div id="picbg1" style="margin:auto;padding:10px;"></div>
                                        </div>
                                        <div class="form-group">
                                           	<label>เปลียนรูปภาพ(ขนาด 1400x350 พิกเซล)</label>
                                            <input type="file" name="fileField" id="fileField" >
                                        </div>
			                        </div>
			                        <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-info" >Save</button>
	                                    <div id="loadbg1" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                       	<div id="msbox2" align="center"></div>
                                        <input type="hidden" id="idbanner" name="idbanner" value="<?php echo $row['idbanner'];?>">
	                                </div>
			                    </form>
	                    		<form action="banner_data.php?action=insertPic_im1" method="post" enctype="multipart/form-data"  target="upload_target" onsubmit="clickuploadim1();" >
		                    		<div class="box-header">
			                            <i class="fa fa-camera"></i>
			                            <h3 class="box-title">รูปภาพโปรโมท</h3>
			                        </div>
			                        <div class="box-body border-radius-none">
			                        	<div class="form-group">
                                            <div id="picim1" style="margin:auto;padding:10px;"></div>
                                        </div>
                                        <div class="form-group">
                                           	<label>เปลียนรูปภาพ(ขนาด 400x350 พิกเซล)</label>
                                            <input type="file" name="fileField" id="fileField" >
                                        </div>
			                        </div>
			                        <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-info" >Save</button>
	                                    <div id="loadim1" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                        <div id="msbox3" align="center"></div>  
                                        <input type="hidden" id="idbanner" name="idbanner" value="<?php echo $row['idbanner'];?>">  
	                                </div>
			                    </form>

                    		</div>
                    	</div>
                    	<!-- end left column -->
                        
                        
                        
                    	<!-- right column -->
                    	<div class="col-md-4">
                    		<div class="box box-solid bg-green-gradient">
                    			<iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                    			<form action="banner_data.php?action=updatebanner2" method="post" target="upload_target" onsubmit="clickupload2();" >
                    				<div class="box-header">
	                                    <!-- tools box -->
	                                    <i class="fa fa-group"></i>
	                                    <h3 class="box-title">ป้ายประชาสัมพันธ์2</h3>
	                                </div>
	                                <div class="box-body">
	                                    <div class="form-group">
	                                    	<label >ข้อความ1</label>
	                                        <input type="text" class="form-control" id="title4" name="title4" value="<?php echo $row['title4'];?>">
	                                        <span id="lblErrorFirstname" class="error"></span>
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >ข้อความ2</label>
	                                        <input type="text" class="form-control" id="title5" name="title5" value="<?php echo $row['title5'];?>">
	                                        <span id="lblErrorLastname" class="error"></span>
	                                    </div>
	                                	<div class="form-group">
	                                    	<label >ข้อความ3</label>
	                                        <input type="text" class="form-control" id="title6" name="title6" value="<?php echo $row['title6'];?>">
	                                    </div>
	                                </div>
	                                <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-primary" id="butBox1Save">Save</button>
                                        <div id="msbox4" align="center"></div>
                                         <input type="hidden" id="idbanner" name="idbanner" value="<?php echo $row['idbanner'];?>">
                                        	                                </div>
                    			</form>
	                    		<form action="banner_data.php?action=insertPic_bg2" method="post" enctype="multipart/form-data"  target="upload_target" onsubmit="clickuploadbg2();" >
		                    		<div class="box-header">
			                            <!-- tools box -->
			                            <i class="fa fa-camera"></i>
			                            <h3 class="box-title">รูปภาพพื้นหลัง</h3>
			                        </div>
			                        <div class="box-body border-radius-none">
			                        	<div class="form-group">
                                                        	
                                            <div id="picbg2" style="margin:auto;padding:10px;"></div>
                                        </div>
                                        <div class="form-group">
                                           	<label>เปลียนรูปภาพ(ขนาด 1400x350 พิกเซล)</label>
                                            <input type="file" name="fileField" id="fileField" >
                                        </div>
			                        </div>
			                        <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-info" >Save</button>
	                                    <div id="loadbg2" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                        <div id="msbox5" align="center"></div>
                                        <input type="hidden" id="idbanner" name="idbanner" value="<?php echo $row['idbanner'];?>">
	                                </div>
			                    </form>
	                    		<form action="banner_data.php?action=insertPic_im2" method="post" enctype="multipart/form-data"  target="upload_target" onsubmit="clickuploadim2();" >
		                    		<div class="box-header">
			                            <i class="fa fa-camera"></i>
			                            <h3 class="box-title">รูปภาพโปรโมท</h3>
			                        </div>
			                        <div class="box-body border-radius-none">
			                        	<div class="form-group">
                                                        	
                                            <div id="picim2" style="margin:auto;padding:10px;"></div>
                                        </div>
                                        <div class="form-group">
                                           	<label>เปลียนรูปภาพ(ขนาด 400x350 พิกเซล)</label>
                                            <input type="file" name="fileField" id="fileField" >
                                        </div>
			                        </div>
			                        <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-info" >Save</button>
	                                    <div id="loadim2" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                        <div id="msbox6" align="center"></div>
                                        <input type="hidden" id="idbanner" name="idbanner" value="<?php echo $row['idbanner'];?>">
	                                </div>
			                    </form>

                    		</div>
                    	</div>
                        
                        
                    	<div class="col-md-4">
	                    	<div class="box box-solid bg-teal-gradient">
                    			<iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                    			<form action="banner_data.php?action=updatebanner3" method="post" target="upload_target" onsubmit="clickupload3();" >
                    				<div class="box-header">
	                                    <!-- tools box -->
	                                    <i class="fa fa-group"></i>
	                                    <h3 class="box-title">ป้ายประชาสัมพันธ์3</h3>
	                                </div>
	                                <div class="box-body">
	                                    <div class="form-group">
	                                    	<label >ข้อความ1</label>
	                                        <input type="text" class="form-control" id="title7" name="title7" value="<?php echo $row['title7'];?>">
	                                        <span id="lblErrorFirstname" class="error"></span>
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >ข้อความ2</label>
	                                        <input type="text" class="form-control" id="title8" name="title8" value="<?php echo $row['title8'];?>">
	                                        <span id="lblErrorLastname" class="error"></span>
	                                    </div>
	                                	<div class="form-group">
	                                    	<label >ข้อความ3</label>
	                                        <input type="text" class="form-control" id="title9" name="title9" value="<?php echo $row['title9'];?>">
	                                    </div>
	                                </div>
	                                <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-primary" id="butBox1Save">Save</button>
                                        <div id="msbox7" align="center"></div>
                                         <input type="hidden" id="idbanner" name="idbanner" value="<?php echo $row['idbanner'];?>">
	                                </div>
                    			</form>
	                    		<form action="banner_data.php?action=insertPic_bg3" method="post" enctype="multipart/form-data"  target="upload_target" onsubmit="clickuploadbg3();" >
		                    		<div class="box-header">
			                            <!-- tools box -->
			                            <i class="fa fa-camera"></i>
			                            <h3 class="box-title">รูปภาพพื้นหลัง</h3>
			                        </div>
			                        <div class="box-body border-radius-none">
			                        	<div class="form-group">
                                                        	
                                            <div id="picbg3" style="margin:auto;padding:10px;"></div>
                                        </div>
                                        <div class="form-group">
                                           	<label>เปลียนรูปภาพ(ขนาด 1400x350 พิกเซล)</label>
                                            <input type="file" name="fileField" id="fileField" >
                                        </div>
			                        </div>
			                        <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-info" >Save</button>
	                                    <div id="loadbg3" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                        <div id="msbox8" align="center"></div>
                                        <input type="hidden" id="idbanner" name="idbanner" value="<?php echo $row['idbanner'];?>">
	                                </div>
			                    </form>
	                    		<form action="banner_data.php?action=insertPic_im3" method="post" enctype="multipart/form-data"  target="upload_target" onsubmit="clickuploadim3();" >
		                    		<div class="box-header">
			                            <i class="fa fa-camera"></i>
			                            <h3 class="box-title">รูปภาพโปรโมท</h3>
			                        </div>
			                        <div class="box-body border-radius-none">
			                        	<div class="form-group">
                                                        	
                                            <div id="picim3" style="margin:auto;padding:10px;"></div>
                                        </div>
                                        <div class="form-group">
                                           	<label>เปลียนรูปภาพ(ขนาด 400x350 พิกเซล)</label>
                                            <input type="file" name="fileField" id="fileField" >
                                        </div>
			                        </div>
			                        <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-info" >Save</button>
	                                    <div id="loadim3" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                        <div id="msbox9" align="center"></div>
                                        <input type="hidden" id="idbanner" name="idbanner" value="<?php echo $row['idbanner'];?>">
	                                </div>
			                    </form>

	                    	</div>
	                    </div>
                    	<!-- end right column -->
                    </div>





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
        

	<script type="text/javascript">
	$(document).ready(function(){
				
		$("#loadbox1").hide();
		$("#loadbox2").hide();
		$("#loadbox3").hide();
		
		$("#picbg1").load("banner_data.php?action=getPic_bg1");
		$("#loadbg1").fadeOut();
		$("#picbg2").load("banner_data.php?action=getPic_bg2");
		$("#loadbg2").fadeOut();
		$("#picbg3").load("banner_data.php?action=getPic_bg3");
		$("#loadbg3").fadeOut();

		$("#picim1").load("banner_data.php?action=getPic_im1");
		$("#loadim1").fadeOut();
		$("#picim2").load("banner_data.php?action=getPic_im2");
		$("#loadim2").fadeOut();
		$("#picim3").load("banner_data.php?action=getPic_im3");
		$("#loadim3").fadeOut();
		// end read
	});

	function clickuploadCourse(){
		$("#loadCourse").fadeIn();
		return true;
	}

	function clickuploadbg1(){
				$("#msbox2").html("<font color='red'>..กำลังบันทึก..</font>");
		return true;
	}
	function clickuploadbg2(){
				$("#msbox5").html("<font color='red'>..กำลังบันทึก..</font>");
		return true;
	}
	function clickuploadbg3(){
				$("#msbox8").html("<font color='red'>..กำลังบันทึก..</font>");
		return true;
	}

	function clickuploadim1(){
				$("#msbox3").html("<font color='red'>..กำลังบันทึก..</font>");
		return true;
	}
	function clickuploadim2(){
				$("#msbox6").html("<font color='red'>..กำลังบันทึก..</font>");
		return true;
	}
	function clickuploadim3(){
				$("#msbox9").html("<font color='red'>..กำลังบันทึก..</font>");
		return true;
	}


	function clickupload1(){
				$("#msbox1").html("<font color='red'>..กำลังบันทึก..</font>");
		return true;
	}
	function clickupload2(){
				$("#msbox4").html("<font color='red'>..กำลังบันทึก..</font>");
		return true;
	}
	function clickupload3(){
				$("#msbox7").html("<font color='red'>..กำลังบันทึก..</font>");
		return true;
	}
			
	function stopUpload(success , error , box){
		var response="";
		if(success==1){
			if(box==1){
				$("#msbox1").html("<font color='blue'>บันทึกข้อมูลเรียบร้อยแล้ว</font>");
			}else if(box==4){
				$("#msbox4").html("<font color='blue'>บันทึกข้อมูลเรียบร้อยแล้ว</font>");
			}else if(box==7){
				$("#msbox7").html("<font color='blue'>บันทึกข้อมูลเรียบร้อยแล้ว</font>");
			}else if(box==2){
				$("#msbox2").html("<font color='blue'>อัพโหลดรูปภาพเรียนร้อย</font>");
				$("#picbg1").load("banner_data.php?action=getPic_bg1");
			}else if(box==5){
				$("#msbox5").html("<font color='blue'>อัพโหลดรูปภาพเรียนร้อย</font>");
				$("#picbg2").load("banner_data.php?action=getPic_bg2");
			}else if(box==8){
				$("#msbox8").html("<font color='blue'>อัพโหลดรูปภาพเรียนร้อย</font>");
				$("#picbg3").load("banner_data.php?action=getPic_bg3");
			}else if(box==3){
				$("#msbox3").html("<font color='blue'>อัพโหลดรูปภาพเรียนร้อย</font>");
				$("#picim1").load("banner_data.php?action=getPic_im1");
			}else if(box==6){
				$("#msbox6").html("<font color='blue'>อัพโหลดรูปภาพเรียนร้อย</font>");
				$("#picim2").load("banner_data.php?action=getPic_im2");
			}else if(box==9){
				$("#msbox9").html("<font color='blue'>อัพโหลดรูปภาพเรียนร้อย</font>");
				$("#picim3").load("banner_data.php?action=getPic_im3");
			}
		}else{
			if(box==1){
				if(error==1){
					$("#msbox1").html("<font color='red'>กรุณาพิมพ์หัวเรื่องของป้ายประชาสัมพันธ์</font>");
					$("#loadBox1").fadeOut();
				}
			}else if(box==2){
				if(error==1){
					$("#upload_processPic").html("<font color='red'>กรุณากรอกเลือกรูปภาพที่ต้องการด้วย</font>");
					$("#loadPic").fadeOut();
				}else if(error==2){
					$("#upload_processPic").html("<font color='red'>ไม่สามารถ upload ได้  กรุณาเลือก file ที่เป็นรูปเท่านั้น</font>");
					$("#loadPic").fadeOut();
				}else if(error==3){
					$("#upload_processPic").html("<font color='red'>เกิดความผิดพลาดในการ upload</font>");
					$("#loadPic").fadeOut();
				}
			}else if(box==4){
				if(error==1){
					$("#upload_processCourse").html("<font color='red'>กรุณากรอกข้อมูลให้ครบด้วย</font>");
					$("#loadCourse").fadeOut();
				}
			}
		}
				
		return true;
	}
			
</script>