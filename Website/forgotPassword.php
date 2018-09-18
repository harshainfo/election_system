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
     $(document).ready(function() {
      var url = $(location).attr('href');
      var params = url.split('=');
      // $('#submit_btn').prop('disabled', true);

      // $('#pwd').onblur(function (){
      //   if((this.value.trim() == $('#re_pwd').value.trim()) && (this.value.trim() != '') ){
      //     $('#submit_btn').disabled(false);
      //   }
      // });

      // $('#re_pwd').onblur(function (){
      //   if((this.value.trim() == $('#pwd').value.trim()) && (this.value.trim() != '') ){
      //     $('#submit_btn').disabled(false);
      //   }

      $('#submit_btn').click( function(){
         // if(($('#re_pwd').value.trim() == $('#pwd').value.trim()) && ($('#pwd').value.trim() != '') ){
          $.ajax({

                    url: "php/forgot_pw_actions.php", 
                    type: "POST",             
                    data: {email: $('#email').val()
                        },
                    dataType: 'html',
                    cache: false,
                    success: function(data)
                    {
                        $('#entry-form').html('');
                        $('#forgot-pw-alert').html("<div class='alert alert-info'><i class='fas fa-times'></i>"+data+"</div>");

                        
                    },
                    error: function (request, status, error) {
                        console.log(request),
                        console.log(status),
                        console.log(error)
                    }
          });
        // }
      });

    });


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
            $('#entry-form').html('');
            $('#forgot-pw-alert').html("<div class='alert alert-info'><i class='fas fa-times'></i>"+xhr1.responseText+"</div>");
        }
    }
    xhr1.send("email="+email);
    console.log('After sending');
  }

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

      <form id="login_form" method="POST">
        <div class="form-group">
          <label>Forgot Password</label>
          <div id="forgot-pw-alert" ></div>
        </div>
        <div class="form-group" id="entry-form">
          <label for="email">Registered E-mail Address:</label>
          <input type="email" class="form-control" id="email">
          <button type="button" class="btn btn-danger float-right" id="submit_btn">Submit</button>
        </div>
        <div class="row">
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