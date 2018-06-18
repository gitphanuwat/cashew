<?php 
	session_start();
	include('config/config.php');
$subpageName="userprofile";
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
    <br>
        <div class="container">
                	<div class="row">
                		<!-- left column -->
                    	<div class="col-md-4">
                    		<div class="box box-solid bg-light-blue-gradient">
                    			<iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                    			<form action="Userprofile_data.php?action=update_data" method="post" target="upload_target" onsubmit="clickupload_basic();" >
                    				<div class="box-header">
	                                    <!-- tools box -->
	                                    <div class="pull-right box-tools">
	                                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip"  style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
	                                    </div><!-- /. tools -->

	                                    <i class="fa fa-group"></i>
	                                    <h3 class="box-title">ข้อมูลส่วนตัว</h3>
	                                </div>
	                                <div class="box-body">
	                                    <div class="form-group">
	                                    	<label >คำนำหน้าชื่อ</label>
	                                        <div class="row">
	                                        	<div class="col-lg-6">
	                                            	<select class="form-control" id="cboPrefix" name="cboPrefix">
	                                                    <option value="1">นาย</option>
	                                                    <option value="2">นาง</option>
	                                                    <option value="3">นางสาว</option>
	                                                    <option value="4">อื่น ๆ</option>
	                                                </select>
	                                            </div>
	                                            <div class="col-lg-6">
	                                            	<input type="text" class="form-control" id="txtPrefix" name="txtPrefix" placeholder="คำนำหน้าชื่อ">
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >ชื่อ</label>
	                                        <input type="text" class="form-control" id="txtFirstname" name="txtFirstname" placeholder="ชื่อ">
	                                        <span id="lblErrorFirstname" class="error"></span>
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >สกุล</label>
	                                        <input type="text" class="form-control" id="txtLastname" name="txtLastname" placeholder="สกุล">
	                                        <span id="lblErrorLastname" class="error"></span>
	                                    </div>
	                                	<div class="form-group">
	                                    	<label >ชื่อล็อกอิน</label>
	                                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >รหัสผ่านล็อกอิน</label>
	                                        <input type="text" class="form-control" id="password" name="password" placeholder="passwsord">
	                                    </div>
	                                </div>
	                                <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-primary" id="butBox1Save">Save</button>
	                                    <input name="box"  type="hidden" value="1" />
	                                    <div id="loadbasic" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
	                        			<div id="upload_process_basic" align="center"></div> 
	                                </div>
                    			</form>
                    		</div>
	                    	<div class="box box-solid bg-teal-gradient">
	                    		<form action="userprofile_data.php?action=update_pic" method="post" enctype="multipart/form-data"  target="upload_target" onsubmit="clickupload_pic();" >
		                    		<div class="box-header">
			                            <!-- tools box -->
			                            <div class="pull-right box-tools">
			                                <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			                            </div><!-- /. tools -->

			                            <i class="fa fa-camera"></i>
			                            <h3 class="box-title">รูปภาพประจำตัว</h3>
			                        </div>
			                        <div class="box-body border-radius-none">
			                        	<div class="form-group">
                                                        	
                                            <div id="picBox" style="margin:auto;padding:10px;"></div>
                                        </div>
                                        <div class="form-group">
                                           	<label>เปลียนรูปภาพ</label>
                                            <input type="file" name="fileField" id="fileField" >
                                        </div>
			                        </div>
			                        <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-info" >Save</button>
                                        <input name="box"  type="hidden" value="2" />
	                                    <div id="loadpic" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                        <div id="upload_process_pic" align="center"></div>    
	                                </div>
			                    </form>
	                    	</div>
                    	</div>
                    	<!-- end left column -->
                    	<!-- right column -->
                    	<div class="col-md-4">
	                    	<div class="box box-solid bg-teal-gradient">
	                    		<form action="Userprofile_data.php?action=update_data" method="post" target="upload_target" onsubmit="clickupload_contact();" >
		                    		<div class="box-header">
			                            <!-- tools box -->
			                            <div class="pull-right box-tools">
			                                <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
			                            </div><!-- /. tools -->

			                            <i class="fa fa-th-large"></i>
			                            <h3 class="box-title">ข้อมูลติดต่อ</h3>
			                        </div>
                                    <div class="box-body">
	                                	<div class="form-group">
	                                    	<label >ที่อยู่</label>
	                                        <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="ที่อยู่">
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >รหัสไปรษณีย์</label>
	                                        <input type="text" class="form-control" id="txtPostcode" name="txtPostcode" placeholder="รหัสไปรษรีย์">
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >ประเทศ</label>
	                                        <select class="form-control" id="cbocf_country" name="cbocf_country">
	                                        	<option value="1">ไทย</option>
	                                            <option value="2">สปป.ลาว</option>
	                                            <option value="3">พม่า</option>
	                                            <option value="4">กัมพูชา</option>
	                                        </select>
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >โทรศัพท์มือถือ</label>
	                                        <div class="input-group">
	                                            <div class="input-group-addon">
	                                                <i class="fa fa-phone"></i>
	                                            </div>
	                                        	<input type="text" id="txtMobile" name="txtMobile" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
	                                        </div> 
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >E-Mail</label>
	                                        <div class="input-group">
	                                            <div class="input-group-addon">
	                                                <i class="fa fa-envelope"></i>
	                                            </div>
	                                        	<input type="text" id="txtEmail" name="txtEmail" class="form-control" placeholder="E-Mail"/>
	                                        </div> 
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >Facebook</label>
	                                        <div class="input-group">
	                                            <div class="input-group-addon">
	                                                <i class="fa fa-envelope"></i>
	                                            </div>
	                                        	<input type="text" id="txtFacebook" name="txtFacebook" class="form-control" placeholder="Facebook"/>
	                                        </div> 
	                                    </div>
                                    	</div>
			                        <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-info" >Save</button>
                                        <input name="box"  type="hidden" value="3" />
	                                    <div id="loadcontact" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                        <div id="upload_process_contact" align="center"></div>    
	                                </div>
			                    </form>
	                    	</div>
                    	</div>
                    	<div class="col-md-4">
                    		<div class="box box-solid bg-green-gradient">
                    			<form action="Userprofile_data.php?action=update_data" method="post" target="upload_target" onsubmit="clickupload_work();" >
                    				<div class="box-header">
	                                    <div class="pull-right box-tools">
	                                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                                    </div>

	                                    <i class="fa fa-phone-square"></i>
	                                    <h3 class="box-title">ข้อมูลอาชีพ</h3>
	                                </div>
	                                <div class="box-body">
	                                    <div class="form-group">
	                                    	<label >อาชีพ</label>
	                                        <input type="text" class="form-control" id="work" name="work" placeholder="อาชชีพ">
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >ตำแหน่ง</label>
	                                        <input type="text" class="form-control" id="bu_position" name="bu_position" placeholder="ตำแหน่งงาน">
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >ที่อยู่สถานประกอบการ</label>
	                                        <input type="text" class="form-control" id="bu_address" name="bu_address" placeholder="ที่อยู่สถานประกอบการ">
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >เบอร์โทรศัพท์</label>
	                                        <div class="input-group">
	                                            <div class="input-group-addon">
	                                                <i class="fa fa-phone"></i>
	                                            </div>
	                                        	<input type="text" id="bu_tel" name="bu_tel" class="form-control" data-inputmask='"mask": "(99) 999-9999"' data-mask/>
	                                        </div> 
	                                    </div>
	                                    <div class="form-group">
	                                    	<label >โทรสาร</label>
	                                        <div class="input-group">
	                                            <div class="input-group-addon">
	                                                <i class="fa fa-phone"></i>
	                                            </div>
	                                        	<input type="text" id="bu_fax" name="bu_fax" class="form-control" data-inputmask='"mask": "(999) 999-999"' data-mask/>
	                                        </div> 
	                                    </div>
			                        <div class="box-body border-radius-none">
			                        	<div class="chart" id="boxgroup"></div>  
			                        </div>
	                                </div>
	                                <div class="box-footer no-border">
	                                	<button type="submit" class="btn btn-success" id="butBox2Save">Save</button>
	                                    <input name="box"  type="hidden" value="4" />
	                                    <div id="loadwork" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
	                        			<div id="upload_process_work" align="center"></div> 
	                                </div>
                    			</form>
                    		</div>

	                    </div>
                    </div>





        </div><!--/.container-->
        
<?php include("include/foot.php");?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>      
    <script src="js/gmapuser.js"></script>
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
        
         <!-- InputMask -->
        <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

	<script type="text/javascript">
	$(document).ready(function(){
				
		$("[data-mask]").inputmask();
				
		$("#txtPrefix").hide();
		
		loadAllData();
		
		$("#boxgroup").load("Userprofile_data.php?action=getgroup");
		$("#loadcontact").fadeOut();

		$("#picBox").load("userprofile_data.php?action=getPic");
		$("#loadpic").fadeOut();
				
		$("#cboPrefix").change(function(){
			var id=this.value;
			if(id==4){
				$("#txtPrefix").show();
			}else{
				$("#txtPrefix").hide();
			}
		});
		// end read
	});

	function clickupload_basic(){
		$("#loadbasic").fadeIn();
		return true;
	}

	function clickupload_pic(){
		$("#loadpic").fadeIn();
		return true;
	}
			
	function clickupload_contact(){
		$("#loadcontact").fadeIn();
		return true;
	}
			
	function clickupload_work(){
		$("#loadwork").fadeIn();
		return true;
	}
			
	function stopUpload(success , error , box){
		var response="";
		if(success ==1){
			if(box==1){
				$("#upload_process_basic").html("บันทึกข้อมูลเรียบร้อยแล้ว");
				$("#loadbasic").fadeOut();
			}else if(box==2){
				$("#upload_process_pic").html("ได้ทำการ upload รูปภาพเรียนร้อยแล้ว");
				$("#picBox").load("userprofile_data.php?action=getPic");
				$("#loadpic").fadeOut();
			}else if(box==3){
				$("#upload_process_contact").html("บันทึกข้อมูลเรียบร้อยแล้ว");
				$("#loadcontact").fadeOut();
			}else if(box==4){
				$("#upload_process_work").html("บันทึกข้อมูลเรียบร้อยแล้ว");
				$("#loadwork").fadeOut();
			}
		}else{
			if(box==1){
				if(error==1){
					$("#upload_process_Box1").html("<font color='red'>กรุณากรอกชื่อและนามสกุลด้วย</font>");
					$("#loadbasic").fadeOut();
				}
			}else if(box==2){
				if(error==1){
					$("#upload_processPic").html("<font color='red'>กรุณากรอกเลือกรูปภาพที่ต้องการด้วย</font>");
					$("#loadpic").fadeOut();
				}else if(error==2){
					$("#upload_processPic").html("<font color='red'>ไม่สามารถ upload ได้  กรุณาเลือก file ที่เป็นรูปเท่านั้น</font>");
					$("#loadpic").fadeOut();
				}else if(error==3){
					$("#upload_processPic").html("<font color='red'>เกิดความผิดพลาดในการ upload</font>");
					$("#loadpic").fadeOut();
				}
			}else if(box==4){
				if(error==1){
					$("#upload_process_contact").html("<font color='red'>กรุณากรอกข้อมูลให้ครบด้วย</font>");
					$("#loadcontact").fadeOut();
				}
			}
		}
				
		return true;
	}
			
	function loadAllData(){
		var pData=0;
		$.post("Userprofile_data.php?action=getData",{pData:pData},function(data){
			var row=data.split("|");


				switch(row[1]){
				case "1" :
					$("#cboGroup").val("1");
					break;
							
				case "2" :
					$("#cboGroup").val("2");
					break;
							
				case "3" :
					$("#cboGroup").val("3");
					break;
							
				default:
					$("#cboGroup").val("4");
				};
			
				switch(row[2]){
				case "1" :
					$("#cboPrefix").val("1");
					break;
							
				case "2" :
					$("#cboPrefix").val("2");
					break;
							
				case "3" :
					$("#cboPrefix").val("3");
					break;
							
				default:
					$("#cboPrefix").val("4");
					$("#txtPrefix").show();
					$("#txtPrefix").val(row[2]);
				}
					
				$("#txtFirstname").val(row[3]);
				$("#txtLastname").val(row[4]);
				$("#username").val(row[17]);
				$("#password").val(row[18]);
				
				
    	        $("#txtAddress").val(row[10]);
                $("#txtPostcode").val(row[11]);
			
				switch(row[12]){
				case "1" :
					$("#cbocf_country").val("1");
					break;
							
				case "2" :
					$("#cbocf_country").val("2");
					break;
							
				case "3" :
					$("#cbocf_country").val("3");
					break;
							
				default:
					$("#cbocf_country").val("4");
				}
                $("#txtMobile ").val(row[13]);
                $("#txtEmail").val(row[14]);
                $("#txtFacebook").val(row[15]);
					
				$("#work").val(row[5]);
				$("#bu_address").val(row[6]);
				$("#bu_position").val(row[7]);
				$("#bu_tel").val(row[8]);
				$("#bu_fax").val(row[9]);
				
					
				$("#loadbasic").fadeOut();
				$("#loadwork").fadeOut();
		});
	}
</script>