	window.addEventListener("scroll" , function(){
			var header = document.querySelector("header");
			header.classList.toggle("sticky" , window.scrollY > 0)
		});
function buttonOneClick() {
  let i = 0;
  while (i < 1000) {
    console.log('index is ', i);
    i++;
  }
}

function buttonTwoClick() {
  console.log('button two clicked');
}
const button = document.getElementById(".btn");
button.addEventListener("click",()=>{
	document.getElementById("checkbox").checked=false;
})