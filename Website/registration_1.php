<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/common.css">

    <!-- CSS file for DataTable -->
    <link rel="stylesheet" type="text/css"  src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <!-- Javascript file for DataTable-->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">

    <script src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

    <script type="text/javascript" src="js/ScrollMagic.js"></script>

    <script language="javascript">


        $(document).ready(function () {

            $('#voterForm').submit(function (){
                if(($('#username-alert').val() != '' && ($('#username-alert').text().contains('<div class="alert alert-success">') || $('#username-alert').text() == '' )) &&
                    ($('#password-alert').val() != '' && ($('#password-alert').text().contains('<div class="alert alert-success">') || $('#password-alert').text() == '' )) &&
                    ($('#repeat_password-alert').val() != '' && ($('#repeat_password-alert').text().contains('<div class="alert alert-success">') || $('#repeat_password-alert').text() == '' )))
                {

                    $.ajax({
                        url: "php/voter_register.php", 
                        type: "POST",             
                        data: {username: $('#username').val(), 
                        password: $('#password').val(), 
                        repeat_password: $('#repeat_password').val(), 
                        first_name:$('#first_name'.val()), 
                        last_name: $('#last_name').val(),
                        proof_id: $('#proof_id').val(),
                        id_no: $('#id_no').val(),
                        phone_no: $('#phone_no').val(),
                        email: $('#email').val(),
                        address1: $('#address1').val(),
                        address2: $('#address2').val(),
                        city: $('#city').val(),
                        state: $('#state').val(),
                        zip_code: $('#zip_code').val(),
                        precinct: $('#precinct').val()         
                    },
                    dataType: 'json',
                    cache: false,
                    success: function(data)
                    {
                        console.log(data);

                        
                    },
                    error: function (request, status, error) {
                        console.log(request),
                        console.log(status),
                        console.log(error)
                    }
                });



                }else{


                }


            });

            $("#state").change(function () {
                //$zip = $('#zipcode').val;
                //$state = $('#state').val;
                $.ajax({
                    url: "php/load_zipcodes.php", 
                    type: "POST",             
                    data: {state: $('#state').val()},
                    dataType: 'json',
                    cache: false,

                    success: function(data)
                    {
                        console.log(data);
                        console.log(data.length);
                        if(data.length > 0){
                            console.log('In data If');
                            $('#zip_code').html('');
                            //$('#precinct').addEventListener("mousewheel", handle, { passive: true });
                            $(data).each(function(index,element){
                                console.log(index); console.log(element);
                                console.log(element['zip']);
                                var zip = element['zip'];
                                $('#zip_code').append('<option value='+zip+'>' + zip + '</option>');
                            });
                        }else{
                            console.log('In data Else');
                            $('#zip_code').html('');
                            $('#zip_code').append('');

                        }
                    },
                    error: function (request, status, error) {
                        console.log(request),
                        console.log(status),
                        console.log(error)
                    }
                });
            });

            $("#zip_code").change(function () {
                console.log($('#state').val());
                console.log($('#zip_code').val());
                //$zip = $('#zipcode').val;
                //$state = $('#state').val;
                $.ajax({
                    url: "php/load_precincts.php", 
                    type: "POST",             
                    data: {state: $('#state').val(), zip: $('#zip_code').val()},
                    dataType: 'json',
                    cache: false,

                    success: function(data)
                    {
                        console.log(data);

                        if(data.length > 0){
                            console.log('In data If');
                            $('#precinct').html('');
                            //$('#precinct').addEventListener("mousewheel", handle, { passive: true });
                            $(data).each(function(index,element){
                                console.log(index); console.log(element);
                                console.log(element['prec_name']);
                                //var zip = element['zip'];
                                $('#precinct').append('<option value='+element['prec_id']+'>' + element['prec_name'] + '</option>');
                            });

                            //$('#precinct').show();
                        }else{
                            console.log('In data Else');
                            $('#precinct').html('');
                            $('#precinct').append('');

                        }
                    },
                    error: function (request, status, error) {
                        console.log(request),
                        console.log(status),
                        console.log(error)
                    }
                });

            });


        });

function validateUsername() {
    var username = document.forms["voterForm"]["username"].value;
    var alertBoolean = false;

    if(username.trim() == ''){
        document.getElementById('username-alert').innerHTML = "<div class='alert alert-danger'><i class='fas fa-times'></i> Username cannot be blank!</div>";
    }else{

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "php/validate_username.php", true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {


            if(xhr.readyState == 4 && xhr.status == 200){

                var data = xhr.responseText;

                if(data.includes("is available")){
                    document.getElementById('username-alert').innerHTML = "<div class='alert alert-success'><i class='fas fa-check'></i> "+data+"</div>";
                    alertBoolean = true;

                }else{
                    document.getElementById('username-alert').innerHTML = "<div class='alert alert-danger'><i class='fas fa-times'></i> "+data+"</div>";
                    alertBoolean = false;

                }
            }
        }
        xhr.send("username="+username);
    }
}

function validatePassword(){
    var password = document.forms["voterForm"]["password"].value;
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    var alertPassword = '';
    var alertBoolean = false;

    if(re.test(password) == false){
        alertPassword = alertPassword + "<div class='alert alert-danger'><i class='fas fa-times'></i> Minimum length is 6 with 1 or more Uppercase, Lowercase, and Numeric characters.</div>";
        alertBoolean = false;
    }else{
                //alertPassword = alertPassword + "<div class='alert alert-success'><i class='fas fa-check'></i> Valid password.</div>";
                alertBoolean = false;
            }
            
            document.getElementById('password-alert').innerHTML = alertPassword;
            return alertBoolean;
            
        }

        function validateRepeatPassword(){
            var password = document.forms["voterForm"]["password"].value;
            var repeat_password = document.forms["voterForm"]["repeat_password"].value;
            var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            var alertPassword = '';
            var alertBoolean = false;
            if(password != repeat_password){
                if(re.test(repeat_password) == false){
                    alertPassword = alertPassword + "<div class='alert alert-danger'><i class='fas fa-times'></i> Minimum length is 6 with 1 or more Uppercase, Lowercase, and Numeric characters.</div>";
                    alertBoolean = false;
                }else{
                    alertPassword = alertPassword + "<div class='alert alert-danger'><i class='fas fa-times'></i> Passwords do not match.</div>";
                    alertBoolean = false;
                }
                
            }else{
                if(re.test(repeat_password) == false){
                    alertPassword = alertPassword + "<div class='alert alert-danger'><i class='fas fa-times'></i> Passwords do not match<br/>Minimum length is 6 with 1 or more Uppercase, Lowercase, and Numeric characters.</div>";
                    alertBoolean = false;
                }else{

                    //alertPassword = alertPassword + "<div class='alert alert-success'><i class='fas fa-check'></i> Passwords match.</div>";
                    alertBoolean = true;
                }

            }
            
            document.getElementById('repeat_password-alert').innerHTML = alertPassword;
            return alertBoolean;
            
        }

        function loadPrecincts() {
            var state = document.forms["voterForm"]["state"].value;
            console.log(state);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "php/load_precincts.php", true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

            console.log('after XHR');
            xhr.onreadystatechange = function () {

                if(xhr.readyState == 4 && xhr.status == 200){
                    console.log('In IF');
                    console.log(xhr.responseText);
                    var data1 = JSON.parse(xhr.responseText);
                    console.log(data1.length);

                    if(data1.length > 0){
                        $('#precinct').html('');
                        $(data1).each(function(index,element){
                            console.log(index); console.log(element);
                            $('#precinct').append('<option value='+element['prec_id']+'>' + element['prec_name'] + '</option>');
                        });
                    }else{
                        $('#precinct').append('');

                    }
                }
            }
            xhr.send("state="+state);
            
        }

        function validateEmail(email){
            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var email = document.forms["voterForm"]["email"].value;
            console.log('In Email');
            var alertEmail = '';
            if (re.test(email) == true){
                //console.log('In Email IF');
                return (true);
            }else{
                //console.log('In Email ELSE');
                alertEmail = alertEmail + "<div class='alert alert-danger'><i class='fas fa-times'></i> Invalid E-mail!</div>";
                document.getElementById('email-alert').innerHTML = alertEmail;
                return false;
            }

        }

        function validateZipcode(){
            var re = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
            var zip = document.forms["voterForm"]["zipcode"].value;
            var alertZip = '';

            if (re.test(zip)){
                return (true);
            }else{
                alertZip = alertZip + "<div class='alert alert-danger'><i class='fas fa-times'></i> Invalid Zip code!</div>";
                document.getElementById('zipcode-alert').innerHTML = alertZip;
                return false;
            }

        }

        function validateAddress1(){
            var re = /^[#.0-9a-zA-Z\s,-]+$/;
            var address1 = document.forms["voterForm"]["address1"].value;
            var alertAddress1 = '';

            if (re.test(address1)){
                return (true);
            }else{
                alertAddress1 = alertAddress1 + "<div class='alert alert-danger'><i class='fas fa-times'></i> Invalid Address!</div>";
                document.getElementById('address1-alert').innerHTML = alertAddress1;
                return false;
            }

        }

        function validateAddress2(){
            var re = /^[#.0-9a-zA-Z \s,-]+$/;
            var address2 = document.forms["voterForm"]["address2"].value;
            var alertAddress2 = '';

            if (re.test(address2)){
                return (true);
            }else{
                alertAddress2 = alertAddress2 + "<div class='alert alert-danger'><i class='fas fa-times'></i> Invalid Address!</div>";
                document.getElementById('address2-alert').innerHTML = alertAddress2;
                return false;
            }

        }

        function validateCity(){
            var re = /^[a-zA-Z ]*$/;
            var city = document.forms["voterForm"]["city"].value;
            var alertCity = '';

            if (re.test(city)){
                return (true);
            }else{
                alertCity = alertCity + "<div class='alert alert-danger'><i class='fas fa-times'></i> Invalid City!</div>";
                document.getElementById('city-alert').innerHTML = alertCity;
                return false;
            }

        }

        function validateIDNo(){
            var re = /^[0-9a-zA-Z]+$/;
            var idNo = document.forms["voterForm"]["id_no"].value;
            var alertIdNo = '';

            if (re.test(idNo)){
                return (true);
            }else{
                alertIdNo = alertIdNo + "<div class='alert alert-danger'><i class='fas fa-times'></i> Invalid ID No!</div>";
                document.getElementById('idno-alert').innerHTML = alertIdNo;
                return false;
            }

        }

        function validateFirstname(){
            var re = /^[a-zA-Z ]+$/;
            var firstname = document.forms["voterForm"]["first_name"].value;
            var alertFirstname = '';

            if (re.test(firstname) && (firstname.trim() != '')){
                return (true);
                document.getElementById('first_name-alert').innerHTML = '';
            }else{
                alertFirstname = alertFirstname + "<div class='alert alert-danger'><i class='fas fa-times'></i> Invalid Name!</div>";
                document.getElementById('first_name-alert').innerHTML = alertFirstname;
                return false;
            }

        }

        function validateLastname(){
            var re = /^[a-zA-Z ]+$/;
            var lastname = document.forms["voterForm"]["last_name"].value;
            var alertLastname = '';

            if (re.test(lastname) && lastname.trim() != ''){
                return (true);
            }else{
                alertLastname = alertLastname + "<div class='alert alert-danger'><i class='fas fa-times'></i> Invalid Name!</div>";
                document.getElementById('last_name-alert').innerHTML = alertLastname;
                return false;
            }

        }



        //document.addEventListener('mousewheel', handle, {passive: true});
        
        

    </script>


</head>

<body>
   <div class="container-fluid">
    <div class="row" id="page-header">
        <div class="container">
            <p>Iowa State Online Voting System</p>
        </div>
    </div>
    <div class="row" >
        <div class="container" id="page-content">
            <div class="row" id="info">
                <h1>New Voter Registration</h1>
                <div id="validationAlerts">

                </div>

            </div>

            <div class="jumbotron">

                <form action="register.php" method="POST" name="voterForm" onsubmit="">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8"><label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" onblur="validateUsername();" autocomplete="username">
                            </div>
                            <div class="col-md-4" id="username-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" onblur="validatePassword();" autocomplete="password">
                            </div>
                            <div class="col-md-4" id="password-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="repeat_password">Repeat Password:</label>
                                <input type="password" class="form-control" id="repeat_password" onblur="validateRepeatPassword();" autocomplete="password">
                            </div>
                            <div class="col-md-4" id="repeat_password-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" onblur="validateFirstname();" autocomplete="first_name">
                            </div>
                            <div class="col-md-4" id="first_name-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" onblur="validateLastname();" autocomplete="last_name">
                            </div>
                            <div class="col-md-4" id="last_name-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="proof_id">Proof of ID:</label>
                                <select class="form-control" id="proof_id">
                                    <option value="dl">Driving License</option>
                                    <option value="sid">State ID</option>
                                    <option value="pp">Passport</option>
                                </select>
                            </div>
                            <div class="col-md-4" id="proof_id-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="id_no">ID No:</label>
                                <input type="text" class="form-control" id="id_no" onblur="validateIDNo();" autocomplete="id_no">
                            </div>
                            <div class="col-md-4" id="idno-alert">

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="phone_no">Phone no:</label>
                                <input type="text" class="form-control" id="phone_no" >
                            </div>
                            <div class="col-md-4" id="phone-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="email">E-mail:</label>
                                <input type="text" class="form-control" id="email" onblur="validateEmail();" >
                            </div>
                            <div class="col-md-4" id="email-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="address1">Address 1:</label>
                                <input type="text" class="form-control" id="address1" onblur="validateAddress1();" autocomplete="address-level1">
                            </div>
                            <div class="col-md-4" id="address1-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="address2">Address 2:</label>
                                <input type="text" class="form-control" id="address2" onblur="validateAddress2();" autocomplete="address-level2">
                            </div>
                            <div class="col-md-4" id="address2-alert">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="city">City:</label>
                                
                                <select class="form-control" id="city">
                                    <?php 
                                    require_once 'php/dbcon.php';

                                    $query = "SELECT city_id, city_name FROM egu_city ORDER BY city_name";
                                    $stmt2 = $DBcon->prepare( $query ); 
                                    $stmt2->execute(array());

                                    while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                                       ?> 

                                       <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?> </option>

                                       <?php
                                   }
                                   ?>


                               </select>
                            </div>
                            <div class="col-md-4" id="city-alert">

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="state">State:</label>
                                <select class="form-control" id="state">
                                    <?php 
                                    require_once 'php/dbcon.php';

                                    $query = "SELECT state_id, state_name FROM egu_state ORDER BY state_name";
                                    $stmt2 = $DBcon->prepare( $query ); 
                                    $stmt2->execute(array());

                                    while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                                       ?> 

                                       <option value="<?php echo $row[0] ?>"> <?php echo $row[1] ?> </option>

                                       <?php
                                   }
                                   ?>


                               </select>
                           </div>
                           <div class="col-md-4" id="state-alert">

                           </div>
                       </div>
                   </div>

                   <div class="form-group">
                    <div class="row">
                     <div class="col-md-8">
                        <label for="zip_code">Zip code:</label>
                        <input type="text" class="form-control" id="zip_code" " autocomplete="zipcode">
                            <!-- <select class="form-control" id="zip_code">
                                <?php 
                                
                                
                            ?>
                        </select> -->
                    </div>
                    <div class="col-md-4" id="zipcode-alert">

                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="precinct">Precinct:</label>
                        <select class="form-control" id="precinct">
                            <?php 
                            require_once 'php/dbcon.php';

                            $query = "SELECT prec_id, prec_name FROM precinct ORDER BY prec_name";
                            $stmt2 = $DBcon->prepare( $query ); 
                            $stmt2->execute(array());

                            while ($row = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                               ?> 

                               <option value="<?php echo $row[0] ?>"> <?php echo $row[1]?> </option>

                               <?php
                           }
                           ?>


                       </select>
                   </div>
                   <div class="col-md-4" id="precinct-alert">

                   </div>

               </div>
           </div>

           <button type="button" class="btn btn-success" id="registerBtn" name="registerBtn" >Register</button>

       </form>
   </div>


</div>
</div>

<div class="row" id="page-footer-index">
  <div class="container"> 
    <p>The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018</p>
</div>
</div>
</div>

</body>

</html>

