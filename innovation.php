<?php
	session_start();
	include('config/config.php');
$pageName="innovation";
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


    <section id="services" class="service-item">
	   <div class="container">
            <input type="hidden" name="idact" id="idact" value="<?php echo $_GET['id'];?>">
            <input type="hidden" name="idgrp" id="idgrp" value="<?php echo $_GET['idgroup'];?>">
             <div class="box-body table-responsive no-padding">

				<div id="showinnogroup"></div>
                <div id="loadinnogroup" align="center">
                    <img src="img/ajax-loader.gif" align="absmiddle" />
                </div>
            <div id="showdetaila"></div>
        	</div>
        </div><!--/.container-->
    </section><!--/#services-->
<?php include("include/foot.php");?>

</body>
</html>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
				var idact=$('#idact').val();
				var idgrp=$('#idgrp').val();
				//var idact = $(this).attr("href");
				//idact = idact.replace("#","");
			if(idact){
				$("#showinnogroup").load("innovation_data.php?action=showinnoact",{id:idgrp,idact:idact});
				$("#loadinnogroup").fadeOut();
				$("#showmenu").hidden();
			}else{
				$("#showinnogroup").load("innovation_data.php?action=showinnogroup" ,function(){
					$("#loadinnogroup").fadeOut();
				});
			}
		});

			$(document).on('click','.showinno', function() {
				var idgroup = $(this).attr("href");
				idgroup = idgroup.replace("#","");
				$("#showinnogroup").load("innovation_data.php?action=showinno",{id:idgroup});
			});
			$(document).on('click','.showdetail', function() {
				var id = $(this).attr("href");
				id = id.replace("#","");
				$("#showdetail").load("innovation_data.php?action=showdetail",{id:id});
			});
			$(document).on('click','#bnback', function() {
				$("#showinnogroup").load("innovation_data.php?action=showinnogroup" ,function(){
					$("#loadinnogroup").fadeOut();
				});
			});
			$(document).on('click','.naviPN', function() {
				var url=$(this).attr("href");
					$("#loadinnogroup").fadeIn();
					$("#showinnogroup").load(url + "&action=showinnogroup" ,function(){
					$("#loadinnogroup").fadeOut();
				});
				return false;
			});

</script>
