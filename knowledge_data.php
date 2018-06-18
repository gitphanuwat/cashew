<?php
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	if($_GET["action"]=="showknowgroup"){
		
		echo '<div class="row">';
		$sql="select * from tbknowgroup";
		$result=mysql_db_query($database,$sql);
		while($row=mysql_fetch_array($result)){
			$idg=$row[0];
			$sqlc="select count(*) from tbknowledge where idgroup = $idg";
			$resultc=mysql_db_query($database,$sqlc);
			@$rowc=mysql_fetch_array($resultc);
		            echo '<div class="col-sm-6 col-md-6">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="user/profile_pic/'.$row[4].'">
                        </div>
                        <div class="media-body">
                        <a href="#'.$row[0].'" title="แก้ไขข้อมูล" class="showknow">
                            <h3 class="media-heading">'.$row[1].'<font color="red"> ('.$rowc[0].')</font></h3>
                            <p class="pages01">'.$row[2].'</p>
                        </a>
                        </div>
                    </div>
                </div>
		';
		}
		echo 		'</div>	';
		exit();
	}
	
	if($_GET["action"]=="showknow"){
		$sql="select * from tbknowgroup where idgroup = ".$_POST['id'];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
		$sql2="select * from tbknowledge where idgroup = ".$_POST['id'];
		$result2=mysql_db_query($database,$sql2);
		echo '
		<div class="row">
		                <div class="col-sm-12 col-md-12">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="user/profile_pic/'.$row[4].'">
                        </div>
                        <div class="media-body">
                        <a href="#'.$row[0].'" title="แก้ไขข้อมูล" class="showknow">
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
			<button type="button" id="bnback" class="btn btn-default">หมวดหมู่ทั้งหมด</button>
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

	if($_GET["action"]=="showknowact"){
		$sql="select * from tbknowgroup where idgroup = ".$_POST['id'];
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
		$sql2="select * from tbknowledge where idgroup = ".$_POST['id'];
		$result2=mysql_db_query($database,$sql2);
		echo '
		<div class="row">
		                <div class="col-sm-12 col-md-12">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive" src="user/profile_pic/'.$row[4].'">
                        </div>
                        <div class="media-body">
                        <a href="#'.$row[0].'" title="แก้ไขข้อมูล" class="showknow">
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
			<button type="button" id="bnback" class="btn btn-default">หมวดหมู่ทั้งหมด</button>
		';
        echo '
                </div>
		';
		
		echo '
		        <div class="col-sm-9 col-md-9">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="media-body">
							<div id="showdetail">';
							
							
		$sql3="select * from tbknowledge where idknow = ".$_POST['idact'];
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
		$sql3="select * from tbknowledge where idknow = ".$_POST['id'];
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