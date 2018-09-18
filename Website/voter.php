<?
    session_start();
    if(!isset($_SESSION['un']) && !isset($_SESSION['role']) && $_SESSION['role'] != 'voter'){
        header("Location : index.php");  
    }else{
?>

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
            //$('#votersTable').DataTable();
            $('#view-voters-table').hide();
            $('#moreModal').modal('hide');
            $('#commentModal').modal('hide');
            $("#add-party-form").hide();
            $("#view-parties-table").hide();
            $("#add-candidate-form").hide();
            $("#view-candidates-table").hide();
            $("#changeBtn").click(function(){
                $('#personalModal').modal('show');

            });
            $("#voteBtn").click(function(){
                $('#balletModal').modal('show');

            });


        });

        function generateBallet(actionId){
            console.log('Vote clicked');

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/generateBallet.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {


                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            $('#balletModal').show();
                            var data = JSON.parse(xhr.responseText);
                        }
                    }

                    xhr.send('actionId='+actionId);


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
                      <a class="navbar-brand" href="javascript:viewAdminPanel();">Voter Panel</a>

                      <!-- Links -->
                      <ul class="navbar-nav">
                        <!--
                      
                        <li class="nav-item">
                            <a class="nav-link float-right" href="javascript:viewRegisteredVoters('Registered');">Voters</a>-->
                            
                            <!--<a class="dropdown-item bg-warning" href="javascript:viewAllVoters('All');">All</a> -->
                        <!--</li>
                        -->
                    <li class="nav-item">
                            <a class="nav-link float-right" href="#">
                                <?php
                                        if(isset($_SESSION['un'])){
                                            echo $_SESSION['un'];
                                        }
                                ?>
                            </a>
                      </li>
                 <li class="nav-item">
                          <a class="nav-link float-right" href="logout_action.php">Log off</a>
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

                                 <h3>Voting History</h3>

                                                          

                                <div class="row">
                                    <div class="col-md-10">Registered Elections
                                        
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                     <div class="col-md-10">Voted Elections
                                        
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-10">Missed Elections
                                        
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-10">Missed Elections
                                        
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-info" id="" onclick="">View</button>
                                    </div>
                                     
                                </div>
                               
                             </div>
                         </div>
                        <div class="col-md 6">
                            <div class="jumbotron">
                                <h3>Personal Information</h3>

                                <div class="row">
                                    <div class="col-md-10">
                                        Address 1
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-10">
                                        Address 2
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-10">
                                        City
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-10">
                                        Precinct Name
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-10">
                                        
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger" id="changeBtn" onclick="">Change</button>
                                    </div>
                                </div>
                                

                                
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    <div class="col-md 6">
                        <div class="jumbotron">
                            <h3>Current Elections</h3>

                                                    
                            <?php
                            require_once 'php/dbcon.php';

                            $querySelect = "SELECT e.elec_id AS elec_id, e.elec_title AS elec_title FROM election e, election_voter_log evl WHERE evl.voter_id=6 AND evl.status = 'Authorized' AND e.elec_id = evl.elec_id AND e.elec_date = DATE_FORMAT(now(), '%Y-%m-%d')";
                            
                            // $stmt = $DBcon->prepare( $query ); 
                            // $stmt-> execute(array());
                            $rows = $DBcon->query($querySelect);
                            
                            foreach ($rows as $row) {

                            ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <?=$row['elec_title']?>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success" id="ele<?=$row['elec_id']?>" onclick="generateBallet(this.id)">Vote</button>
                                </div>
                                
                            </div>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-md 6">
                        <div class="jumbotron">
                            <h3>Special Authorization</h3>

                            

                            <div class="row">
                                <div class="col-md-10">
                                    Presidential Election November 9, 2018
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-warning" id="" onclick="">Request</button>
                                </div>
                                <div class="col-md-10">
                                    
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-10">
                                    
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    </div>
                </div>
            </div>
            
            <div class="row" id="view-voters-table">
                <div class="container">
                    <h3>View <span id="voterType"></span> Voters</h3>

                    <table id="votersTable" class="display">
                        <thead>
                            <tr>
                                <th>Voter ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>ID No</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>More</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody id="votersTableBody">

                       
                    
                    </tbody>

                    </table>

                </div>
                
            </div>

        </div>
    </div>

    <!-- Start of The More Modal -->
    <div id="personalModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content  col-md-6">
        <div class="modal-header">
          
          <h2>Personal Details</h2>
          <span class="close" id="moreClose" disabled="false">&times;</span>
      </div>
      <div class="modal-body" id="moreModal-body">

          <form action="/action_page.php">
              
            <div class="form-group">
                <label for="address1">Address 1:</label>
                <input type="text" class="form-control" id="address1" >
            </div>
            <div class="form-group">
                <label for="address2">Address 2:</label>
                <input type="text" class="form-control" id="address2" >
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" >
            </div>
            <div class="form-group">
                <label for="city">State:</label>
                <input type="text" class="form-control" id="state" >
            </div>
            <div class="form-group">
                <label for="zipcode">Zip Code:</label>
                <input type="text" class="form-control" id="zipcode" >
            </div>
            <div class="form-group">
                <label for="city">Phone:</label>
                <input type="text" class="form-control" id="phone" >
            </div>
            <div class="form-group">
                <label for="city">E-mail:</label>
                <input type="text" class="form-control" id="email" >
            </div>
            <div class="form-group">
                <label for="zipcode">Precinct:</label>
                <input type="text" class="form-control" id="status" >
            </div>
           
            
        </form>

    </div>
    <div class="modal-footer" id="moreModal-footer">
      <button type="button" class="btn btn-info" id="" onclick="buttonAction(this.id)">Change</button>
    </div>


</div>
</div>
<!-- End of the More Modal-->

    <!-- Start of The More Modal -->
    <div id="balletModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content  col-md-6">
        <div class="modal-header">
          
          <h2>Ballot-Presidential Election November 9, 2018</h2>
           
          <span class="close" id="moreClose" disabled="false">&times;</span>
      </div>
      <div class="modal-body" id="balletModal-body">

          <form action="php/vote_action.php">
              
            <div class="jumbotron">
                            <h3>President and Vice-president</h3>

                                                    

                            <div class="row">
                               
                                <div class="col-md-12">
                                   <input type="radio" name=""> Mit Romney & Paul Ryan
                                </div>
                                
                                <div class="col-md-10">
                                    
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-10">
                                    
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                            </div>
                            
                        </div>
           
            
        </form>

    </div>
    <div class="modal-footer" id="moreModal-footer">
      <button type="button" class="btn btn-info" id="" onclick="buttonAction(this.id)">Vote</button>
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
      <h2>Verification Details</h2>
  </div>
  <form>
  <div class="modal-body" id="moreModal-body">

      
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
  
</div>
<div class="modal-footer" id="moreModal-footer">
  <button type="button" class="btn btn-success" id="rej2" name="commentSubmitBtn" onclick="buttonCommentSubmitAction(this.id)">Submit</button>
</div>
</form>

</div>
</div>
<!-- End of Comment Modal-->



    <div class="row" id="page-footer">
      <div class="container"> 
        <p>The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018</p>
    </div>
</div>
</div>


</body>


</html>
