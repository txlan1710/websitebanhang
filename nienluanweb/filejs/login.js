// Check pass
function Checkpass(event){
    event.preventDefault();
    var pass = document.getElementById('pass').value;
    var mess = document.getElementById('checkpass');
    if (pass = '') {
        document.getElementById('pass').style.color = 'yellow';
        mess.innerHTML += 'Mật khẩu không được để trống';
    }
}

function Checkemail(event) {
    event.preventDefault();
    var email = document.getElementById('email').value;
    var mess = document.getElementById('checkemail');
    var test = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(email == ''){
        document.getElementById('email').style.backgroundColor = 'yellow';
        mess.innerHTML += 'Email không được để trống';
    }else if(!email.match(test)) {
        document.getElementById('email').style.backgroundColor = 'yellow';
        mess.innerHTML += 'Email nhập sai định dạng';
    }
}

var btndangnhap = document.getElementById('btnDangnhap');

btndangnhap.onclick = function validate() {
    Checkemail(event);
    Checkpass(event);

}