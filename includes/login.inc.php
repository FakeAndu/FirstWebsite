<?php

if(isset($_POST["submit"])){
	
	
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if(emptyInputLogin($username, $pwd) !== false){
		header("location: ../signin.php?error=emptyinput");
		exit();
	}
	

	loginUser($conn, $username, $pwd);
}
else{
	header("location: ../signin.php");
	exit();
}
