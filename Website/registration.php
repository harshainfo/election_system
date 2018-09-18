<!DOCTYPE php>
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

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>




</head>

<body>
<div class="container-fluid">
    <div class="row" id="page-header">
        <div class="col md-12">
            <p>Iowa State Online Voting System</p>
        </div>

    </div>

    <h1>New Voter Registration</h1>

    <div class="row" id="info">
        <div class = "col md-1"></div>
        <div class = "col md-10">
            <form action="register.php" method="POST">
                Username<br><input type="text" name="username"><br>
                Password<br> <input type="password" name="password"><br>
				Re-enter Password<br> <input type="password" name="password2"><br>
                First Name<br> <input type="text" name="first_name"><br>
                Last Name<br> <input type="text" name="last_name"><br>
                Drivers License Number<br> <input type="text" name="id_no"><br>
                Address 1<br> <input type="text" name="address1"><br>
                Address 2<br> <input type="text" name="address2"><br>
                City<br> <input type="text" name="city"><br>
                State<br> <input type="text" name="state"><br>
                Zip Code<br> <input type="text" name="zip_code"><br>
                Phone Number<br> <input type="text" name="phone"><br>
                E-mail<br> <input type="text" name="email"><br><br>
                <input type="submit" value="Submit">

            </form>
        </div>
        <div class = "col md-1"</div>
</div>
</div>



</body>

<footer>
    <td width="960" height="40" class="footer">The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018 </td>
</footer>

</html>

