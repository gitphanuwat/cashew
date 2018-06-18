<?php
	session_start();
	include('config/config.php');
	
		
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	

	if($_GET["action"]=="insert_member"){
		$msgsuccess=0;
		$msgerror=0;

		$iduser=$_POST["iduser"];
		
		if($_POST["prefix"]!=4){
			$prefix=$_POST["prefix"];
		}else{
			$prefix=$_POST["txt_prefix"];
		}

			$firstname=$_POST["firstname"];
			$lastname=$_POST["lastname"];
			$address=$_POST["address"];
			$country=$_POST["country"];
			$mobile=$_POST["mobile"];
			$email=$_POST["email"];
			$bu_position=$_POST["bu_position"];
			$username=$_POST["username"];
			$password=$_POST["password"];
			$idlevel=$_POST["idlevel"];
			$permit=$_POST["permit"];
		if($prefix=="" ){
			$msgerror=1;
		}else{
			
				$sql="INSERT INTO tbuser( `prefix` ";
				$sql=$sql . ", `firstname`, `lastname`, `address`, `country` ";
				$sql=$sql . ", `mobile`, `email`, `bu_position`, `username`, `password`, `idlevel`, `permit`)";
				$sql=$sql . " VALUES ('$prefix' ";
				$sql=$sql . " , '$firstname', '$lastname', '$address', '$country' ";
				$sql=$sql . " , '$mobile', '$email', '$bu_position', '$username', '$password', '$idlevel', '$permit');";

			$result=mysql_db_query($database,$sql);
			$msgsuccess=1;
		}
	}


	mysql_close();
	
?>

<script language="javascript">
window.location.href = 'login.php?action=ok'
</script>