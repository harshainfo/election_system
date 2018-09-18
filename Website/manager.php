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
            $('#page-content').children().filter(':not(#manager-panel)').hide();
                $('#myTable').DataTable();
                //$('#votersTable').DataTable();
                $('#manager-panel').show();

               
                

                



        });


                    function buttonAuthorizeSubmitAction(actionId){
                        console.log('Authorize Clicked');
                        var actionId = actionId;//$(this).attr('id');
                        console.log(actionId);
                        var checkedCbs = document.querySelectorAll('#authorizationsBody input[type="checkbox"]:checked');
                        console.log(checkedCbs);
                        var ids = [];
                        for (var i = 0; i < checkedCbs.length; i++) {
                            ids.push(checkedCbs[i].id);
                        }
                        $.ajax({
                            type: "POST",
                            data: {actionId:actionId, elecs:ids},
                            url: "php/authorize_voter.php",
                            success: function(msg){
                              alert("Authorized for "+msg+" elections!");
                            }
                        });


                    } 
                



        function buttonAuthorizeAction(actionId){
            console.log('buttonAuthorizeAction Clicked!');
            var modal = document.getElementById('authorizeModal');
            var buttons = document.getElementsByName('authorizeSubmitBtn');
            buttons[0].setAttribute('id',actionId);
            //buttons[0].setAttribute('onclick','buttonAuthorizeSubmitAction('+buttons[0].id+')');
            
            //console.log(buttons[0].id);

            modal.style.display = "block";

            var span = document.getElementById('authorizeClose');

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
            console.log();
            var xhr1 = new XMLHttpRequest();
            xhr1.open("POST", "php/load_elections.php", true);
            xhr1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            console.log('After XHR');
            xhr1.onreadystatechange = function () {
                if(xhr1.readyState == 4 && xhr1.status == 200){
                var data = JSON.parse(xhr1.responseText);

                    console.log(data);
                    $('#authorizationsBody').html('');
                    if(data.length > 0){
                        $(data).each(function(index,element){
                            console.log(index); console.log(element);
                            $('#authorizationsBody').append('<label class="form-check-label"><div class="input-group mb-3">'
                                + '<div class="input-group-prepend"><div class="input-group-text">'
                                + '<input type="checkbox" value='+element['elec_id']+'/>'+element['elec_date']+':'+element['elec_title']+'</div></div></label>');
                                
                                
                        });
                    }else{  
                        $('#authorizationsBody').append('');

                    }
                    $('button[name="authorizeSubmitBtn"]').attr('onclick','buttonAuthorizeSubmitAction(this.id)');

                    $('#authorizeModal').show();
                }
                    
                
            }

            xhr1.send("actionId="+actionId);

            }


        // function buttonAuthorizeSubmitAction(actionId2){

        //     var checkedCbs = document.querySelectorAll('#authorizationsBody input[type="checkbox"]:checked');
        //     var ids = [];
        //     for (var i = 0; i < checkedCbs.length; i++) {
        //         ids.push(checkedCbs[i].id);
        //     }
        //     var comment = document.getElementById('comment').value;
        //     var actionId = actionId2.getAttribute('id');
        //     console.log(comment);
        //     console.log(actionId);

        //     var xhr1 = new XMLHttpRequest();
        //     xhr1.open("POST", "php/view_actions.php", true);
        //     xhr1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        //     console.log('After XHR');
        //     xhr1.onreadystatechange = function () {
        //         console.log('In onreadystatechange');
        //         if(xhr1.readyState == 4 && xhr1.status == 200){
        //             console.log('In readyState == 4');
        //             if(actionId.substring(0,3) == 'rej'){
        //                 alert('Voter rejection successful!');
        //             }else if(actionId.substring(0,3) == 'reg'){
        //                 alert('Voter registration successful!');
        //             }else if(actionId.substring(0,3) == 'onh'){
        //                 alert('Voter on holding successful!');
        //             }
        //             document.getElementById('commentModal').style.display = "none";
        //             location.reload();

        //         }
        //     }

        //     xhr1.send("actionId="+actionId+"&elecs="+ids);
        //     console.log('After sending');

        // }

        function buttonAction(actionId){

            var modal = document.getElementById('moreModal');

            //var comment = document.getElementById('comment').value;
            //console.log(comment);

            //var commentModal = document.getElementById('commentModal');
            //commentModal.style.display = "none";

            modal.style.display = "none";
            console.log(actionId);
            
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
                            $('input[id="proof_id"]').val(data.proof_id);
                            $('input[id="id_no"]').val(data.id_no);
                            $('input[id="address1"]').val(data.address1);
                            $('input[id="address2"]').val(data.address2);
                            $('input[id="city"]').val(data.city);
                            $('input[id="state"]').val(data.state);
                            $('input[id="zipcode"]').val(data.zipcode);
                            $('input[id="phone"]').val(data.phone);
                            $('input[id="email"]').val(data.email);
                            $('input[id="status"]').val(data.status);
                            $('input[id="start_date"]').val(data.start_date);
                            $('button[class="btn btn-success"]').attr('id',''+data.voter_id);
                                                      

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




                        }else if(actionId.substring(0,3) == 'aut'){
                            
                        }

                    }
                }
                };

                xhr.send("actionId="+actionId);

            }

 

        function viewRegisteredVoters(){
            console.log(status+' Clicked!');

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "php/view_voters.php", true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {

            
                if(xhr.readyState == 4 && xhr.status == 200){
                    
                    var data = JSON.parse(xhr.responseText);

                    console.log(data);
                        $('#page-content').children().filter(':not(#view-voters-table)').hide();

                        $('#votersTableBody').html('');
                        if(data.length > 0){
                            $(data).each(function(index,element){
                                console.log(index); console.log(element);
                                $('#votersTableBody').append('<tr><td>' + element['voter_id'] + '</td><td>'
                                    + element['first_name'] + '</td><td>' 
                                    + element['last_name'] + '</td><td>'
                                    + element['id_no'] + '</td><td>'
                                    + element['phone'] + '</td><td>'
                                    + element['email'] + '</td><td>'
                                    + '<button type="button" class="btn btn-primary" id="mor'+ element['voter_id'] +'" onclick="buttonAction(this.id)">More</button></td><td>'
                                    + '<button type="button" class="btn btn-success" id="aut'+ element['voter_id'] +'" onclick="buttonAuthorizeAction(this.id)">Authorize</button></td></tr>');

                            });
                        }else{  
                            $('#votersTableBody').append('');

                        }
                        
                        
                        $('#votersTable').DataTable();
                        $('#votersTable').show();
                        $('#view-voters-table').show();
                        $('#voterType').html(status);

                }
            }
            xhr.send("status=Registered");

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
                      <a class="navbar-brand" href="javascript:viewAdminPanel();">Manager Panel</a>

                      <!-- Links -->
                      <ul class="navbar-nav">
                        
                      
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Voters</a>
                            <div class="dropdown-menu bg-warning">
                                <a class="dropdown-item bg-warning" href="javascript:viewRegisteredVoters();" id="pend-voter-menu">Pending Authorization</a>
                                <a class="dropdown-item bg-warning" href="javascript:viewUsersTable();">Voted</a>
                                <a class="dropdown-item bg-warning" href="javascript:viewUsersTable();">Pre-Authorized</a>
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
            <div class="row"  id="manager-panel">
                <div class="container">
                    <div class="row"">
                        <div class="col-md 6">
                            <div class="jumbotron">

                                 <h3>Voting Information</h3>

                                                          

                                <div class="row">
                                    <div class="col-md-10">Registered Voters
                                        
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                     <div class="col-md-10">No of Voted voters
                                        
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                    <div class="col-md-10">No of Pending voters
                                        
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                </div>
                                

                               
                             </div>
                         </div>
                        <div class="col-md 6">
                            <div class="jumbotron">
                                <h3>Authorization Information</h3>

                                 


                               

                                <div class="row">
                                <div class="col-md-10">
                                    Total Registered Voters
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-10">
                                    Online Authorized voters
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-10">
                                    Offline Authorized voters
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-10">
                                    Unauthorized voters
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
    <div id="moreModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content  col-md-6">
        <div class="modal-header">
          
          <h2>Voter Details</h2>
          <span class="close" id="moreClose" disabled="false">&times;</span>
      </div>
      <div class="modal-body" id="moreModal-body">

          <form action="/action_page.php">
              <div class="form-group">
                <label for="voter_id">Voter ID:</label>
                <input type="text" class="form-control" id="voter_id" value="" disabled="true">
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
                <label for="last_name">Proof ID:</label>
                <input type="text" class="form-control" id="proof_id" disabled="true">
            </div>
            <div class="form-group">
                <label for="last_name">ID No:</label>
                <input type="text" class="form-control" id="id_no" disabled="true">
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
                <label for="city">State:</label>
                <input type="text" class="form-control" id="state" disabled="true">
            </div>
            <div class="form-group">
                <label for="zipcode">Zip Code:</label>
                <input type="text" class="form-control" id="zipcode" disabled="true">
            </div>
            <div class="form-group">
                <label for="city">Phone:</label>
                <input type="text" class="form-control" id="phone" disabled="true">
            </div>
            <div class="form-group">
                <label for="city">E-mail:</label>
                <input type="text" class="form-control" id="email" disabled="true">
            </div>
            <div class="form-group">
                <label for="zipcode">Status:</label>
                <input type="text" class="form-control" id="status" disabled="true">
            </div>
            <div class="form-group">
                <label for="city">Start Date:</label>
                <input type="text" class="form-control" id="start_date" disabled="true">
            </div>
            
        </form>

    </div>
    <div class="modal-footer" id="moreModal-footer">
      <button type="button" class="btn btn-success" id="" name="authorizeSubmitBtn">Authorize</button>
    </div>


</div>
</div>
<!-- End of the More Modal-->

<!-- Start of Authorize Modal -->
<div id="authorizeModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      
      <h2>Voting Authorization</h2><span class="close" id="authorizeClose">&times;</span>
  </div>
  <form class="form-horizontal">
  <div class="modal-body" id="moreModal-body">

      
        <div class="form-group" id="authorizationsBody">
          
      </div>
  
</div>
<div class="modal-footer" id="moreModal-footer">
  <button type="button" class="btn btn-success" name="authorizeSubmitBtn" onclick="buttonAuthorizeSubmitAction(this.id)">Authorize</button>
</div>
</form>

</div>
</div> 
<!-- End of Authorize Modal-->



    <div class="row" id="page-footer">
      <div class="container"> 
        <p>The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018</p>
    </div>
</div>
</div>


</body>


</html>
