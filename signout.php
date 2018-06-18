<?php
	session_start();
	
	unset($_SESSION["IASU_USER_ID"]);
	unset($_SESSION["IASU_USER_STATE"]);

	session_destroy(); 
	echo "<script language=\"javascript\">window.location.href = 'index.php'</script>";
?>
