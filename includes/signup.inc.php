<?php

if(isset($_POST['submit'])){
   
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    
    function send_emailUser($email){
        require 'C:\xampp\htdocs\testsite\mail.php';
        global $conn;
        $email  = $_POST["email"];
        $username = $_POST['uid'];
        //send email here for website hosted
        send_mail($recipient,'Account Created',"Your username is :    " . $username);
        }
        

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location:../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username) !== false){
        header("location:../signup.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location:../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location:../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn, $username, $email) !== false){
        header("location:../signup.php?error=usernametaken");
        exit();
    }
    send_emailUser($email);
    createUser($conn, $name, $email, $username, $pwd);
    
}
else{
    header("location:../signup.php");
}