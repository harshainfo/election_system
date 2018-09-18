<?php

session_start();

?>
<html>
<head>
  <meta charset="utf-8">
  <title>Iowa State Online Voting System | Home</title>
  <style type="text/css">

</style>
<!--<link href="css/css_main.css" rel="stylesheet" type="text/css">-->

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

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
function loginFunction(){

    var un = $('#un').val();
    var pw = $('#pw').val();
    console.log(un);
    console.log(pw);

    $.ajax({
        type: "POST",
        data: {un:un, pw:pw},
        url: "php/login_action.php",
        success: function(msg){
          if(msg == "Invalid Username or Password"){
            $('#message').html(msg);
          }else{
            var data = JSON.parse(msg);
            console.log(data);
            window.location.href = data.role + ".php";
          }
        }
        // },
        // error: function(msg){
        //   alert(msg);
        // }
    });

}

</script>
</head>

<body>

  <div class="container-fluid">
    
       <!-- <div id="bgimg"> -->  
    <!-- <div class="col-md-8"> -->
      <div class="parallax"></div>
      <div class="row" id="page-header-index">
      <div class="container">
        <p>Iowa State Online Voting System</p>
      </div>
    </div>
    <div class="row" id="page-content-index">
      <div class="container-fluid" id="div_parallax">
        <!-- <div id="bgimg"> -->
      <!--<div id="img_div">
      <img src="Pictures/vote.jpg" id="vote_img" class="img-fluid">
    </div>-->
    <div class="col-md-3"></div>
    <div id="form_div" class="col-md-8">

      <form id="login_form" method = "POST">
        <div class="row" id="message"></div>
        <div class="form-group">
          <label for="text">Username :</label>
          <input type="text" class="form-control" id="un" name="username">
        </div>
        <div class="form-group">
          <label for="pwd">Password :</label>
          <input type="password" class="form-control" id="pw" name="password">
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;Remember me
          </label>
        </div>
        
        <div class="row">
          <div class="col-md-7"><a href="forgotPassword.php" class="float-left">Forgot Password?</a></div>
          
          <div class="col-md-5"><button type="button" class="btn btn-warning float-right" id="login_btn" onclick="loginFunction()"><b>Login</b></button></div>
        </div>
        <div class="row">

          <div class="col-md-5">New Voter?<a href="registration_1.php"><button type="button" class="btn btn-danger float-right" ><b>Register</b></button></a></div>
          <!-- <div class="col-md-3"><a href="loginresult.php"><button type="submit" class="btn btn-danger float-left" id="login_btn"><b>Register</b></button></a></div> -->
          <!-- <div class="col-md-6"></div> -->
        </div>
        
        
        
      </form>
      </div>
      <div class="col-md-1"></div>
</div>
</div>
<div class="row" id="page-footer-index">
  <div class="container"> 
    <p>The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018</p>
  </div>
</div>
    <!-- </div> -->
    <!-- </div>
  </div> -->

<div class="parallax"></div>




</div>

</body>
</html>