function forgotPasswordEmailSender(){
    console.log('In function');
    var email = document.getElementById('email').value;
    console.log(email);

    var xhr1 = new XMLHttpRequest();
    xhr1.open("POST", "php/forgot_pw_actions.php", true);
    xhr1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    console.log('After XHR');
    xhr1.onreadystatechange = function () {
        console.log('In onreadystatechange');
        if(xhr1.readyState == 4 && xhr1.status == 200){
            console.log('In readyState == 4');
            document.getElementById('entry-form').html('');
            document.getElementById('forgot-pw-alert').html(xhr1.responseText());
        }
    }

    xhr1.send("email="+$email);
    console.log('After sending');
}