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

<script>
    $(document).ready(function(){
    $('#myTable').DataTable();
});

</script>


    <title>Election Management System</title>
    
</head>

<body>

    <h1>Admin Panel</h1>

    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'view_tab')" id="defaultOpen">View Pending Voters</button>
        <button class="tablinks" onclick="openCity(event, 'other1_tab')">Edit</button>
        <button class="tablinks" onclick="openCity(event, 'other2_tab')">Delete</button>
    </div>

    <div id="view_tab" class="tabcontent">
        <h3>View</h3>
        <!-- include 'include/view_pend_voters.php' ?> -->
        
        <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Voter ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>More</th>
                <th>Action</th>

            </tr>
        </thead>

       
        <tbody>

    
            <?php
            
            $con = mysqli_connect("localhost","root", "root", "emsdb");

            if($con) {

                $sql = "SELECT * FROM voter WHERE status='pending'";

                $result = mysqli_query($con, $sql);

                if($result){
                    while ($row = mysqli_fetch_array($result)){

                        ?>
                        <tr>
                            <td><?=$row["voter_id"]?></td>
                            <td><?=$row["first_name"]?></td>
                            <td><?=$row["last_name"]?></td>
                            <td><?=$row["status"]?></td>
                            <td><button type="button" class="btn btn-primary" id="myBtn2">More</button></td>
                            <td><button type="button" class="btn btn-success">Register</button>
                            <button type="button" class="btn btn-danger">Reject</button>
                            <button type="button" class="btn btn-warning">Pending</button></td>
                            </tr>

                            <?php

                        }

                    }else{

                        echo "Error" .mysql_error($con);
                    }



                }else{
                    echo "Connection failed!";

                }

                ?>
    
<!--
<
              
        require_once 'dbcon.php';
              
        $query = "SELECT * FROM voter";
        $stmt = $DBcon->prepare( $query );
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
                            <td>< echo $row["voter_id"]?></td>
                            <td>< echo $row["first_name"]?></td>
                            <td>< echo $row["last_name"]?></td>
                            <td>< echo $row["status"]?></td>
                            <td><button type="button" class="btn btn-primary" id="myBtn2" data-id=$row['voter_id'] ?>>More</button></td>
                            <td><button type="button" class="btn btn-success">Register</button>
                            <button type="button" class="btn btn-danger">Reject</button>
                            <button type="button" class="btn btn-warning">Pending</button></td>
                            </tr>
                            -->
       
    </div>

    <div id="other1_tab" class="tabcontent">
        <h3>Edit</h3>
        <p>Paris is the capital of France.</p> 
    </div>

    <div id="other2_tab" class="tabcontent">
        <h3>Delete</h3>
        <p>Tokyo is the capital of Japan.</p>
    </div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>




</body>


</html>
