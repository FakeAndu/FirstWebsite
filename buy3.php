<?php
include_once 'header.php';
if(isset($_SESSION["roleAs"])){
	if($_SESSION["roleAs"]!==1){
	header("location: ../testsite/index.php");
	}
}
else {
	header("location: ../testsite/index.php");
}
?>
<STYLE>
.about-section{
    height:1600px;
}
.about-heading{
    margin-top:25%;
}
</STYLE>

<section class="about-section" id="about">
	<div class="row" data-aos="fade-up"
     data-aos-duration="3000">
			<center><div class="about-box about-box-2 js--about-box">
				<h2 style="margin-bottom:3%;margin-top:30%;"class="about-heading">Plateste cursul!</h2>
        <?php 
        if(isset($_SESSION["usersId"])){
          $_POST["usersId"] = $_SESSION["usersId"];
        }
          else
          header('location: ../testsite/index.php')?>
				<h3>pentru a beneficia de o crestere exponentiala a rank-ului</h3>
			</div>
			<div class=" about-box about-box-3 js--about-box">
            <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
			</div></center>
	</div>
</section>
  <script src="https://www.paypal.com/sdk/js?client-id=AeuhtGe7HZLnzTuGTE01sjS9TGYNPQyIxcS4sgYYc-YDpGDjkT8HAbA_N7qMiSeMYKeMRaxNjlOlprwo&currency=EUR" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
        },
        createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '0.10'
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
    var roleAs = 2; 
     var user_id;       
    $.ajax({
      url: 'includes/update_role2.php',
      method: 'POST',
      data: { user_id: '$_SESSION["usersId"]', roleAs:roleAs },
      success: function(response) {
        console.log(response);
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
        });
    }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
<?php
include_once 'footer.php';
?>
