<?php 
	session_start();
	include('config/config.php');
	$subpageName="register";
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

    <div style="font-size: 12px;" id="dialog" title="ข้อมูลสมาชิก">
        <div id="dialog-from" ></div>
    </div>
	<?php include("include/head.php");?>
        <div class="container">
        <br>
        <div class="row">
        	<div class="col-md-2 col-sm-2 wow fadeInDown"></div>
           	<div class="col-md-8 col-sm-8 wow fadeInDown">
                      <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">ลงทะเบียนสมาชิก</h3>
                                       </div>
                    					<div class="box-body">
<?php 
		echo " <form action='register_data.php?action=insert_member' method='post' onsubmit='clickSave();' >";
			
            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";
            		echo "<label>คำนำหน้า<font color=\"red\">*</font></label>";
            		echo "<div class='row'>";
                        echo "<div class='col-lg-6'>";
                            echo "<select class='form-control' id='prefix' name='prefix'>";
                            	$i=0;
                            	foreach ($cf_prefix as &$value) {
                            		if($i>0){
                            			echo "<option value='$i' ";
                            			if(is_numeric($db_prefix)){
                            				$db_prefixset=$db_prefix;
                            			}else{
                            				$db_prefixset=4;
                            			}

                            			if($i==$db_prefixset){
                            				echo " selected='selected' ";
                            			}
                            			echo ">$value</option>";
                            		}
                            		$i++;
                            	}
                            echo "</select>";
                        echo "</div>";
                        echo "<div class='col-lg-6'>";
                            echo "<input type='text' class='form-control' id='txt_prefix' name='txt_prefix' ";
                            if( $db_prefixset==4){
								echo " value='$db_prefix' ";
                            }
                            echo " placeholder='คำนำหน้าชื่อ'>";
                        echo "</div>";
                    echo "</div>";
            	echo "</div>";
            	echo "<div class='form-group'>";
            		echo "<div class='row'>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >ชื่อ<font color=\"red\">*</font></label>";
            				echo "<input type='text' class='form-control' id='firstname' name='firstname' value=''>";
							echo "<span id='err_firstname' class='error'></span>";
            			echo "</div>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >นามสกุล<font color=\"red\">*</font></label>";
            				echo "<input type='text' class='form-control' id='lastname' name='lastname' value=''>";
							echo "<span id='err_lastname' class='error'></span>";
            			echo "</div>";
            		echo "</div>";
            	echo "</div>";
            	echo "<div class='form-group'>";
            		echo "<label >ที่อยู่<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' id='address' name='address' placeholder='ที่อยู่' value=''>";
					echo "<span id='err_address' class='error'></span>";
            				echo "<label >เบอร์โทร</label>";
							echo "<input type='text' class='form-control' id='mobile' name='mobile' value=''>";
							echo "<span id='err_mobile' class='error'></span>";
            				echo "<br><label >อีเมล์</label>";
            				echo "<input type='text' class='form-control' id='email' name='email' value=''>";
							echo "<span id='err_email' class='error'></span>";
            				echo "<br><label >อาชีพ</label>";
							echo "<input type='text' class='form-control' id='bu_position' name='bu_position' value=''>";
							echo "<span id='err_bu_position' class='error'></span>";
            		echo "<div class='row'>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >ชื่อล็อกอิน<font color=\"red\">*</font></label>";
							echo "<input type='text' class='form-control' id='username' name='username' value=''>";
							echo "<span id='err_username' class='error'></span>";
            			echo "</div>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >รหัสผ่าน<font color=\"red\">*</font></label>";
							echo "<input type='text' class='form-control' id='password' name='password' value=''>";
							echo "<span id='err_password' class='error'></span>";
							echo "<input type='hidden' class='form-control' name='idlevel' value='3'>";
							echo "<input type='hidden' class='form-control' name='permit' value='1'>";

            			echo "</div>";
            		echo "</div>";
							
							
            	echo "</div>";
            	echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary' >ลงทะเบียน</button>&nbsp;";
                echo "<input name='iduser' type='hidden' value='$id' />";
				echo "<div id='uploadDialog_process' align='center'></div>";
				echo "<div id='loadDialog' align='center'>";
					echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
				echo "</div>";
            echo "</div>";
		echo "</form>";

?>
                                    	
                         </div>
                    </div>
            </div><!--/.wow1-->
        	<div class="col-md-2 col-sm-2 wow fadeInDown"></div>            
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
        
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript">
			$(document).ready(function(){

				var prefix=$('#prefix').val();
				if(prefix==4){
					$('#txt_prefix').show();
				}else{
					$('#txt_prefix').hide();
				}

				$('#prefix').change(function(){
					var id=this.value;
					if(id==4){
						$('#txt_prefix').show();
					}else{
						$('#txt_prefix').hide();
					}
				});

				$("#loadDialog").fadeOut();
				//จบ function read
				
				$("#firstname").keyup(function(){
					$("#err_firstname").hide();
					if($("#firstname").val()==""){
						$("#err_firstname").html("<font color='red'>กรุณากรอกข้อมูลชื่อผู้ใช้</font>").show().fadeIn(2000);
						return false;
					}
				});
				$("#lastname").keyup(function(){
					$("#err_lastname").hide();
					if($("#lastname").val()==""){
						$("#err_lastname").html("<font color='red'>กรุณากรอกข้อมูลนามสกุล</font>").show().fadeIn(2000);
						return false;
					}
				});
				$("#address").keyup(function(){
					$("#err_address").hide();
					if($("#address").val()==""){
						$("#err_address").html("<font color='red'>กรุณากรอกข้อมูลของที่อยู่ด้วย</font>").show().fadeIn(2000);
						return false;
					}
				});
				$("#mobile").keyup(function(){
					$("#err_mobile").hide();
					if($("#mobile").val()==""){
						$("#err_mobile").html("<font color='red'>กรุณากรอกข้อมูลเบอร์โทร</font>").show().fadeIn(2000);
						return false;
					}
				});
				$("#email").keyup(function(){
					$("#err_email").hide();
					if($("#email").val()==""){
						$("#err_email").html("<font color='red'>กรุณากรอกข้อมูลอีเมล์</font>").show().fadeIn(2000);
						return false;
					}
				});
				$("#bu_position").keyup(function(){
					$("#err_bu_position").hide();
					if($("#bu_position").val()==""){
						$("#err_bu_position").html("<font color='red'>กรุณากรอกข้อมูลตำแหน่ง/อาชีพ</font>").show().fadeIn(2000);
						return false;
					}
				});
				$("#username").keyup(function(){
					$("#err_username").hide();
					if($("#username").val()==""){
						$("#err_username").html("<font color='red'>กรุณากรอกข้อมูลชื่อบัญชีล็อกอิน</font>").show().fadeIn(2000);
						return false;
					}
				});
				$("#password").keyup(function(){
					$("#err_password").hide();
					if($("#password").val()==""){
						$("#err_password").html("<font color='red'>กรุณากรอกข้อมูลรหัสผ่านล็อกอิน</font>").show().fadeIn(2000);
						return false;
					}
				});
			});


			function clickSave(){
                $('#loadDialog').fadeIn();
				   		if($('#firstname').val()==''){
                            $("#errorfirstname").html("<font color='red'>กรุณากรอกข้อมูลชื่อสมาชิก</font>");
                    	}
                return true;				
            }


            function stopUpload(success , error){
                    if(success ==1){
						$("#member").load("system_data.php?action=loadmember");
						$("#group").load("system_data.php?action=loadgroup");
						$("#type").load("system_data.php?action=loadtype");
                    }else{
                        if(error==1){
                            $("#uploadDialog_process").html("<font color='red'>กรุณากรอกข้อมูลให้ครบด้วย2</font>");
                        }
                    }
                return true;
            }

            $(document).on('click',"#butCancel",function(){
                $("#dialog").dialog( "close" );
            });
		</script>
