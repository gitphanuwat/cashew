<?php
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");

	if($_GET["action"]=="showinnogroup"){

		echo '<div class="row">';
		$sql="select * from tbinnogroup";
		$result=mysql_db_query($database,$sql);

			$total=mysql_num_rows($result);
			$e_page=10;
			if(!isset($_GET['s_page'])){
				$_GET['s_page']=0;
			}else{
				$chk_page=$_GET['s_page'];
				$_GET['s_page']=$_GET['s_page']*$e_page;
			}
			$sql=$sql . " LIMIT " . $_GET['s_page'] . " , $e_page";
			$result=mysql_db_query($database,$sql);
			if(mysql_num_rows($result)>=1){
				$plus_p=($chk_page*$e_page)+mysql_num_rows($result);
			}else{
				$plus_p=($chk_page*$e_page);
			}
			$total_p=ceil($total/$e_page);
			$before_p=($chk_page*$e_page)+1;

		while($row=mysql_fetch_array($result)){
			$idg=$row[0];
			$sqlc="select count(*) from tbinnovation where idgroup = $idg";
			$resultc=mysql_db_query($database,$sqlc);
			@$rowc=mysql_fetch_array($resultc);
		            echo '<div class="col-sm-4 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img  src="user/profile_pic/'.$row[4].'" width="100" height="100">
                        </div>
                        <div class="media-body">
                        <a href="#'.$row[0].'" title="แก้ไขข้อมูล" class="showinno">
                            <h4 class="media-heading">'.$row[1].'</h4></a>
						<p class="pages01">'.$row[2].'</p>
                        </div>
                    </div>
                </div>
		';
		}
		echo 		'</div>	';

        if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="innovation_data.php?url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
					echo "</ul>";
				echo "</div>";
	        echo "</div>";
		}

		exit();
	}

	if($_GET["action"]=="showinno"){
		$sql="select * from tbinnogroup where idgroup = ".$_POST['id'];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
		$sql2="select * from tbinnovation where idgroup = ".$_POST['id'];
		$result2=mysql_db_query($database,$sql2);
		echo '
		<div class="row">
		                <div class="col-sm-12 col-md-12">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="user/profile_pic/'.$row[4].'" width="200px">
                        </div>
                        <div class="media-body">
                        <a href="#'.$row[0].'" title="รายละเอียดข้อมูล" class="showinno">
                            <h3 class="media-heading">'.$row[1].'</h3>
                         </a>
						 <p class="pages01">'.$row[2].'</p>
                        </div>
                    </div>
                </div>
		</div>
		<div class="row">
		      <div class="col-sm-3 col-md-3">
                    <div class="media services-wrap wow fadeInDown">
';
		while($row2=mysql_fetch_array($result2)){
		echo '
                        <div class="media">
						<i class="fa fa-file-o"><a href="#'.$row2[0].'" title="แก้ไขข้อมูล" class="showdetail">
                            '.$row2[3].'
                        </a></i>

                        </div>';
		}
		echo '      </div>
			<button type="button" id="bnback" class="btn btn-default">สินค้าทั้งหมด</button>
		';
        echo '
                </div>
		';

		echo '
		        <div class="col-sm-9 col-md-9">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="media-body">
							<div id="showdetail">
							</div>
                        </div>
                    </div>
                </div>
			</div>
		';
		exit();
	}

	if($_GET["action"]=="showinnoact"){
		$sql="select * from tbinnogroup where idgroup = ".$_POST['id'];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
		$sql2="select * from tbinnovation where idgroup = ".$_POST['id'];
		$result2=mysql_db_query($database,$sql2);
		echo '
		<div class="row">
		                <div class="col-sm-12 col-md-12">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="user/profile_pic/'.$row[4].'">
                        </div>
                        <div class="media-body">
                        <a href="#'.$row[0].'" title="แก้ไขข้อมูล" class="showinno">
                            <h3 class="media-heading">'.$row[1].'</h3>
                            <p class="pages01">'.$row[2].'</p>
                        </a>
                        </div>
                    </div>
                </div>
		</div>
		<div class="row">
		      <div class="col-sm-3 col-md-3">
                    <div class="media services-wrap wow fadeInDown">
';
		while($row2=mysql_fetch_array($result2)){
		echo '
                        <div class="media">
						<i class="fa fa-file-o"><a href="#'.$row2[0].'" title="แก้ไขข้อมูล" class="showdetail">
                            '.$row2[3].'
                        </a></i>

                        </div>';
		}
		echo '      </div>
			<button type="button" id="bnback" class="btn btn-default">สินค้าทั้งหมด</button>
		';
        echo '
                </div>
		';

		echo '
		        <div class="col-sm-9 col-md-9">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="media-body">
							<div id="showdetail">';


		$sql3="select * from tbinnovation where idinno = ".$_POST['idact'];
		$result3=mysql_db_query($database,$sql3);
		$row3=@mysql_fetch_array($result3);
		echo '
		<div class="row">
		            <div class="col-sm-12 col-md-12">
                            <h3 class="media-heading">'.$row3[3].'</h3>
                            '.$row3[4].'
                	</div>
		</div>



							</div>
                        </div>
                    </div>
                </div>
			</div>
		';
		exit();
	}

	if($_GET["action"]=="showdetail"){
		$sql3="select * from tbinnovation where idinno = ".$_POST['id'];
		$result3=mysql_db_query($database,$sql3);
		$row3=mysql_fetch_array($result3);
		echo '
		<div class="row">
		            <div class="col-sm-12 col-md-12">
                            <h3 class="media-heading">'.$row3[3].'</h3>
                            '.$row3[4].'
                	</div>
		</div>
		';
		exit();
	}



	mysql_close();

?>
