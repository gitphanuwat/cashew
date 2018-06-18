<?php
//	$servername = "localhost";
//	$username = "root";
//	$password = "";
	$servername = "http://202.29.52.231/";
	$username = "nsp";
	$password = "nsp@uru";
//	$db = "Scipark";
    $db = "nsp-center";
	// Create connection
	$conn = new mysql("$servername", "$username", "$password","$db");
	mysql_set_charset($conn,"utf8");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected successfully";

	// echo "string";
	// $sql = "SELECT bannernews FROM news";
 //    $result = mysql_query($conn, $sql);
 //    if (mysql_num_rows($result) > 0) {
 //    	while($row = mysql_fetch_array($result)) {
 //    		echo $row['bannernews'];
 //    	}
 //    }
 //    echo "string";


	
	
?>