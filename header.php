<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0 , viewport-fit=cover" >
	<meta name="theme-color" content="#1D1D1D">
	<title>Vlad So2 - Trainer-ul tau favorit de standoff 2</title>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="vendors/css/fluid.css">
	<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="resources/css/style.css">
	<link rel="stylesheet" type="text/css" href="resources/css/media-query.css">
	<script src="https://kit.fontawesome.com/246688c430.js" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/favicon/favicon-16x16.png">
	<link rel="manifest" href="vendors/favicon/site.webmanifest">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



</head>
<body>
<div class="front-page">
<header>
	<div class="navigatie">
		<nav>
			
			<input type="checkbox" id="check">
			<label for="check" class="checkbtn"><i class="fas fa-bars bars"></i></label>
			<img src="resources/img/logo1.png" alt="VL4D Academy Logo" class="logo">
			<ul>
				<li><a href="index.php"  onclick="buttonTwoClick()" class="btn , btn-home" style="--clr:#ff2d75" ><span>Home</span><i></i></a></li> 
				<?php
					if(isset($_SESSION["usersId"])){
						if($_SESSION["roleAs"] == 0){
						echo "<li><a href='courses.php' class='btn btn-about' style='--clr:#ff2d75'><span>Buy Course</span><i></i></a></li>";
						echo "<li><a href='index.php#contacts' class='btn btn-contacts' style='--clr:#4fc3dc'><span>Contacts</span><i></i></a></li>";
						echo "<li><a href='includes/logout.inc.php' class='btn btn-about' style='--clr:#ff2d75'><span>LogOut</span><i></i></a></li>";
							}	
						else if($_SESSION["roleAs"] == 1){
						echo "<li><a href='course.php' class='btn btn-about' style='--clr:#ff2d75'><span>Courses</span><i></i></a></li>";
						echo "<li><a href='buy3.php' class='btn btn-contacts' style='--clr:#4fc3dc'><span>Upgrade</span><i></i></a></li>";
						echo "<li><a href='includes/logout.inc.php' class='btn btn-about' style='--clr:#ff2d75'><span>LogOut</span><i></i></a></li>";
							}	
						else if($_SESSION["roleAs"] == 2){
						echo "<li><a href='megacourse.php' class='btn btn-about' style='--clr:#ff2d75'><span>mega course</span><i></i></a></li>";
						echo "<li><a href='index.php#contacts' class='btn btn-contacts' style='--clr:#4fc3dc'><span>Contacts</span><i></i></a></li>";
						echo "<li><a href='includes/logout.inc.php' class='btn btn-about' style='--clr:#ff2d75'><span>LogOut</span><i></i></a></li>";
							}	
					}
					else{
						echo "<li><a href='index.php#about' class='btn btn-about' style='--clr:#ff2d75'><span>About</span><i></i></a></li>";
						echo "<li><a href='signin.php' class='btn btn-about' style='--clr:#ff2d75'><span>Log In</span><i></i></a></li>";
					}
				?>
			</ul>
		</nav>
	</div>
</header>