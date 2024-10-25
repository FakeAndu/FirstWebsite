<?php
include_once 'header.php';
if(isset($_SESSION["roleAs"])){
	if($_SESSION["roleAs"]!==0){
	header("location: ../testsite/index.php");
	}
}
else {
	header("location: ../testsite/index.php");
}
?>
<style>
    .packages-heading{
        margin-top:0;
    }
    .packages-section{
        height:70rem;
    }
    .packages-heading{
        margin-top:20%;
    }
</style>
<section class="packages-section"  id="packages">
	<div class="row ">
    <div class="reveal"data-aos="fade-up"
     data-aos-duration="800">
	<h2 class="packages-heading ">Priveste cele mai populare pachete ale noastre!</h2>
		<center>
		<div class="col span_1_of_2">
			<div class="package-box">
					<div>
					<h4 class="package-heading">Cursul complet</h4>
					<p class="package-price">&euro;20 <span>(folder cu cursuri)</span> </p>
					<p class="package-para"><br></br>Este cel mai complet curs si este foarte detaliat in toate ariile necesare climb-ului , si singurul in romana<br>
					</br></p>
				</div>
				<div>
					<ul>
							<li><i class="fa-solid fa-check small-icon"></i>Aim</li>
							<li><i class="fa-solid fa-check small-icon"></i>Movement</li>
							<li><i class="fa-solid fa-check small-icon"></i>Utility</li>
							<li><i class="fa-solid fa-check small-icon"></i>Config</li>
							<li><i class="fa-solid fa-x small-icon"></i>Personal trainer</li>				
					</ul>
				</div>	
				<div>
				<a href="buy.php" style="--clr:#4fc3dc" class="read-more"><span>Buy Now</span><i></i></a>
				</div>
			</div>
		</div>
		<div class="col span_1_of_2">
			<div class="package-box">
				<div>
					<h4 class="package-heading">Antrenor Personal</h4>
					<p class="package-price">&euro;100 <span>(folder cu cursuri)</span> </p>
					<p class="package-para pkg-para"><br></br>Este cel mai complet curs posibil , si ai accesul de a primi feedback de la vlad in orice moment pentru cea mai buna experienta<br></br></p>
				</div>
				<div>
					<ul>
							<li><i class="fa-solid fa-check small-icon"></i>Aim</li>
							<li><i class="fa-solid fa-check small-icon"></i>Movement</li>
							<li><i class="fa-solid fa-check small-icon"></i>Utility</li>
							<li><i class="fa-solid fa-check small-icon"></i>Config</li>
							<li><i class="fa-solid fa-check small-icon"></i>Personal Trainer</li>		
					</ul>
				</div>	
				<div>
				<a href="buy2.php" style="--clr:#4fc3dc" class="read-more"><span>Buy Now</span><i></i></a>
				</div>
			</div>
		</div>
	</center>
	</div>
</div>
</section>
<?php
include_once 'footer.php';
?>