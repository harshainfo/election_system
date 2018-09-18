<?php
session_start()
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

</head>

<body>
  <script>
    $(document).ready(function () {
      var params = window.location.href.split('=');
      $('#submit_btn').prop('disabled', true);

      $('#pwd').blur(function (){
        if(($.trim($('#pwd').val()) == $.trim($('#re_pwd').val())) && ($.trim($('#pwd').val()) != '' )){
          $('#submit_btn').prop('disabled', false);
        }
      });

      $('#re_pwd').blur(function (){
        if(($.trim($('#re_pwd').val()) == $.trim($('#pwd').val())) && ($.trim($('#re_pwd').val()) != '')){
          $('#submit_btn').prop('disabled', false);
        }
      });

      $('#submit_btn').click( function(){
         if(($.trim($('#pwd').val()) == $.trim($('#re_pwd').val())) && ($.trim($('#pwd').val()) != '' )){
          console.log('In ajax call');
          console.log($('#pwd').val());
          console.log(params[1]);
          $.ajax({
                    


                    url: "php/reset_pw_actions.php", 
                    type: "POST",             
                    data: {pw: $('#pwd').val(), 
                           reset_key :  params[1]   
                        },
                    dataType: 'html',
                    cache: false,
                    success: function(data)
                    {
                        console.log(data);
                        $('#entry-form').html('');
                        $('#pw-reset-alert').html("<div class='alert alert-info'><i class='fas fa-times'></i>"+data+"</div>");

                        
                    },
                    error: function (request, status, error) {
                        console.log('request');
                        console.log(request);
                        console.log('status');
                        console.log(status);
                        console.log('error');
                        console.log(error);
                    }
          });
        }
      });

    });


    // function passwordResetSender(){
    //   console.log('In function');
    //   var pwd = document.getElementById('pwd').value;
    //   var rePwd = document.getElementById('re_pwd').value;

    //   console.log(email);
    //   var xhr1 = new XMLHttpRequest();
    //   xhr1.open("POST", "php/forgot_pw_actions.php", true);
    //   xhr1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    //   console.log('After XHR');
    //   xhr1.onreadystatechange = function () {
    //       console.log('In onreadystatechange');
    //       if(xhr1.readyState == 4 && xhr1.status == 200){
    //           console.log('In readyState == 4');
    //           $('#entry-form').html('');
    //           $('#pw-reset-alert').html(data);
    //       }
    //   }
    //   xhr1.send("email="+email);
    //   console.log('After sending');
  
  </script>
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

      <form action="" id="login_form">
        <div class="form-group">
          <label>Password Reset</label>
           <div id="pw-reset-alert" ></div>
        </div>
        <div id="entry-form">
            <div class="form-group">
              <label for="pwd">New Password :</label>
              <input type="password" class="form-control" id="pwd">
            </div>
            <div class="form-group">
              <label for="re_pwd">Repeat New Password :</label>
              <input type="password" class="form-control" id="re_pwd">
              <button type="button" class="btn btn-danger float-right" id="submit_btn" >Submit</button>
            </div>
        </div>
              
        <div class="row">
         <!--  <div class="col-md-7"><a href="#" class="float-left">Forgot Password?</a></div>
          
          <div class="col-md-5"><a href="loginresult.php"><button type="submit" class="btn btn-warning float-right" id="login_btn"><b>Submit</b></button></a></div> -->
        </div>
        <div class="row">

          <!-- <div class="col-md-5"><a href="php/password_reset.php"><button type="button" class="btn btn-danger float-right" id="login_btn"><b>Submit</b></button></a></div> -->
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