<?php
include_once 'header.php';
if(isset($_SESSION["roleAs"])){
	header("location: ../testsite/index.php");
}
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

$error = array();
require 'mail.php';

if (!$conn){
    die("Connection failed" . mysqli_connect_error());
}
if(isset($_SESSION["roleAs"])){
        header("location: ../testsite/index.php");
    }

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}
	if(count($_POST) > 0){
		switch ($mode) {
			case 'enter_email':
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}
				else if(checkEmail($conn ,$email) !== true){
					$error[] = "That email was not found";
				}
				else{
					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("location: ../testsite/forgotpassword.php?mode=enter_code");
					die;
				}
				break;
			case 'enter_code':
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct" ){
						$_SESSION['forgot']['code'] = $code;
						header("location: ../testsite/forgotpassword.php?mode=enter_password");
						die;
				}	
				else{
						$error[] = $result;
				}
				break;
			case 'enter_password':
				$password = $_POST['pwd'];
				$password2 = $_POST['pwdRepeat'];

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) && isset($_SESSION['forgot']['code'])){
					header("location: ../testsite/forgotpassword.php");
					die;
				}
				else{
					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}
					header("location: ../testsite/signin.php");
					die;
				}
				break;

			default:
				break;
		}
	}

	function send_email($email){
		global $conn;
		$expire = time() + (60 * 3);
		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "INSERT INTO codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($conn,$query);

		//send email here for website hosted
		send_mail($recipient,'Password Reset',"Your code is " . $code);
	}

	function save_password($password){
		global $conn;
		$password = password_hash($password, PASSWORD_DEFAULT);
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "UPDATE users SET usersPwd = '$password' where usersEmail = '$email' limit 1";
		mysqli_query($conn,$query);

	}


	function is_code_correct($code){
		global $conn;
		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "SELECT * FROM codes WHERE code = '$code' && email = '$email' ORDER BY id DESC limit 1";
		$result = mysqli_query($conn,$query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){
					return "the code is correct";
				}
				else{
					return "the code is expired";
				}
			}
			else{
				return "the code is incorrect";
			}
		}
		return "the code is incorrect";
	}

	function checkEmail($conn ,$email){
		$emailExists = emailExists($conn ,$email);
		if($emailExists === false){
		header("location: ../testsite/forgotpassword.php?error=wronglogin");
		exit();	
		}
		$checkEmail = true;
		if($checkEmail === false){
		header("location: ../testsite/forgotpassword.php?error=wronglogin");
		exit();	
		}
		else if($checkEmail === true){
			return true;
		}
	}
	function emailExists($conn ,$email){
		$sql = "SELECT * FROM users WHERE  usersEmail = ?;";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt , $sql)){
				header("location:../forgotpassword.php?error=stmtfailed");
				exit();
			}
		
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		
		$resultData = mysqli_stmt_get_result($stmt);
	
		if($row = mysqli_fetch_assoc($resultData)){
			return $row;
		}
		else{
			$result=false;
			return $result;
		}
		mysqli_stmt_close($stmt);
	}
	  
?>
<section class="contact-section-2" id="contacts">
	<div class="row"data-aos="fade-up"
     data-aos-duration="800">
		<h2 class="contact-heading-2"></h2>
	</div>
	<div class="row"data-aos="fade-up"
     data-aos-duration="800">
	
<?php
if(isset($_GET["error"])){
	if($_GET["error"]=="emptyinput"){
		echo "<p>Fill in all fields!</p>&nbsp;&nbsp;&nbsp;";
	}
	else if($_GET["error"]=="wronglogin"){
	echo "<p>Username or password wrong!</p>&nbsp;&nbsp;&nbsp;";
	}
}
?>
<?php
switch ($mode) {
	case 'enter_email':
?>
		 <h2 class="about-heading">Introdu email-ul pentru verificare</h2>
		 <?php
		 	foreach($error as $err){
				echo $err;
			}
		 ?>
		<form method="post" action="forgotpassword.php?mode=enter_email" class="contact-form">
		<input type="email" name="email" placeholder="Email...">&nbsp;
		<center>
		<input type="submit" style="font-size:20px;margin-bottom:20%;" class="submit"name="submit" value="Check" style="--clr:#4fc3dc">
		&nbsp;
		<p style="font-size:15px;color:gray;margin-bottom:3%;"class="about-heading">&nbsp;Daca nu aveti cont , apasati aici</p><a href="signup.php" style="--clr:#ff2d75" class="read-more"><span>Sign Up</span><i></i></a>
		</center>
		</div>
		</form>
<?php
		break;
	case 'enter_code':
?>
		 <h2 class="about-heading">Introdu codul trimis pe email</h2>
		 <?php
		 	foreach($error as $err){
				echo $err;
			}
		 ?>
		<form method="post" action="forgotpassword.php?mode=enter_code" class="contact-form">
		<input class="textbox" type="text" name="code" placeholder="12345...">&nbsp;
		<center>
		<input type="submit" style="font-size:20px;margin-bottom:10%;" class="submit"name="submit" value="Next" style="--clr:#4fc3dc">
		<br>
		<a href="forgotpassword.php" style="font-size:20px;" style="--clr:#ff2d75" class="read-more"><span>Incearca din nou!</span><i></i></a>
		<p style="font-size:15px;color:gray;margin-top:10%;margin-bottom:3%;"class="about-heading">&nbsp;Daca nu aveti cont , apasati aici</p><a href="signup.php" style="--clr:#ff2d75" class="read-more"><span>Sign Up</span><i></i></a>
		</center>
		</div>
		</form>
<?php
		break;
	case 'enter_password':
?>
		<h2 class="about-heading">Introdu noua parola</h2>
		<?php
		 	foreach($error as $err){
				echo $err;
			}
		 ?>
		<form method="post" action="forgotpassword.php?mode=enter_password" class="contact-form">
		<input class="textbox" type="password" name="pwd" placeholder="password...">&nbsp;
		<input class="textbox" type="password" name="pwdRepeat" placeholder="repeat password...">&nbsp;
		<center>
		<input type="submit" style="font-size:20px;margin-bottom:10%;" class="submit"name="submit" value="Next" style="--clr:#4fc3dc">
		<br>
		<a href="forgotpassword.php" style="font-size:20px;" style="--clr:#ff2d75" class="read-more"><span>Incearca din nou!</span><i></i></a>
		<p style="font-size:15px;color:gray;margin-top:10%;margin-bottom:3%;"class="about-heading">&nbsp;Daca nu aveti cont , apasati aici</p><a href="signup.php" style="--clr:#ff2d75" class="read-more"><span>Sign Up</span><i></i></a>
		</center>
		</div>
		</form>
<?php
		break;
		
	default:
		break;
}
?>	
	
	</div>
</section>
<?php
include_once 'footer.php';
?>