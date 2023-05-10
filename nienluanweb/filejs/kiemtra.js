function validateEmail() {
    var email = document.getElementById('inputEmail_login').value;
    var atposition = email.indexOf("@");
    var dotposition = email.lastIndexOf(".");
    var messEmail = document.getElementById('errorEmail_Login');
    if(atposition < 1 || dotposition < (atposition + 2)
            || (dotposition + 2) >= email.length) {
            messEmail.innerHTML = 'Vui lòng nhập email';
        return false;
    }else{
        messEmail.innerHTML = ''
        return true;
    }
}

function validatePass() {
    var pass = document.getElementById('inputPass_Login').value;
    var mess = document.getElementById('errorPass_Login');
    if(pass == ""){
        mess.innerHTML = 'Pass không được để trống';
        return false;
    }
    if(pass.length < 6 || pass.length > 15){
        mess.innerHTML = 'Vui lòng nhập mật khẩu';
        return false;
    }else{
        mess.innerHTML = '';
        return true;
    }
}

function validation_Login(){
    validateEmail();
    validatePass();
}

function validateName() {
    var name = document.getElementById('inputName').value;
    var mess = document.getElementById('errorName');
    if(name == ""){
        mess.innerHTML = 'Tên không được để trống';
        return false;
    }else{
        mess.innerHTML = '';
        return true;
    }
}


function validateEmail_Register() {
    var email = document.getElementById('inputEmail').value;
    var atposition = email.indexOf("@");
    var dotposition = email.lastIndexOf(".");
    var messEmail = document.getElementById('errorEmail');
    if(atposition < 1 || dotposition < (atposition + 2)
            || (dotposition + 2) >= email.length) {
            messEmail.innerHTML = 'Vui lòng nhập email';
        return false;
    }else{
        messEmail.innerHTML = '';
        return true;
    }
}

function isPhone(number) {
    return /(84|0[3|5|7|8|9])+([0-9]{8})\b/.test(number);
}


function validatePhone() {
    var phone = document.getElementById('inputPhone').value;
    var mess = document.getElementById('errorPhone');
    if( phone == ""){
        mess.innerHTML = 'Số điện thoại không được để trống';
        return false;
    }
    if (!isPhone(phone)){
        mess.innerHTML = 'Số điện thoại không hợp lệ';
        return false;
    }else{
        mess.innerHTML = '';
        return true;
    }
}

function validatePass_Register() {
    var pass = document.getElementById('inputPass').value;
    var mess = document.getElementById('errorPass');
    var checkpass = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
    if ( pass == ""){
        mess.innerHTML = 'Mật khẩu không được để trống';
        return false;
    }else{
        mess.innerHTML = "";
        return true;
    }
}



function validate_Register() {
    validateName();
    validateEmail_Register();
    validatePhone();
    validatePass_Register();
}



















//https://www.javatpoint.com/confirm-password-validation-in-javascript
/*
function kiemtra() {
    var e = document.getElementById('email').value;
    var p = document.getElementById('pass').value;
    if( e == ""){
        document.getElementById('displayemail').innerHTML = '<i>Vui lòng nhập email</i>';
        return false;
    }
    if( p.length < 6 ){
        document.getElementById('checkpass').innerHTML = 'Vui lòng nhập password';
        return false;
    }
    return true;
}

function checkEmail() {
    var email = document.getElementById('email').value;
    var messemail = document.getElementById('displayemail');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if( filter != email){
        alert("Nhập sai định dạng");
    }else {
        alert("Nhập đúng định dạng") 
    }
}
*/





