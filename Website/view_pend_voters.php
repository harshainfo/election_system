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
            $('#moreModal').modal('hide');
            $('#commentModal').modal('hide');

        });

        function buttonCommentAction(actionId){
            var modal = document.getElementById('commentModal');
            var buttons = document.getElementsByName('commentSubmitBtn');
            buttons[0].setAttribute('id',actionId);
            buttons[0].setAttribute('onclick','buttonAction('+buttons[0].id+')');
            
            console.log(buttons[0].id);

            modal.style.display = "block";

            var span = document.getElementById('commentClose');

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
                      // When the user clicks anywhere outside of the modal, close it
                      window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

            }


            function buttonAction(actionId){
                var modal = document.getElementById('moreModal');

                var comment = document.getElementById('comment').value;
                console.log(comment);

                var commentModal = document.getElementById('commentModal');
                commentModal.style.display = "none";

                modal.style.display = "none";
                console.log(actionId.getAttribute('id'));
                actionId = actionId.getAttribute('id');
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "php/view_actions.php", true);
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {

                
                    if(xhr.readyState == 4 && xhr.status == 200){
                        console.log(xhr.responseText);

                        var data = JSON.parse(xhr.responseText);

                        if(data != null){
                            if(actionId.substring(0,3) == 'mor'){
                                console.log(data);


                                var span = document.getElementById('moreClose');

                                $('input[id="voter_id"]').val(data.voter_id);
                                $('input[id="first_name"]').val(data.first_name);
                                $('input[id="last_name"]').val(data.last_name);
                                $('input[id="username"]').val(data.username);
                                $('input[id="address1"]').val(data.address1);
                                $('input[id="address2"]').val(data.address2);
                                $('input[id="city"]').val(data.city);
                                $('input[id="zipcode"]').val(data.zipcode);
                                $('button[class="btn btn-success"]').attr('id','reg'+data.voter_id);
                                $('button[class="btn btn-danger"]').attr('id','rej'+data.voter_id);
                                $('button[class="btn btn-warning"]').attr('id','pen'+data.voter_id);

                                modal.style.display = "block";


                              // When the user clicks on <span> (x), close the modal
                              span.onclick = function() {
                                modal.style.display = "none";
                            }
                              // When the user clicks anywhere outside of the modal, close it
                              window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = "none";
                                }
                            }




                            }else if(actionId.substring(0,3) == 'reg') {
                                console.log(data);
                                $('#myTableBody').html('');
                                if(data.length > 0){
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#myTableBody').append('<tr><td>' + element['voter_id'] + '</td><td>'
                                            + element['first_name'] + '</td><td>' 
                                            + element['last_name'] + '</td><td>'
                                            + element['status'] + '</td><td>'
                                            + '<button type="button" class="btn btn-primary" id="mor'+ element['voter_id'] +'" onclick="buttonAction(this.id)">More</button></td><td>'
                                            + '<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                            + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Reject</button>'
                                            + '<button type="button" class="btn btn-warning" id="pen'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Pending</button></td></tr>');
                                    });
                                }else{
                                    $('#myTableBody').append('');

                                }


                                console.log('*******');
                                console.log(actionId);
                                console.log(comment);
                                //xhr.send("actionId="+actionId);

                            }else if(actionId.substring(0,3) == 'rej') {



                                console.log(data);
                                $('#myTableBody').html('');
                                if(data.length > 0){
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#myTableBody').append('<tr><td>' + element['voter_id'] + '</td><td>'
                                            + element['first_name'] + '</td><td>' 
                                            + element['last_name'] + '</td><td>'
                                            + element['status'] + '</td><td>'
                                            + '<button type="button" class="btn btn-primary" id="mor'+ element['voter_id'] +'" onclick="buttonAction(this.id)">More</button></td><td>'
                                            + '<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                            + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Reject</button>'
                                            + '<button type="button" class="btn btn-warning" id="pen'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Pending</button></td></tr>');
                                    });
                                }else{
                                    $('#myTableBody').append('');

                                }


                                console.log('*******');
                                console.log(actionId);
                                console.log(comment);
                                //xhr.send("actionId="+actionId+"&comment="+comment);


                            }else if(actionId.substring(0,3) == 'pen') {
                                console.log(data);
                                $('#myTableBody').html('');
                                if(data.length > 0){
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#myTableBody').append('<tr><td>' + element['voter_id'] + '</td><td>'
                                            + element['first_name'] + '</td><td>' 
                                            + element['last_name'] + '</td><td>'
                                            + element['status'] + '</td><td>'
                                            + '<button type="button" class="btn btn-primary" id="mor'+ element['voter_id'] +'" onclick="buttonAction(this.id)">More</button></td><td>'
                                            + '<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                            + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Reject</button>'
                                            + '<button type="button" class="btn btn-warning" id="pen'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Pending</button></td></tr>');
                                    });
                                }else{
                                    $('#myTableBody').append('');

                                }

                                console.log('*******');
                                console.log(actionId);
                                console.log(comment);
                                //xhr.send("actionId="+actionId+"&comment="+comment);

                            }

                        }
                    }
                    };

                    console.log('*******');
                console.log(actionId);
                console.log(comment);
                xhr.send("actionId="+actionId+"&comment="+comment);

                }


                function viewVoters(status){
                    console.log('Registered Clicked!');

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/view_actions.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);
                        }
                    }


                }






        </script>

        <title>Election Management System</title>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row" id="page-header">
                <div class="container">
                    <p>Iowa State Online Voting System</p>
                </div>
            </div>
            <div class="row bg-warning" id="menu-bar">
                <div class="container">

                   <nav class="navbar navbar-expand-sm bg-warning navbar-light">
                      <!-- Brand -->
                      <a class="navbar-brand" href="#">Admin Panel</a>

                      <!-- Links -->
                      <ul class="navbar-nav">
                        
                      <!-- Dropdown -->
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Voters
                        </a>
                        <div class="dropdown-menu bg-warning">
                            <a class="dropdown-item bg-warning" href="javascript:viewVoters('registered');">Registered</a>
                            <a class="dropdown-item bg-warning" href="#">Rejected</a>
                            <a class="dropdown-item bg-warning" href="#">On Hold</a>
                            <a class="dropdown-item bg-warning" href="#">All</a>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Candidates</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Parties</a>
                  </li>
                 <li class="nav-item">
                          <a class="nav-link float-right" href="#">Log off</a>
                      </li>

              </ul>
          </nav>
      </div>
  </div>
</div>



<div class="container-fluid">
    <div class="row">
        <div class="container">
            <h3>View <span>Pending</span></h3>

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
                <tbody id="myTableBody">


                    <?php

                    require_once 'php/dbcon.php';

                    $query = "SELECT * FROM voter WHERE status='pending'";



                    $result = $DBcon->query($query);

                    if ($result->rowCount() > 0) {

                        foreach($result as $row) {
                            ?>

                            <tr>
                                <td><?=$row["voter_id"]?></td>
                                <td><?=$row["first_name"]?></td>
                                <td><?=$row["last_name"]?></td>
                                <td><?=$row["status"]?></td>
                                <td><button type="button" class="btn btn-primary" id="mor<?php echo $row["voter_id"] ?>" onclick="buttonAction(this.id)">More</button></td>
                                <td><button type="button" class="btn btn-success" id="reg<?php echo $row["voter_id"] ?>" onclick="buttonAction(this.id)">Register</button>
                                    <button type="button" class="btn btn-danger" id="rej<?php echo $row["voter_id"] ?>" onclick="buttonCommentAction(this.id)">Reject</button>
                                    <button type="button" class="btn btn-warning" id="pen<?php echo $row["voter_id"] ?>" onclick="buttonCommentAction(this.id)">Pending</button></td>
                                </tr>

                                <?php
                            }

                        } else {
                            echo "0 results";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

    <!-- Start of The More Modal -->
    <div id="moreModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" id="moreClose">&times;</span>
          <h2>Voter Details</h2>
      </div>
      <div class="modal-body" id="moreModal-body">

          <form action="/action_page.php">
              <div class="form-group">
                <label for="voter_id">Voter ID:</label>
                <input type="text" class="form-control" id="voter_id" value="Harsha" disabled="true">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" disabled="true">
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" disabled="true">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" disabled="true">
            </div>
            <div class="form-group">
                <label for="address1">Address 1:</label>
                <input type="text" class="form-control" id="address1" disabled="true">
            </div>
            <div class="form-group">
                <label for="address2">Address 2:</label>
                <input type="text" class="form-control" id="address2" disabled="true">
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" disabled="true">
            </div>
            <div class="form-group">
                <label for="zipcode">Zip Code:</label>
                <input type="text" class="form-control" id="zipcode" disabled="true">
            </div>

        </form>

    </div>
    <div class="modal-footer" id="moreModal-footer">
      <button type="button" class="btn btn-success" id="" onclick="buttonAction(this.id)">Register</button>
      <button type="button" class="btn btn-danger"  id="" onclick="buttonAction(this.id)">Reject</button>
      <button type="button" class="btn btn-warning"  id="" onclick="buttonAction(this.id)">Pending</button>
  </div>


</div>
</div>
<!-- End of the More Modal-->

<!-- Start of Comment Modal -->
<div id="commentModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close" id="commentClose">&times;</span>
      <h2>Decision Details</h2>
  </div>
  <form>
  <div class="modal-body" id="moreModal-body">

      
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
  
</div>
<div class="modal-footer" id="moreModal-footer">
  <button type="button" class="btn btn-success" id="rej2" name="commentSubmitBtn" onclick="buttonAction(this.id)">Submit</button>
</div>
</form>

</div>
</div>
<!-- End of Comment Modal-->


<div class="container-fluid">
    <div class="row" id="page-footer">
      <div class="container"> 
        <p>The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018</p>
    </div>
</div>
</div>


</body>


</html>
