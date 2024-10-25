<?php
include ('dbh.inc.php');
require_once 'functions.inc.php';
if(isset($_POST["submit"])){
	$email = $_POST["email"];
	if(emptyInputEmail($email) !== false){
		header("location: ../forgotpassword.php?error=emptyinput");
		exit();
	}
    $email = $_POST["email"];
    checkEmail($conn ,$email);
}
else{
	header("location: ../forgotpassword.php");
	exit();
}