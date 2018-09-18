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
    <script type="text/javascript" src="js/partyActions.js"></script>

    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
            $('#moreModal').modal('hide');
            $('#commentModal').modal('hide');
            $("#add-party-form").hide();
            $("#view-parties-table").hide();
            $("#add-candidate-form").hide();
            $("#view-candidates-table").hide();


        });

            function buttonAction(actionId){
                var modal = document.getElementById('moreModal');

                var comment = document.getElementById('comment').value;
                //console.log(comment);

                var commentModal = document.getElementById('commentModal');
                commentModal.style.display = "none";

                modal.style.display = "none";
                //console.log(actionId.getAttribute('id'));
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


        function viewVoters(status){
                    console.log('Registered Clicked!');

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/view_voters.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);


                        }
                    }
                    xhr.send("status="+status);

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
                            <a class="dropdown-item bg-warning" href="javascript:viewVoters('pending');">Pending</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewVoters('registered');">Registered</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewVoters('rejected');">Rejected</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewVoters('onhold');">On Hold</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewVoters('all');">All</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      Candidates
                  </a>
                  <div class="dropdown-menu bg-warning">
                            <a class="dropdown-item bg-warning" href="javascript:viewAddCandidate();">Add Candidate</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewCandidates();">View/Edit/Delete Candidates</a>
                        </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      Parties
                  </a>
                  <div class="dropdown-menu bg-warning">
                            <a class="dropdown-item bg-warning" href="javascript:viewAddParty();">Add Party</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewPartiesTable();">View/Edit/Delete Parties</a>
                        </div>
                  </li>
                  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      Users
                  </a>
                  <div class="dropdown-menu bg-warning">
                            <a class="dropdown-item bg-warning" href="javascript:viewAddUser();">Add User</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewUsersTable();">View/Edit/Delete Users</a>
                        </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      Elections
                  </a>
                  <div class="dropdown-menu bg-warning">
                            <a class="dropdown-item bg-warning" href="javascript:viewParty();">Launch</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewParties();">View</a>
                        </div>
                  </li>
                 <li class="nav-item">
                          <a class="nav-link float-right" href="#">Log off</a>
                      </li>

              </ul>
          </nav>
      </div>
  </div>





    <div class="row" >
        <div class="container" id="page-content">
            <div class="row"  id="admin-panel">
                <div class="container">
                    <div class="row"">
                        <div class="col-md 6">
                            <div class="jumbotron">

                                 <h3>Voter Information</h3>

                            <?php 
                                require_once 'php/dbcon.php';

                            $query = "SELECT status, COUNT(voter_hist_id) AS TOTAL FROM voter_history WHERE end_date = NULL OR end_date = '' GROUP BY status ORDER BY status";



                            $result = $DBcon->query($query);

                            if ($result->rowCount() > 0) {

                                foreach($result as $row) {
                            ?>


                               

                                <div class="row">
                                    <div class="col-md-10"><?=$row["status"]?>
                                        
                                    </div>
                                    <div class="col-md-2"><?=$row["TOTAL"]?>
                                        
                                    </div>
                                </div>
                                

                                <?php
                            }
                        }

                                ?>
                             </div>
                         </div>
                        <div class="col-md 6">
                            <div class="jumbotron">
                                <h3>Precinct Information</h3>

                                 <?php 
                                require_once 'php/dbcon.php';

                            $query = "SELECT COUNT(prec_id) AS TOTAL FROM precinct";



                            $result = $DBcon->query($query);

                            if ($result->rowCount() > 0) {

                                foreach($result as $row) {
                            ?>


                               

                                <div class="row">
                                    <div class="col-md-10">Total Registered Precincts
                                        
                                    </div>
                                    <div class="col-md-2"><?=$row["TOTAL"]?>
                                        
                                    </div>
                                </div>
                                

                                <?php
                            }
                        }

                                ?>

                            </div>
                        </div>

                    </div>

                    <div class="row">
                    <div class="col-md 6">
                        <div class="jumbotron">
                            <h3>Candidate Information</h3>

                            <?php 
                            require_once 'php/dbcon.php';

                        $query = "SELECT COUNT(cand_id) AS TOTAL FROM candidate";



                        $result = $DBcon->query($query);

                        if ($result->rowCount() > 0) {

                            foreach($result as $row) {
                        ?>


                           

                            <div class="row">
                                <div class="col-md-10">Total Registered Candidates
                                    
                                </div>
                                <div class="col-md-2"><?=$row["TOTAL"]?>
                                    
                                </div>
                            </div>
                            

                            <?php
                        }
                    }

                            ?>
                        </div>
                    </div>
                    <div class="col-md 6">
                        <div class="jumbotron">
                            <h3>Party Information</h3>

                            <?php 
                            require_once 'php/dbcon.php';

                        $query = "SELECT status, COUNT(party_id) AS TOTAL FROM party p GROUP BY status ORDER BY status";



                        $result = $DBcon->query($query);

                        if ($result->rowCount() > 0) {

                            foreach($result as $row) {
                        ?>


                           

                            <div class="row">
                                <div class="col-md-10"><?=$row["status"]?>
                                    
                                </div>
                                <div class="col-md-2"><?=$row["TOTAL"]?>
                                    
                                </div>
                            </div>
                            

                            <?php
                        }
                    }
                    ?>

                        </div>
                    </div>

                    </div>
                </div>
            </div>
            <div class="row" id="add-party-form">
                <div class="container">
                    <h3>Add Party</h3>
                    <form action="/action_page.php">
                      <div class="form-group">
                        <label for="party_name">Party Name:</label>
                        <input type="text" class="form-control" name="party_name">
                      </div>
                      <div class="form-group">
                        <label for="date_created">Date Created:</label>
                        <input type="Date" class="form-control" name="date_created">
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="activeChk"> Active
                        </label>
                      </div>
                      <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                </div>
            </div>

            <div class="row" id="view-parties-table">
                <div class="container">
                    <h3>View <span>Parties</span></h3>

            <table id="partiesTable" class="display">
                <thead>
                    <tr>
                        <th>Party ID</th>
                        <th>Party Name</th>
                        <th>Date Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="partiesTableBody">


                    <?php

                    require_once 'php/dbcon.php';

                    $query = "SELECT * FROM party";



                    $result = $DBcon->query($query);

                    if ($result->rowCount() > 0) {

                        foreach($result as $row) {
                            ?>

                            <tr>
                                <td><?=$row["party_id"]?></td>
                                <td><?=$row["party_name"]?></td>
                                <td><?=$row["date_created"]?></td>
                                <td><?=$row["status"]?></td>
                                <td><button type="button" class="btn btn-primary" id="edi<?php echo $row["party_id"] ?>" onclick="buttonEditPartyAction(this.id)">Edit</button>
                                    <button type="button" class="btn btn-danger" id="del<?php echo $row["party_id"] ?>" onclick="buttonDeletePartyAction(this.id)">Delete</button>
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
            <div class="row" id="add-candidate-form">
                <div class="container">
                    

                </div>
            </div>
            <div class="row" id="view-candidates-table">
                <div class="container">
                    

                </div>
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


<!-- Start of Party Modal -->
<div id="partyModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      
      <h2>Party Details</h2>
      <span class="close" id="partyClose">&times;</span>
  </div>
  <form action="java" id="partyModalForm">
  <div class="modal-body" id="partyModal-body">

      
                    <div class="form-group">
                        <label for="party_name">Party ID:</label>
                        <input type="text" class="form-control" id="party_id" disabled="true">
                      </div>
                      <div class="form-group">
                        <label for="party_name">Party Name:</label>
                        <input type="text" class="form-control" id="party_name">
                      </div>
                      <div class="form-group">
                        <label for="date_created">Date Created:</label>
                        <input type="Date" class="form-control" id="date_created">
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" id="activeChk"> Active
                        </label>
                      </div>
                     
                    
  
</div>
<div class="modal-footer" id="partyModal-footer">
  <button type="button" class="btn btn-success" id="" name="partySaveBtn" onclick="buttonPartySaveAction(this.id)">Save</button>
</div>
</form>

</div>
</div>
<!-- End of Party Modal-->


    <div class="row" id="page-footer">
      <div class="container"> 
        <p>The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018</p>
    </div>
</div>
</div>


</body>


</html>
