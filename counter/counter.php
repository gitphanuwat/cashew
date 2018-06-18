<?php

require_once(dirname(__FILE__) . '/config.php');

function do_counter_hit($counter_id) {

	//if(!is_valid_counter_id($counter_id)) {
		//die('An invalid counter ID was specified');
	//}

	$total_hits = get_counter_total_hits($counter_id);
	if(!is_counter_hit_duplicate($counter_id)) {
		$total_hits++;
		save_counter_hit($counter_id, $total_hits);
	}
}


function is_counter_hit_duplicate($counter_id) {

 	global $COUNTER_USE_COOKIES;
 	$cookie_name = 'HIT_COUNTER_' . $counter_id;
 	if($COUNTER_USE_COOKIES === TRUE && isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == 'TRUE') {
		return TRUE;
 	}

	return FALSE;
}


function get_counter_total_hits($counter_id) {
	$host="localhost";
	$hostuser="root";
	$hostpass="admin@URU@1";
	$database="cashew";

	$today = date("Y-m-d");

	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");

	$sql="select total from counter where `DATE` ='$today' ";
	$result=mysql_db_query($database,$sql);
	$nRow=mysql_num_rows($result);
	if($nRow==0){
		return 0;
	}else{
		$row=mysql_fetch_array($result);
		$total_hits=$row[0];
		return intval($total_hits);
	}

}

function save_counter_hit($counter_id, $new_total_hits) {

	$host="localhost";
	$hostuser="root";
	$hostpass="admin@URU@1";
	$database="cashew";

	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");

	$today = date("Y-m-d");
	$sql="select * from counter where `DATE` ='$today' ";
	$result=mysql_db_query($database,$sql);
	$nRow=mysql_num_rows($result);
	if($nRow==0){
		$sql="insert into counter(`DATE` , total) ";
		$sql=$sql . " values('$today' , 1)";
	}else{
		$sql="update counter set total=$new_total_hits ";
		$sql=$sql . " where `DATE` ='$today' ";
	}
	$result1=mysql_db_query($database,$sql);

 	// Set a cookie to prevent user from counting again during this session
 	global $COUNTER_USE_COOKIES;
 	if($COUNTER_USE_COOKIES === TRUE) {
 		$cookie_name = 'HIT_COUNTER_' . $counter_id;
 		setcookie($cookie_name, 'TRUE', time() + 1080);
 	}
}



function is_valid_counter_id($counter_id) {
	global $VALID_COUNTER_IDS;
	return (
		!empty($counter_id) &&
		preg_match('/^[a-zA-Z0-9]+$/D', $counter_id) === 1 &&
		strlen($counter_id) <= 40 &&
		in_array($counter_id, $VALID_COUNTER_IDS, TRUE)
	);
}

?>
