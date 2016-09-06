function isEmpty(string)
{
	/// <summary>Trims given string and determines whether it is empty.</summary>
	/// <param name="string">The string.</param>
	/// <returns type="Boolean">Returns true if string is empty, false otherwise.</returns>
	return string.trim() === "";
}

function isZero(string)
{
	
	return string.trim() === "0";
}

function areEquivalent(value1, value2)
{
	/// <summary>Determines whether two given values are strictly equivalent.</summary>
	/// <param name="value1">First value.</param>
	/// <param name="value2">Second value.</param>
	/// <returns type="Boolean">Returns true if values are equivalent, false otherwise.</returns>
	
	return value1 === value2;
}

function isPhoneValid(phone)
{
    var result = false;
	if(phone.length==10)
	{
	    result = true
	}
	return result;
}

function isChecked(inputSet)
{
	/// <summary>Determines whether at least one element in input set is checked.</summary>
	/// <param name="inputSet">The input set.</param>
	/// <returns type="Boolean">Returns true if at least one element is checked, false otherwise.</returns>
	
	var result = false;
	
	for(var i = 0; i < inputSet.length; i++)
		if(inputSet[i].checked === true)
		{
			result = true;
			break;
		}
	
	return result;
}

function isEmailValid(email)
{
	/// <summary>Determines whether given email address is valid.</summary>
	/// <param name="email">The email address.</param>
	/// <returns type="Boolean">Returns true if email is valid, false otherwise.</returns
	
	var emailRegularExpression = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.(\w{2}|(com))$/;
	var result = true;
	
	if(emailRegularExpression.test(email) === false) result = false;
	
	return result;
}

function isPostalCodeValid(postalCode)
{

	
	var postalCodeRegularExpression = /^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i;
	var result = true;
	
	if(postalCodeRegularExpression.test(postalCode) === false) result = false;
	
	return result;
}

function isLoginFormValid()
{
    var errors = new Array();
    var errorMessage = "Please correctly provide the following information.\n";
    
    var temp = document.getElementById('error');
    
    var userlogin = document.getElementById("userlogin");
    var passwordlogin = document.getElementById("passwordlogin");
    
    if(isEmpty(userlogin.value) === true) errors.push("User Name");
    if(isEmpty(passwordlogin.value) === true) errors.push("Password");
    
    if(errors.length !== 0)
    {
            for(var i = 0; i < errors.length; i++) errorMessage += "\n - " + errors[i];
            var temp = document.getElementById('error');
            temp.innerHTML = errorMessage;
           //             alert(errorMessage);
            return false;
    }
    else
    {
        temp.innerHTML = "";
        return true;
    }
}

function isRegistrationFormValid()
{
        /// <summary>Determines whether the input into the local Web form is valid.</summary>
        /// <returns type="Boolean">Returns true if input is valid, false otherwise.</returns>
    var errors = new Array();
    var errorMessage = "Please correctly provide the following information.\n";
    
    var temp = document.getElementById('error');
    
    var fullname = document.getElementById("fullname");
    var username = document.getElementById("username");
    var mail = document.getElementById("mail");
    var phone = document.getElementById("phone");
    var pass = document.getElementById("pass");
    var company = document.getElementById("company");
    var address = document.getElementById("address");
    var city = document.getElementById("city");
    var postalcode = document.getElementById("postalcode");
    var description = document.getElementById("description");
    var confirm = document.getElementById("confirm");
    
    
  
    
    if(isEmpty(fullname.value) === true) errors.push("Fullname");
    if(isEmpty(username.value) === true) errors.push("User Name");
    if(isEmpty(mail.value) === true || isEmailValid(mail.value) === false) errors.push("Email");
    if(isEmpty(phone.value) === true || isPhoneValid(phone.value) === false) errors.push("Telephone Number");
    if(isEmpty(pass.value) === true ) errors.push("Password");
    if(isEmpty(company.value) === true) errors.push("Company");
    if(isEmpty(address.value) === true) errors.push("Address");
    if(isEmpty(city.value) === true) errors.push("City");
    if(isEmpty(postalcode.value) === true || isPostalCodeValid(postalcode.value) === false) errors.push("Postal Code");
    if(isEmpty(description.value) === true) errors.push("Description");
    if(areEquivalent(pass.value, confirm.value) === false) errors.push("Confirm Password");
    

    if(errors.length !== 0)
    {
            for(var i = 0; i < errors.length; i++) errorMessage += "\n - " + errors[i];
            var temp = document.getElementById('error');
            temp.innerHTML = errorMessage;
           //             alert(errorMessage);
            return false;
    }
    else
    {
        temp.innerHTML = "";
        return true;
    }
     
}

function isEditFormValid()
{
        /// <summary>Determines whether the input into the local Web form is valid.</summary>
        /// <returns type="Boolean">Returns true if input is valid, false otherwise.</returns>
    var errors = new Array();
    var errorMessage = "Please correctly provide the following information.\n";
    
    var temp = document.getElementById('error');
    
    var fullname = document.getElementById("fullname");
    var username = document.getElementById("username");
    var mail = document.getElementById("mail");
    var phone = document.getElementById("phone");
    var company = document.getElementById("company");
    var address = document.getElementById("address");
    var city = document.getElementById("city");
    var postalcode = document.getElementById("postalcode");
    var description = document.getElementById("description");
  
    
    if(isEmpty(fullname.value) === true) errors.push("Forename");
    if(isEmpty(username.value) === true) errors.push("User Name");
    if(isEmpty(mail.value) === true || isEmailValid(mail.value) === false) errors.push("Email");
    if(isEmpty(phone.value) === true || isPhoneValid(phone.value) === false) errors.push("Telephone Number");
    if(isEmpty(company.value) === true) errors.push("Company");
    if(isEmpty(address.value) === true) errors.push("Address");
    if(isEmpty(city.value) === true) errors.push("City");
    if(isEmpty(postalcode.value) === true) errors.push("Postal Code");
    if(isEmpty(description.value) === true) errors.push("Description");

    if(errors.length !== 0)
    {
            for(var i = 0; i < errors.length; i++) errorMessage += "\n - " + errors[i];
            var temp = document.getElementById('error');
            temp.innerHTML = errorMessage;
           //             alert(errorMessage);
            return false;
    }
    else
    {
        temp.innerHTML = "";
        return true;
    }
     
}

function isChangeFormValid()
{
        /// <summary>Determines whether the input into the local Web form is valid.</summary>
        /// <returns type="Boolean">Returns true if input is valid, false otherwise.</returns>
    var errors = new Array();
    var errorMessage = "Please correctly provide the following information.\n";
    
    var temp = document.getElementById('error');
    
    var oldpass = document.getElementById("oldpass");
    var pass = document.getElementById("pass");
    var confirm = document.getElementById("confirm");
  

    if(isEmpty(oldpass.value) === true ) errors.push("Old Password");
    if(isEmpty(pass.value) === true ) errors.push("New Password");
    if(areEquivalent(pass.value, confirm.value) === false) errors.push("Confirm Password");

    if(errors.length !== 0)
    {
            for(var i = 0; i < errors.length; i++) errorMessage += "\n - " + errors[i];
            var temp = document.getElementById('error');
            temp.innerHTML = errorMessage;
           //             alert(errorMessage);
            return false;
    }
    else
    {
        temp.innerHTML = "";
        return true;
    }
     
}


function addFoodisValid()
{
    var errors = new Array();
    var errorMessage = "Please correctly provide the following information.\n";
    
    var temp = document.getElementById('error');
    
    var food = document.getElementById("food");
    var price = document.getElementById("price");
    var ingredients = document.getElementById("ingredients");
    var description = document.getElementById("description");
    var dtime = document.getElementById("dtime");
  

    if(isEmpty(food.value) === true ) errors.push("Food Name");
    if(isEmpty(price.value) === true ) errors.push("Price");
    if(isEmpty(ingredients.value) === true ) errors.push("Ingredients");
    if(isEmpty(description.value) === true ) errors.push("Description");
    if(isEmpty(dtime.value) === true ) errors.push("Delivery Time");

    if(errors.length !== 0)
    {
            for(var i = 0; i < errors.length; i++) errorMessage += "\n - " + errors[i];
            var temp = document.getElementById('error');
            temp.innerHTML = errorMessage;
           //             alert(errorMessage);
            return false;
    }
    else
    {
        temp.innerHTML = "";
        return true;
    }
}

function editFoodisValid()
{
    var errors = new Array();
    var errorMessage = "Please correctly provide the following information.\n";
    
    var temp = document.getElementById('error');
    
    var oldpass = document.getElementById("oldpass");
    var pass = document.getElementById("pass");
    var confirm = document.getElementById("confirm");
  

    if(isEmpty(oldpass.value) === true ) errors.push("Old Password");
    if(isEmpty(pass.value) === true ) errors.push("New Password");
    if(areEquivalent(pass.value, confirm.value) === false) errors.push("Confirm Password");

    if(errors.length !== 0)
    {
            for(var i = 0; i < errors.length; i++) errorMessage += "\n - " + errors[i];
            var temp = document.getElementById('error');
            temp.innerHTML = errorMessage;
           //             alert(errorMessage);
            return false;
    }
    else
    {
        temp.innerHTML = "";
        return true;
    }
}


