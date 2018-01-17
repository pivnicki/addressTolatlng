function validateForm() { 
	// Getting user input
    var user_firstname = document.forms["usrForm"]["user_firstname"].value;
	var user_lastname = document.forms["usrForm"]["user_lastname"].value;
	var user_address = document.forms["usrForm"]["user_address"].value;
	var user_city = document.forms["usrForm"]["user_city"].value;
	var user_country = document.forms["usrForm"]["user_country"].value;
	
	//============FIRST NAME==============
	// if input is empty
    if (user_firstname == "") {
        document.getElementById('user_firstname').style.borderColor = "red";
        return false;
    }
	// if input length is less then 2
	if (user_firstname.length < 2) {
        document.getElementById('user_firstname').style.borderColor = "red";
        return false;
    }
	// if input is number
	if (/[\d]/.test(document.getElementById("user_firstname").value)) {
		document.getElementById('user_firstname').style.borderColor = "red";
        return false;
	}
	//============LASTNAME================
	// if input is empty
    if (user_lastname == "") {
        document.getElementById('user_lastname').style.borderColor = "red";
        return false;
    }
	// if input length is less then 2
	if (user_lastname.length < 2) {
        document.getElementById('user_lastname').style.borderColor = "red";
        return false;
    }
	// if input is number
	if (/[\d]/.test(document.getElementById("user_lastname").value)) {
		document.getElementById('user_lastname').style.borderColor = "red";
        return false;
	}
	//=============ADDRESS=================
	// if input is empty
    if (user_address == "") {
        document.getElementById('user_address').style.borderColor = "red";
        return false;
    }
	// if input length is less then 2
	if (user_address.length < 2) {
        document.getElementById('user_address').style.borderColor = "red";
        return false;
    }
	//=============CITY=================
	// if input is empty
    if (user_city == "") {
        document.getElementById('user_city').style.borderColor = "red";
        return false;
    }
	// if input length is less then 2
	if (user_city.length < 2) {
        document.getElementById('user_city').style.borderColor = "red";
        return false;
    }
	//=============CITY=================
	// if input is empty
    if (user_city == "") {
        document.getElementById('user_city').style.borderColor = "red";
        return false;
    }
	// if input length is less then 2
	if (user_city.length < 2) {
        document.getElementById('user_city').style.borderColor = "red";
        return false;
    }
	//=============COUNTRY=================
	// if input is empty
    if (user_country == "") {
        document.getElementById('user_country').style.borderColor = "red";
        return false;
    }
	// if input length is less then 2
	if (user_country.length < 2) {
        document.getElementById('user_country').style.borderColor = "red";
        return false;
    }
	 
}


 