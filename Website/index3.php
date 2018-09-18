<?php
session_start()
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Iowa State Online Voting System | Home</title>
  <style type="text/css">

</style>
<link href="css/css_main.css" rel="stylesheet" type="text/css">

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

  <div class="container-fluid">
    <div class="row" id="page-header">
      <div class="container">
        <p>Iowa State Online Voting System</p>
      </div>
    </div>
    <div class="row" id="page-content">
      <div class="container">
        <div id="bgimg">
      <!--<div id="img_div">
      <img src="Pictures/vote.jpg" id="vote_img" class="img-fluid">
    </div>-->
    <div id="form_div">
      <form action="/login_action.php" id="login_form" method = "POST">
        <div class="form-group">
          <label for="text">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" id="pwd" name="password">
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;Remember me
          </label>
        </div>
        <button type="submit" class="btn float-right" id="login_btn">Login</button>
        <a href="ForgetPassword.php" >Forgot Password?</a>
      </form>
    </div>
  </div>
</div>
</div>
<div class="row" id="page-footer">
  <div class="container"> 
    <p>The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018</p>
  </div>
</div>



</div>

</body>
</html>
