<?php
include_once 'header.php';
if(isset($_SESSION["roleAs"])){
    if($_SESSION["roleAs"] !== 1 ){
        header("location: ../testsite/index.php");
    }
}
else {
	header("location: ../testsite/index.php");
}

?>
<style>
.heading{
	color: #fff;
	font-size: 40px;
	text-align: center;
	padding: 10px;
	margin-top:14%;
}
.container{
		display: grid;
		grid-template-columns: 2fr 1fr;
		gap: 15px;
		align-items: flex-start;
		padding: 5px 5%;
		height: 100%;
		width:95%;
		background:transparent;
}
.container .main-video{
	background: transparent;
	border-radius: 5px;
	padding: 10px;
}
.container .main-video video{
	width: 100%;
	border-radius: 5px;
	border-style: solid;
	border-width: 4px;
	border-color:black;
	background: black;
}
.container .main-video .title{
	color: #fff;
	font-size: 23px;
	padding-top: 15px;
	padding-bottom: 15px;
}
.container .video-list{
	background:transparent;
	border-radius: 5px;
	height: 520px;
	overflow-y: scroll ;
	border-style: solid;
	border-left: 2px black;
}
.container .video-list::-webkit-scrollbar{
	width: 7px;
}
.container .video-list::-webkit-scrollbar-track{
	background: #ccc;
	border-radius: 50px;
}
.container .video-list::-webkit-scrollbar-thumb{
	background: #666;
	border-radius: 50px;
}
.container .video-list .vid video{
	width: 100px;
	border-radius: 5px;
	border: transparent;
	border-width: 0px;
	height:auto;
}
.container .video-list .vid{
	display: flex;
	align-items: center;
	gap:15px;
	background:transparent;
	border-radius:5px;
	margin:10px;
	padding:10px;
	border:1px solid rgba(0,0,0,.1);
	cursor: pointer;
}
.container .video-list .vid:hover{
	background: black;
}
.container .video-list .vid.active{
	background: black;
}
.container .video-list .vid .title{
	font-size:17px;
	margin-bottom:35px;
}
@media (max-width:991px){
	.container{
		grid-template-columns: 1.5fr 1fr;
		padding: 10px;
	}
}
@media (max-width:768px){
	.container{
		grid-template-columns: 1fr;
	}
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
			<video src="resources/img/AIMTRAINING.mp4"controls muted autoplay></video>
			<h3 src= ""class="title">Aim Training</h3>
		</div>
	</div>
	<div class="video-list">
		<div class="vid active">
			<video src="resources/img/AIMTRAINING.mp4"  paused></video>
			<h3 class="title">Aim Training</h3> 
		</div>
		<div class="vid">
			<video src="resources/img/SandSmokes.mp4" paused></video>
			<h3 class="title">Smoke-uri Sand</h3> 
		</div>
		<div class="vid">
			<video src="resources/img/RustSmokes.mp4" paused></video>
			<h3 class="title">Smoke-uri Rust</h3> 
		</div>
		<div class="vid">
			<video src="resources/img/ProvinceSmokes.mp4"  paused></video>
			<h3 class="title">Smoke-uri Province</h3> 
		</div>
		<div class="vid">
			<video src="resources/img/video2.mp4" paused></video>
			<h3 class="title">video</h3> 
		</div>
	</div>
 </div>
	</div>
</section>
<script>
	let listVideo = document.querySelectorAll('.video-list .vid');
	let mainVideo = document.querySelector('.main-video video');
	let title     = document.querySelector('.main-video .title');
	listVideo.forEach(video =>{
		video.onclick = () =>{
			listVideo.forEach(vid => vid.classList.remove('active'));
			video.classList.add('active');
			if(video.classList.contains('active')){
				let src = video.children[0].getAttribute('src');
				mainVideo.src = src;
				let text = video.children[1].innerHTML;
				title.innerHTML = text;
			};
		};
	});
</script>
<?php
include_once 'footer.php';
?>