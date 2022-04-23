

let otpTextBox = document.getElementById("otp");
let woc = document.getElementById("woc");
let coc = document.getElementById("coc");
var otpVal = [];

var codeReq = new XMLHttpRequest();

codeReq.onload = function(){
	otpVal[0] = this.responseText;
	console.log(otpVal[0]);
};

codeReq.open("get", "test.php", true);
codeReq.send();

function checkOtp(){	
	console.log(otpTextBox.value.length + ": " + otpTextBox.value + " OTP CODE IN JS: " + otpVal[0]);	

	if(otpTextBox.value.length >= 1){
		if(otpTextBox.value == otpVal){
			matched();
			console.log(otpTextBox.value.length + ": " + otpTextBox.value + " OTP CODE IN JS: " + otpVal[0]);
		}else{
			wrongOtp();
			console.log(otpTextBox.value.length + ": " + otpTextBox.value + " OTP CODE IN JS: " + otpVal[0]);
		}
	}
}

function wrongOtp(){
	woc.style.display = "block";
	coc.style.display = "none";
}

function matched(){
	woc.style.display = "none";
	coc.style.display = "block";
}

otpTextBox.addEventListener('keydown', checkOtp);
otpTextBox.addEventListener('keyup', checkOtp);