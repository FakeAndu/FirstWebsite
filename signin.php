<?php
include_once 'header.php';
if(isset($_SESSION["roleAs"])){
        header("location: ../testsite/index.php");
    }
?>

<section class="contact-section-2" id="contacts">
	<div class="row"data-aos="fade-up"
     data-aos-duration="800">
		<h2 class="contact-heading-2"></h2>
	</div>
	<div class="row"data-aos="fade-up"
     data-aos-duration="800">
	 <h2 class="about-heading">Intra in cont</h2>
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
		<form method="post" action="includes/login.inc.php" class="contact-form">
			
					<input type="text" name="uid" id="name" placeholder="Full Name/Email...">&nbsp;
				
					<input type="password" name="pwd" id="pwd" placeholder="password...">&nbsp;
					
                    <center>
					<input type="submit" style="font-size:20px;margin-bottom:20%;" class="submit"name="submit" value="Log In" style="--clr:#4fc3dc">
					&nbsp;
					<div class="row">
						<div class="col span_1_of_2">
						<p style="font-size:15px;color:gray;margin-bottom:10%;"class="about-heading">&nbsp;Daca ati uitat parola , apasati aici</p><a href="forgotpassword.php" style="--clr:#ff2d75;padding: 5px 10px;" class="read-more"><span>Reset</span><i></i></a>
						</div>
						<div class="col span_1_of_2">
						<p style="font-size:15px;color:gray;margin-bottom:10%;"class="about-heading">&nbsp;Daca nu aveti cont , apasati aici</p><a href="signup.php" style="--clr:#ff2d75;padding: 5px 10px;" class="read-more"><span>Sign Up</span><i></i></a>
						</div>
					</div>
					</center>
			</div>
		</form>
	</div>
</section>
<?php
include_once 'footer.php';
?>