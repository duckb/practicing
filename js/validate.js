function allLetter(fieldname,el) {   
	var letters = /^[A-Za-z]+$/;  
	elvalue = trim(el.value);
	if(elvalue.match(letters)) {  
		return true;  
	} else {  
		alert(fieldname+' accepts only alphabetical characters');  
		el.focus();  
		return false;  
	}  
}  


function trim(str) {
	return str.replace(/^\s+|\s+$/g,'');
}


function emptyMessageAlert(fieldname,fieldId) {
	alert(fieldname+" should not be empty");
	document.getElementById(fieldId).focus();
}

function ValidateEmail(el) {  
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
	
	elvalue = el.value;
	if(elvalue.match(mailformat)) {    
		return true;  
	} else {  
		alert("You have entered an invalid email address!");  
		el.focus();  
		return false;  
	}  
}

/* contactus form validation  starts here */
function validateAccount() {
var fname = document.getElementById('fname');
var lname = document.getElementById('lname');
var password = document.getElementById('password');
var rpassword = document.getElementById('rpassword');
var email = document.getElementById('email');
var address = document.getElementById('address');

	if('' == trim(fname.value)) {
		emptyMessageAlert('Firstname','pdate');
		return false;
	}
	if(!allLetter('Firstname',fname)) {
		return false;
	}
	if('' == trim(lname.value)) {
		emptyMessageAlert('Lastname','stime');
		return false;
	}
	if(!allLetter('Lastname',lname)) {
		return false;
	}
	if('' == trim(password.value)) {
		emptyMessageAlert('Password','password');
		return false;
	}
	if('' == trim(rpassword.value)) {
		emptyMessageAlert('Re-TypePassword','rpassword');
		return false;
	}
	if(password.value != rpassword.value) {
		alert('Re-TypePassword and Password should match');
		return false;
	}
	
	if('' == trim(email.value)) {
		emptyMessageAlert('Email','email');
		return false;
	}
	if(!ValidateEmail(email)) {
		return false;
	}
	if('' == trim(address.value)) {
		emptyMessageAlert('Address','adess');
		return false;
	}
	return true;
}
function validateLogin() {
	var username = document.getElementById('username');
	var password = document.getElementById('password');
	if('' == trim(username.value)) {
		emptyMessageAlert('Username','username');
		return false;
	}

	if(!ValidateEmail(username)) {
		return false;
	}
	if('' == trim(password.value)) {
		emptyMessageAlert('Password','password');
		return false;
	}
}
function confirmLogout() {
	if(confirm("You are already loged into system, you need to logout and then create account \n\r Press ok to logout and create account")) {
		window.location = "logout.php?flag=1";
	} else {
		window.reload;
	}
}