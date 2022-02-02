// SELECTING ALL TEXT ELEMENTS
var user_name = document.forms['vform']['user_name'];
var email = document.forms['vform']['email'];
var password = document.forms['vform']['password'];
var confirm_password = document.forms['vform']['confirm_password'];
// SELECTING ALL ERROR DISPLAY ELEMENTS
var name_error = document.getElementById('name_error');
var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error');
// SETTING ALL EVENT LISTENERS
user_name.addEventListener('blur', nameVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);
// validation function
function Validate() {
    // validate username
    if (user_name.value == "") {
        user_name.style.border = "1px solid red";
        document.getElementById('user_name_div').style.color = "red";
        name_error.textContent = "Username is required";
        user_name.focus();
        return false;
    }
    // validate username
    if (user_name.value.length < 3) {
        user_name.style.border = "1px solid red";
        document.getElementById('user_name_div').style.color = "red";
        name_error.textContent = "Username must be at least 3 characters";
        user_name.focus();
        return false;
    }
    // validate email
    if (email.value == "") {
        email.style.border = "1px solid red";
        document.getElementById('email_div').style.color = "red";
        email_error.textContent = "Email is required";
        email.focus();
        return false;
    }
    // validate password
    if (password.value == "") {
        password.style.border = "1px solid red";
        document.getElementById('password_div').style.color = "red";
        confirm_password.style.border = "1px solid red";
        password_error.textContent = "Password is required";
        password.focus();
        return false;
    }
    // check if the two passwords match
    if (password.value != password_confirm.value) {
        password.style.border = "1px solid red";
        document.getElementById('pass_confirm_div').style.color = "red";
        confirm_password.style.border = "1px solid red";
        password_error.innerHTML = "The two passwords do not match";
        return false;
    }
    //g-recapatcha
    var response = grepatcha.getResponse();
    console.log(response.length);
    if (response.length == 0) {
        document.getElementById('g-recaptha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        return false;
    } else {
        return true;
    }
}
// event handler functions
function nameVerify() {
    if (user_name.value != "") {
        user_name.style.border = "1px solid #5e6e66";
        document.getElementById('username_div').style.color = "#5e6e66";
        name_error.innerHTML = "";
        return true;
    }
}

function emailVerify() {
    if (email.value != "") {
        email.style.border = "1px solid #5e6e66";
        document.getElementById('email_div').style.color = "#5e6e66";
        email_error.innerHTML = "";
        return true;
    }
}

function passwordVerify() {
    if (password.value != "") {
        password.style.border = "1px solid #5e6e66";
        document.getElementById('pass_confirm_div').style.color = "#5e6e66";
        document.getElementById('password_div').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }
    if (password.value === confirm_password.value) {
        password.style.border = "1px solid #5e6e66";
        document.getElementById('pass_confirm_div').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }

}

function verifyCaptcha() {
    console.log('verified');
    document.getElementById('g-recpatcha-error').innerHTML = '';
}