<?php
	$PageTitle="อุทยานวิทยาศาสตร์ภาคเหนือ:มหาวิทยาลัยราชภัฏอุตรดิตถ์";
	
	//session_register("IASU_USER_ID");
	//session_register("IASU_USER_STATE");
	//session_register("IASU_USER_NAME");
	
	$host="localhost";
	$hostuser="nsp-center";
	$hostpass="nsp-center@uru";
	$database="nsp-center";
	
	//$Per_Page = 25;
	
	function getDatafromUser($tableName , $field , $id_subwork , $user_id , $id_userwork){
		$host="localhost";
		$hostuser="nsp-center";
		$hostpass="nsp-center@uru";
		$database="nsp-center";
	
		mysql_connect($host,$hostuser,$hostpass);
		mysql_query("SET NAMES UTF8");
	
		$sql="select $field from $tableName where id_subwork=$id_subwork ";
		$sql=$sql . " and id_user= $user_id and id_userwork=$id_userwork" ;
		$result=mysql_db_query($database,$sql);
		$row=mysql_fetch_array($result);
		return $row[0];
	}

	function addLogtoDB($logstr , $userID){
		$host="localhost";
		$hostuser="nsp-center";
		$hostpass="nsp-center@uru";
		$database="nsp-center";

		mysql_connect($host,$hostuser,$hostpass);
		mysql_query("SET NAMES UTF8");

		// CheckIP ADDRESS For Log    ----  ====================================================*//
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';	
	
		/* END check IP ADDRESS For Log   ----- ====================================================*/					

		$logdatetime = date("Y-m-d H:i:s");
		$LogSQL = "INSERT INTO cf_log";
		$LogSQL .="(logstr,id_user,logdatetime,ip) ";
		$LogSQL .="VALUES ";			
		$LogSQL .="('".addslashes($logstr)."',".$userID.",'".$logdatetime."','".$ipaddress ."') ";
		$result=mysql_db_query($database,$LogSQL);

		
	}

	function CreatePrefix( $education){
		$ReturnPrefix="";
		if($education=="3"){
			$ReturnPrefix="ดร.";
		}
		
		return $ReturnPrefix;	
	}
	
	function randomText($length){
		$text = "";
		$key_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ0123456789';
		$rand_max  = strlen($key_chars) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand_pos  = rand(0, $rand_max);
			$text.= $key_chars{$rand_pos};
		}
		return $text;
	}
	
	function page_navigator($urlfile ,$before_p,$plus_p,$total,$total_p,$chk_page){   
		global $e_page;
		global $querystr;
		
		$per_page=4;
		$num_per_page=floor($chk_page/$per_page);
		$total_end_p=($num_per_page+1)*$per_page;
		$total_start_p=$total_end_p-$per_page;
		$pPrev=$chk_page-1;
		$pPrev=($pPrev>=0)?$pPrev:0;
		$pNext=$chk_page+1;
		$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
		$lt_page=$total_p-4;
		if($chk_page>0){  
			echo "<li><a  href='$urlfile&s_page=$pPrev&querystr=".$querystr."' class='naviPN'>Prev</a></li>";
		}
		for($i=$total_start_p;$i<$total_end_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			if($e_page*$i<=$total){
			echo "<li><a href='$urlfile&s_page=$i&querystr=".$querystr."' class='naviPN'  >".intval($i+1)."</a></li> ";   
			}
		}		
		if($chk_page<$total_p-1){
			echo "<li><a href='$urlfile&s_page=$pNext&querystr=".$querystr."'  class='naviPN'>Next</a></li>";
		}
	}

	function page_navigator1($urlfile ,$before_p,$plus_p,$total,$total_p,$chk_page){   
		global $e_page;
		global $querystr;
		
		$per_page=4;
		$num_per_page=floor($chk_page/$per_page);
		$total_end_p=($num_per_page+1)*$per_page;
		$total_start_p=$total_end_p-$per_page;
		$pPrev=$chk_page-1;
		$pPrev=($pPrev>=0)?$pPrev:0;
		$pNext=$chk_page+1;
		$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
		$lt_page=$total_p-4;
		if($chk_page>0){  
			echo "<li><a  href='$urlfile&s_page=$pPrev&querystr=".$querystr."' class='naviPN1'>Prev</a></li>";
		}
		for($i=$total_start_p;$i<$total_end_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			if($e_page*$i<=$total){
			echo "<li><a href='$urlfile&s_page=$i&querystr=".$querystr."' class='naviPN1'  >".intval($i+1)."</a></li> ";   
			}
		}		
		if($chk_page<$total_p-1){
			echo "<li><a href='$urlfile&s_page=$pNext&querystr=".$querystr."'  class='naviPN1'>Next</a></li>";
		}
	}   

	$cf_sex = array('','ชาย','หญิง');
	$cf_prefix = array('','นาย','นาง','นางสาว','อื่นๆ');
	$cf_sector = array('','ปกติ','พิเศษ','กศ.บป.');
	$cf_level = array('','ปริญญาตรี','ปริญญาโท','ปริญญาเอก');
	$cf_aca_position = array('','ศ.','รศ.','ผศ.','อ.');
	$cf_comitte = array('','ประธาน','กรรมการ');
	$cf_sourcetype = array('','วิจัยสถาบัน','วิจัยภายใน','วิจัยภายนอก');
	$cf_userwrite = array('','ตำรา','หนังสือ','เอกสารคำสอน','เอกสารการสอน');
	$cf_userlevel = array('','ADMIN','MANAGER','USER');
	$cf_country = array('','ไทย','ลาว','พม่า');
	$cf_staus=array('','บันทึกใหม่','ดำเนินการ','เสร็จสิ้น');
?>