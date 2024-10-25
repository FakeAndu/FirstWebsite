<?php
include_once 'header.php';
if(isset($_SESSION["roleAs"])){
    if($_SESSION["roleAs"] !== 2 ){
        header("location: ../testsite/index.php");
    }
}
else {
	header("location: ../testsite/index.php");
}

?>
<style>
.heading{
	color: #444;
	font-size: 40px;
	text-align: center;
	padding: 10px;
}
.container{
		display: grid;
		grid-template-columns: 2fr 1fr;
		gap: 15px;
		align-items: flex-start;
		padding: 5px 5%;
		height: 100%;
		width:100%;
}
.container .main-video{
	background: gray;
	border-radius: 5px;
	padding: 10px;
}
.container .main-video video{
	width: 100%;
	border-radius: 5px;
	border: transparent;
	border-width: 0px;
}
.container .main-video .title{
	color: #333;
	font-size: 23px;
	padding-top: 15px;
	padding-bottom: 15px;
}
.container .video-list{
	background: gray;
	border-radius: 5px;
	height: 520px;
	overflow-y: scroll ;
}
.container .video-list::-webkit-scrollbar{
	width: 7px;
}
.container .video-list::-webkit-scrollbar-track{
	background: gray;
	border-radius: 50px;
}
.container .video-list .vid video{
	width: 90%;
	border-radius: 5px;
	border: transparent;
	border-width: 0px;
}
</style>
<section class="servicii clearfix">
	<div class="row" data-aos="fade-up"
     data-aos-duration="3000">
	 <h3 class="heading">
		Video Gallery
	</h3>
 <div class="container">
 	<div class="main-video">
		<div class="video">
			<video src="resources/img/video1.mp4" controls muted autoplay></video>
			<h3 class="title">h1. Video title</h3>
		</div>
	</div>
	<div class="video-list">
		<div class="vid">
			<video src="resources/img/video1.mp4" controls muted autoplay></video>
			<h3 class="title">h1. Video title</h3> 
		</div>
		<div class="vid">
			<video src="resources/img/video1.mp4" controls muted autoplay></video>
			<h3 class="title">h1. Video title</h3> 
		</div>
		<div class="vid">
			<video src="resources/img/video1.mp4" controls muted autoplay></video>
			<h3 class="title">h1. Video title</h3> 
		</div>
		<div class="vid">
			<video src="resources/img/video1.mp4" controls muted autoplay></video>
			<h3 class="title">h1. Video title</h3> 
		</div>
		<div class="vid">
			<video src="resources/img/video1.mp4" controls muted autoplay></video>
			<h3 class="title">h1. Video title</h3> 
		</div>
	</div>
 </div>
	</div>
</section>
<?php
include_once 'footer.php';
?>