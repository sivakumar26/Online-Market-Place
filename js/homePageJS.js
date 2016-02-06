// JavaScript Document

function validatePassword(){
	var password1=document.getElementById('password').value;
	var password2=document.getElementById('rePassword').value;
	if(password1!=password2){
	document.getElementById('rePassword').value="";
	document.getElementById('passwordErrorMessage').innerHTML="The passwords do not match, please type again ?";
	}
	else
	{document.getElementById('passwordErrorMessage').innerHTML="";
	}
}
function validateSignUp(){

	var fname=document.getElementById('fname').value;
	var lname=document.getElementById('lname').value;
	var email=document.getElementById('email').value;
	var password=document.getElementById('password').value;
	$.ajax({
		type: "POST",
		url: "checkEmail.php",
		data: { fname: fname, lname: lname, emailId: email, password1: password },
		dataType:"html",
		success:function (data) {
			if(data=="true"){
				document.getElementById('emailErrorMessage').innerHTML="The email id is already registered to another user. Please try another.";
				return false;
			}
			else if(document.getElementById('passwordErrorMessage').textContent!=""|| document.getElementById('password').value!=document.getElementById('rePassword').value){	
				document.getElementById('passwordErrorMessage').innerHTML="The passwords do not match, please type again ?";
			}		
			else{
				document.signupForm.submit();
			}
		}
	});	
	return false;	
}
function validateLogin(){
	var email=document.getElementById('emaillogin').value;		
	var password=document.getElementById('passwordlogin').value;
        $.ajax({
		type: "POST",
		url: "checkLogin.php",
		 data: { email: email, password1: password} ,
		dataType:"html",
		success:function (data) {			
			if(data=="true"){
				document.loginForm.submit();
			}	
			else{				
				document.getElementById('loginErrorMessage').innerHTML="The login information provided is incorrect";
			}
		}
	});
	return false;
	
}