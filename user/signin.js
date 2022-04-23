
let email = document.getElementById('email');
let pass = document.getElementById('pass');
let signinBtn = document.getElementById('signinBtn');



let acc;

let getData = new XMLHttpRequest();
getData.onload = function() {
	acc = this.responseText;
	console.log(acc);
};

getData.open("get","signinAuth.php?e="+ email.value, true);
getData.send();

function checkData(){
	alert('testing');
}



signinBtn.addEventListener('click', checkData);