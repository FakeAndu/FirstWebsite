<?php
include_once 'header.php';
if(isset($_SESSION["roleAs"])){
	header("location: ../testsite/index.php");
}
?>

<section class="contact-section-2" id="contacts">
	<div class="row"data-aos="fade-up"
     data-aos-duration="800">
		<h2 class="contact-heading-2">Inregistreaza-te</h2>
		<?php
	if(isset($_GET["error"])){
		if($_GET["error"]=="emptyinput"){
			echo"<p>Fill in all fields!</p>&nbsp;&nbsp;&nbsp;";
		}
	else if($_GET["error"]=="invaliduid"){
		echo "<p>Choose a proper username!</p>&nbsp;&nbsp;&nbsp;";
		}
	else if($_GET["error"]=="invalidemail"){
		echo "<p>Choose a proper email!</p>&nbsp;&nbsp;&nbsp;";
		}
	else if($_GET["error"]=="passwordsdontmatch"){
		echo "<p>Passwords doesn't match!</p>&nbsp;&nbsp;&nbsp;";
		}
	else if($_GET["error"]=="stmtfailed"){
		echo "<p>Something went wrong , try again!</p>&nbsp;&nbsp;&nbsp;";
		}
	else if($_GET["error"]=="usernametaken"){
		echo "<p>Username or Email already taken!</p>&nbsp;&nbsp;&nbsp;";
		}
	else if($_GET["error"]=="none"){
		echo "<p>You have signed up!</p>&nbsp;&nbsp;&nbsp;";
		}
	}
?>
	</div>
	<div class="row"data-aos="fade-up"
     data-aos-duration="800">
		<form  action="includes/signup.inc.php" class="contact-form"method="post">
			
					<input type="text" name="name"  placeholder="Full Name...">&nbsp;
				
					<input type="email" name="email" placeholder="Email...">&nbsp;
				
					<input type="text" name="uid" placeholder="Username...">&nbsp;
				
					<input type="password" name="pwd" placeholder="Password...">&nbsp;

                    <input type="password" name="pwdRepeat" placeholder="Repeat Password...">&nbsp;
					
                    <center><input type="submit"name="submit" class="submit" value="Sign Up!" style="--clr:#4fc3dc"></center>  
			</div>
		</form>
	</div>

</section>


<?php
include_once 'footer.php';
?>