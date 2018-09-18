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
        <script type="text/javascript" src="js/userActions.js"></script>
        <script type="text/javascript" src="js/precinctActions.js"></script>
		<script type="text/javascript" src="js/candidateActions.js"></script>
		<script type="text/javascript" src="js/electionActions.js"></script>
		<script type="text/javascript" src="js/raceActions.js"></script>

        <script>
            $(document).ready(function(){
                $('#page-content').children().filter(':not(#admin-panel)').hide();
                $('#myTable').DataTable();
                //$('#votersTable').DataTable();
                $('#admin-panel').show();
                /*$('#moreModal').modal('hide');
                $('#commentModal').modal('hide');
                $("#add-party-form").hide();
                $("#view-parties-table").hide();
                $("#add-candidate-form").hide();
                $("#view-candidates-table").hide();
                $("#add-election-form").hide();
                $("#view-races-table").hide();*/


            });

            function buttonCommentAction(actionId){
                var modal = document.getElementById('commentModal');
                var buttons = document.getElementsByName('commentSubmitBtn');
                buttons[0].setAttribute('id',actionId);
                buttons[0].setAttribute('onclick','buttonCommentSubmitAction('+buttons[0].id+')');
                
                //console.log(buttons[0].id);

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

            function buttonCommentSubmitAction(actionId2){

                var comment = document.getElementById('comment').value;
                var actionId = actionId2.getAttribute('id');
                console.log(comment);
                console.log(actionId);

                var xhr1 = new XMLHttpRequest();
                xhr1.open("POST", "php/view_actions.php", true);
                xhr1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                console.log('After XHR');
                xhr1.onreadystatechange = function () {
                    console.log('In onreadystatechange');
                    if(xhr1.readyState == 4 && xhr1.status == 200){
                        console.log('In readyState == 4');
                        if(actionId.substring(0,3) == 'rej'){
                            alert('Voter rejection successful!');
                        }else if(actionId.substring(0,3) == 'reg'){
                            alert('Voter registration successful!');
                        }else if(actionId.substring(0,3) == 'onh'){
                            alert('Voter on holding successful!');
                        }
                        document.getElementById('commentModal').style.display = "none";
                        location.reload();

                    }
                }

                xhr1.send("actionId="+actionId+"&comment="+comment);
                console.log('After sending');

            }

            function buttonAction(actionId){

                var modal = document.getElementById('moreModal');

                var comment = document.getElementById('comment').value;
                //console.log(comment);

                var commentModal = document.getElementById('commentModal');
                commentModal.style.display = "none";

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
                                $('button[class="btn btn-success"]').attr('id','reg'+data.voter_id);
                                $('button[class="btn btn-danger"]').attr('id','rej'+data.voter_id);
                                $('button[class="btn btn-warning"]').attr('id','onh'+data.voter_id);

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
                                            + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">Reject</button>'
                                            + '<button type="button" class="btn btn-warning" id="onh'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">On Hold</button></td></tr>');
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
                                            + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id))">Reject</button>'
                                            + '<button type="button" class="btn btn-warning" id="onh'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id))">On Hold</button></td></tr>');
                                    });
                                }else{
                                    $('#myTableBody').append('');

                                }


                                console.log('*******');
                                console.log(actionId);
                                console.log(comment);
                                //xhr.send("actionId="+actionId+"&comment="+comment);
                                location.reload();
                                


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
                                            + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">Reject</button>'
                                            + '<button type="button" class="btn btn-warning" id="onh'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">On Hold</button></td></tr>');
                                    });
                                }else{
                                    $('#myTableBody').append('');

                                }

                                //console.log('*******');
                                //console.log(actionId);
                                //console.log(comment);
                                //xhr.send("actionId="+actionId+"&comment="+comment);
                                
                                location.reload();

                            }

                        }
                    }
                    };

                    //console.log('*******');
                    //console.log(actionId);
                    //console.log(comment);
                    xhr.send("actionId="+actionId+"&comment="+comment);

                }

                /*
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
                */

    /*

            function viewVoters(status){
                        console.log(status+' Clicked!');

                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "php/view_voters.php", true);
                        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                        xhr.onreadystatechange = function () {

                        
                            if(xhr.readyState == 4 && xhr.status == 200){
                                
                                var data = JSON.parse(xhr.responseText);

                                console.log(data);
                                    $('#admin-panel').hide();
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
                                                + '<button type="button" class="btn btn-primary" id="mor'+ element['voter_id'] +'" onclick="buttonAction(this.id)">More</button></td><td>');
                                                if(status == 'Registered'){
                                                    $('#votersTableBody').append('<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">Reject</button>'
                                                + '<button type="button" class="btn btn-warning" id="onh'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">On Hold</button></td></tr>');

                                                }else if(status == 'Rejected'){
                                                    $('#votersTableBody').append('<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                                + '<button type="button" class="btn btn-warning" id="onh'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">On Hold</button></td></tr>');
                                                }else if(status == 'Onhold'){
                                                    $('#votersTableBody').append('<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                                + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">Reject</button></td></tr>');
                                                
                                                }else{
                                                
                                                $('#votersTableBody').append('<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                                + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">Reject</button>'
                                                + '<button type="button" class="btn btn-warning" id="onh'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">On Hold</button></td></tr>');    
                                                }
                                        });
                                    }else{  
                                        $('#votersTableBody').append('');

                                    }
                                    
                                    $('#votersTable').reload();
                                    $('#votersTable').DataTable();
                                    $('#votersTable').show();
                                    $('#view-voters-table').show();
                                    $('#voterType').html(status);

                            }
                        }
                        xhr.send("status="+status);

                    }
                    */


                    function viewPendingVoters(status){

                        console.log(status+' Clicked!');

                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "php/view_voters.php", true);
                        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                        xhr.onreadystatechange = function () {

                        
                            if(xhr.readyState == 4 && xhr.status == 200){
                                console.log(xhr.responseText);
                                var data = JSON.parse(xhr.responseText);

                                console.log(data);
                                    $('#admin-panel').hide();
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
                                                + '<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                                + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">Reject</button>'
                                                + '<button type="button" class="btn btn-warning" id="onh'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">On Hold</button></td></tr>');    
                                                
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
                        xhr.send("status=Pending");

                    }

                    function viewRegisteredVoters(status){
                        console.log(status+' Clicked!');

                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "php/view_voters.php", true);
                        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                        xhr.onreadystatechange = function () {

                        
                            if(xhr.readyState == 4 && xhr.status == 200){
                                
                                var data = JSON.parse(xhr.responseText);

                                console.log(data);
                                    $('#admin-panel').hide();
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
                                                + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">Reject</button>'
                                                + '<button type="button" class="btn btn-warning" id="onh'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">On Hold</button></td></tr>');

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

                    function viewRejectedVoters(status){
                        console.log(status+' Clicked!');

                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "php/view_voters.php", true);
                        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                        xhr.onreadystatechange = function () {

                        
                            if(xhr.readyState == 4 && xhr.status == 200){
                                
                                var data = JSON.parse(xhr.responseText);

                                console.log(data);
                                    $('#admin-panel').hide();
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
                                                + '<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                                + '<button type="button" class="btn btn-warning" id="onh'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">On Hold</button></td></tr>');

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
                        xhr.send("status=Rejected");

                    }

                    function viewOnholdVoters(status){
                        console.log(status+' Clicked!');

                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "php/view_voters.php", true);
                        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                        xhr.onreadystatechange = function () {

                        
                            if(xhr.readyState == 4 && xhr.status == 200){
                                
                                var data = JSON.parse(xhr.responseText);

                                console.log(data);
                                    $('#admin-panel').hide();
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
                                                + '<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                                + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">Reject</button></td></tr>');

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
                        xhr.send("status=On Hold");

                    }

                    function viewAllVoters(status){
                        console.log(status+' Clicked!');

                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "php/view_voters.php", true);
                        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                        xhr.onreadystatechange = function () {

                        
                            if(xhr.readyState == 4 && xhr.status == 200){
                                
                                var data = JSON.parse(xhr.responseText);

                                console.log(data);
                                    $('#admin-panel').hide();
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
                                                + '<button type="button" class="btn btn-success" id="reg'+ element['voter_id'] +'" onclick="buttonAction(this.id)">Register</button>'
                                                + '<button type="button" class="btn btn-danger" id="rej'+ element['voter_id'] +'" onclick="buttonCommentAction(this.id)">Reject</button></td></tr>');

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
                        xhr.send("status=All");

                    }

                    function viewElection(){
                        $('#add-election-form').show();
                        $('#page-content').children().filter(':not(#add-election-form)').hide();
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
                          <a class="navbar-brand" href="javascript:viewAdminPanel();">Admin Panel</a>

                          <!-- Links -->
                          <ul class="navbar-nav">
                            
                          <!-- Dropdown -->
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Voters
                            </a>
                            <div class="dropdown-menu bg-warning">
                                <a class="dropdown-item bg-warning" href="javascript:viewPendingVoters('Pending');">Pending</a>
                                <a class="dropdown-item bg-warning" href="javascript:viewRegisteredVoters('Registered');">Registered</a>
                                <a class="dropdown-item bg-warning" href="javascript:viewRejectedVoters('Rejected');">Rejected</a>
                                <a class="dropdown-item bg-warning" href="javascript:viewOnholdVoters('Onhold');">On Hold</a>
                                <!--<a class="dropdown-item bg-warning" href="javascript:viewAllVoters('All');">All</a> -->
                            </div>
                             <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      Users
                  </a>
                  <div class="dropdown-menu bg-warning">
                            <a class="dropdown-item bg-warning" href="javascript:viewUsersTable();">View Users</a>
                        </div>
                  </li>
                              <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      Precinct
                  </a>
                  <div class="dropdown-menu bg-warning">
                            <a class="dropdown-item bg-warning" href="javascript:viewAddPrecinct();">Add Precinct</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewPrecinctsTable();">View Precinct</a>
                        </div>
                  </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                          Candidates
                      </a>
                      <div class="dropdown-menu bg-warning">
                                <a class="dropdown-item bg-warning" href="javascript:viewAddCandidate();">Add Candidate</a>
                                <a class="dropdown-item bg-warning" href="javascript:viewCandidatesTable();">View/Edit/Delete Candidates</a>
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
                          Elections
                      </a>
                      <div class="dropdown-menu bg-warning">
                                <a class="dropdown-item bg-warning" href="javascript:launchElection();">Launch</a>
								<a class="dropdown-item bg-warning" href="javascript:viewAddElection();">Add Election</a>
                                <a class="dropdown-item bg-warning" href="javascript:viewElectionsTable();">View Elections</a>
                            </div>
                      </li>
					  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Races
                  </a>
                  <div class="dropdown-menu bg-warning">
                            <a class="dropdown-item bg-warning" href="javascript:viewAddRace();">Add Race</a>
                            <a class="dropdown-item bg-warning" href="javascript:viewRacesTable();">View Races</a>
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

                            <?php
                            /*
                        require_once 'php/dbcon.php';

                        $query = "SELECT * FROM ";



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
                            */

                            ?>
                        
                        </tbody>

                        </table>

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
                        <h3>View Parties</h3>

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
						<h3>Add Candidate</h3>
						<form action="/action_page.php">
						<div class="form-group">
							First Name:<label for="cand_fname"></label>
							<input type="text" class="form-control" name="cand_fname">
						</div>
						<div class="form-group">
							Last Name:<label for="cand_lname"></label>
							<input type="text" class="form-control" name="cand_lname">
						</div>
					  <div class="form-group">
							Date of Birth:<label for="cand_dob"></label>
							<input type="text" class="form-control" name="cand_dob">
						</div>
						<div class="form-group">
							Gender:<label for="gender"></label>
							<input type="text" class="form-control" name="gender">
						</div>
						<div class="form-group">
							Civil Status:<label for="civil_status"></label>
						<input type="text" class="form-control" name="civil_status">
						</div>
						<div class="form-group">
							Address (Line 1):<label for="cand_add1"></label>
							<input type="Date" class="form-control" name="cand_add1">
						</div>
						<div class="form-group">
							Address (Line 2):<label for="cand_add2"></label>
							<input type="text" class="form-control" name="cand_add2">
						</div>
						<div class="form-group">
							City:<label for="cand_city"></label>
							<input type="text" class="form-control" name="cand_city">
						</div>
						<div class="form-group">
							State:<label for="cand_state"></label>
							<input type="text" class="form-control" name="cand_state">
						</div>
						<div class="form-group">
							Zipcode:<label for="cand_zipcode"></label>
							<input type="text" class="form-control" name="cand_zipcode">
						</div>
						<div class="form-group">
							Phone Number:<label for="cand_phone"></label>
							<input type="text" class="form-control" name="cand_phone">
						</div>
						<div class="form-group">
                        Email:<label for="cand_email"></label>
                        <input type="text" class="form-control" name="cand_email">
                      </div>
					  <div class="form-group">
                        Current Party:<label for="curr_party"></label>
                        <input type="text" class="form-control" name="curr_party">
                      </div>
                      <button type="submit" class="btn btn-primary">Add</button>
                    </form>

					</div>
				</div>
				
                <div class="row" id="view-candidates-table">
                <div class="container">
                    <h3>View <span>Candidates</span></h3>

            <table id="candidatesTable" class="display">
                <thead>
                    <tr>
                        <th>Candidate ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
						<th>Civil Status</th>
                        <th>Address 1</th>
                        <th>Address 2</th>
						<th>City</th>
                        <th>State</th>
                        <th>Zipcode</th>
						<th>Phone Number</th>
                        <th>Email</th>
                        <th>Current Party</th>
                    </tr>
                </thead>
                <tbody id="candidatesTableBody">

                    <?php

                    require_once 'php/dbcon.php';

                    $query = "SELECT * FROM candidate";



                    $result = $DBcon->query($query);

                    if ($result->rowCount() > 0) {

                        foreach($result as $row) {
                            ?>

                            <tr>
                                <td><?=$row["cand_id"]?></td>
                                <td><?=$row["cand_fname"]?></td>
                                <td><?=$row["cand_lname"]?></td>
                                <td><?=$row["cand_dob"]?></td>
								<td><?=$row["gender"]?></td>
                                <td><?=$row["civil_status"]?></td>
								<td><?=$row["cand_add1"]?></td>
                                <td><?=$row["cand_add2"]?></td>
								<td><?=$row["cand_city"]?></td>
                                <td><?=$row["cand_state"]?></td>
								<td><?=$row["cand_zipcode"]?></td>
                                <td><?=$row["cand_phone"]?></td>
								<td><?=$row["cand_email"]?></td>
                                <td><?=$row["curr_party"]?></td>
                                <td><button type="button" class="btn btn-primary" id="edi<?php echo $row["cand_id"] ?>" onclick="buttonEditCandidateAction(this.id)">Edit</button>
                                    <button type="button" class="btn btn-danger" id="del<?php echo $row["cand_id"] ?>" onclick="buttonDeleteCandidateAction(this.id)">Delete</button>
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

                 <div class="row" id="add-user-form">
                <div class="container">
                    <h3>Add User</h3>
                    <form action="/action_page.php">
                      <div class="form-group">
                        <label for="User_name">User ID:</label>
                        <input type="text" class="form-control" name="user_name">
                      </div>
                      <div class="form-group">
                        <label for="date_created">User Name:</label>
                        <input type="text" class="form-control" name="date_created">
                      </div>
                      <div class="form-group">
                        <label for="date_created">Password:</label>
                        <input type="text" class="form-control" name="date_created">
                      </div>
                        <div class="form-group">
                        <label for="date_created">First Name:</label>
                        <input type="text" class="form-control" name="date_created">
                      </div>
                        <div class="form-group">
                        <label for="date_created">Last Name:</label>
                        <input type="text" class="form-control" name="date_created">
                      </div>
                        <div class="form-group">
                        <label for="date_created">Phone:</label>
                        <input type="tel" class="form-control" name="date_created">
                      </div>
                        <div class="form-group">
                        <label for="date_created">Email:</label>
                        <input type="email" class="form-control" name="date_created">
                      </div>
                        <div class="form-group">
                        <label for="date_created">Role:</label>
                        <input type="text" class="form-control" name="date_created">
                      </div>
                      <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                </div>
            </div>
    
            <div class="row" id="view-users-table">
                <div class="container">
                    <h3>View <span>Users</span></h3>

            <table id="usersTable" class="display">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody id="partiesTableBody">


                    <?php

                    require_once 'php/dbcon.php';

                    $query = "SELECT * FROM user";



                    $result = $DBcon->query($query);

                    if ($result->rowCount() > 0) {

                        foreach($result as $row) {
                            ?>

                            <tr>
                                <td><?=$row["username"]?></td>
                                <td><?=$row["password"]?></td>
                                <td><?=$row["first_name"]?></td>
                                <td><?=$row["last_name"]?></td>
                                <td><?=$row["phone"]?></td>
                                <td><?=$row["email"]?></td>
                                <td><?=$row["role"]?></td>
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

         <div class="row" id="add-precinct-form">
                <div class="container">
                    <h3>Add Precinct</h3>
                    <form action="/action_page.php">
                      <div class="form-group">
                        <label for="prec_name">Precinct Name:</label>
                        <input type="text" class="form-control" name="prec_name">
                      </div>
                      <div class="form-group">
                        <label for="county">County:</label>
                        <input type="text" class="form-control" name="county">
                      </div>
                      <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city">
                      </div>
                        <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" class="form-control" name="state">
                      </div>
                        <div class="form-group">
                        <label for="zip_code">Zip Code:</label>
                        <input type="number" class="form-control" name="zip_code">
                      </div>
                      <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                </div>
            </div>
        
        <div class="row" id="view-precincts-table">
                <div class="container">
                    <h3>View <span>Precincts</span></h3>

            <table id="precinctsTable" class="display">
                <thead>
                    <tr>
                        <th>Precinct Name</th>
                        <th>County</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip Code</th>
                    </tr>
                </thead>
                <tbody id="partiesTableBody">


                    <?php

                    require_once 'php/dbcon.php';

                    $query = "SELECT * FROM precinct";



                    $result = $DBcon->query($query);

                    if ($result->rowCount() > 0) {

                        foreach($result as $row) {
                            ?>

                            <tr>
                                <td><?=$row["prec_name"]?></td>
                                <td><?=$row["county"]?></td>
                                <td><?=$row["city"]?></td>
                                <td><?=$row["state"]?></td>
                                <td><?=$row["zip_code"]?></td>
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

                <div class="row" id="add-election-form">
                    <div class="container">
                        <h3>View ELection</h3>
                        <form action="/action_page.php">
                          <div class="form-group">
                            Election Title:<label for="elec_name"></label>
                            <input type="text" class="form-control" name="elec_name">
                          </div>
                          <div class="form-group">
                            Election Date:<label for="elec_date"></label>
                            <input type="Date" class="form-control" name="elec_date">
                          </div>
                          <button type="submit" class="btn btn-primary">Add</button>
                        </form>

                    </div>
				</div>
				
				<div class="row" id="view-elections-table">
                <div class="container">
                    <h3>View <span>Elections</span></h3>

            <table id="electionsTable" class="display">
                <thead>
                    <tr>
                        <th>Election ID</th>
                        <th>Election Date</th>
                        <th>Election Title</th>           
                    </tr>
                </thead>
                <tbody id="electionsTableBody">

                    <?php

                    require_once 'php/dbcon.php';

                    $query = "SELECT * FROM election";



                    $result = $DBcon->query($query);

                    if ($result->rowCount() > 0) {

                        foreach($result as $row) {
                            ?>

                            <tr>
                                <td><?=$row["elec_id"]?></td>
                                <td><?=$row["elec_date"]?></td>
                                <td><?=$row["elec_title"]?></td>
                                <td><button type="button" class="btn btn-primary" id="edi<?php echo $row["cand_id"] ?>" onclick="buttonEditCandidateAction(this.id)">Edit</button>
                                    <button type="button" class="btn btn-danger" id="del<?php echo $row["cand_id"] ?>" onclick="buttonDeleteCandidateAction(this.id)">Delete</button>
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
				
				<div class="row" id="add-race-form">
                <div class="container">
                    <h3>Add Race</h3>
                    <form action="/action_page.php">
                      <div class="form-group">
                        Race Title:<label for="race_title"></label>
                        <input type="text" class="form-control" name="race_title">
                      </div>
					  <div class="form-group">
                        Race Type:<label for="race_type"></label>
                        <input type="text" class="form-control" name="race_type">
                      </div>
					  <div class="form-group">
                        Election:<label for="elec_id"></label>
                        <input type="text" class="form-control" name="elec_id">
                      </div>
					  <div class="form-group">
                       Geographic Area:<label for="egu_id"></label>
                        <input type="text" class="form-control" name="egu_id">
                      </div>
                      <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                </div>
            </div>

                    <div class="row" id="view-races-table">
                <div class="container">
                    <h3>View <span>Races</span></h3>

            <table id="racesTable" class="display">
                <thead>
                    <tr>
                        <th>Race ID</th>
                        <th>Race Title</th>
                        <th>Race Type</th>
						<th>Election ID</th>
						<th>Geographic Area ID</th>
						
                    </tr>
                </thead>
                <tbody id="racesTableBody">

                    <?php

                    require_once 'php/dbcon.php';

                    $query = "SELECT * FROM race";



                    $result = $DBcon->query($query);

                    if ($result->rowCount() > 0) {

                        foreach($result as $row) {
                            ?>

                            <tr>
                                <td><?=$row["race_id"]?></td>
                                <td><?=$row["race_title"]?></td>
                                <td><?=$row["race_type"]?></td>
								<td><?=$row["elec_id"]?></td>
								<td><?=$row["egu_id"]?></td>
                                <td><button type="button" class="btn btn-primary" id="edi<?php echo $row["race_id"] ?>" onclick="buttonEditCandidateAction(this.id)">Edit</button>
                                    <button type="button" class="btn btn-danger" id="del<?php echo $row["race_id"] ?>" onclick="buttonDeleteCandidateAction(this.id)">Delete</button>
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
    
                        <?php
                        /*
                        require_once 'php/dbcon.php';

                        $query = "SELECT * FROM race";



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
                            */
                            ?>                      
        </div>



        <!-- Start of The More Modal -->
        <div id="moreModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              
              <h2>Voter Details</h2>
              <span class="close" id="moreClose">&times;</span>
          </div>
          <div class="modal-body" id="moreModal-body">

              <form action="/action_page.php">
                  <div class="form-group">
                    <label for="voter_id">Voter ID:</label>
                    <input type="text" class="form-control" id="voter_id" value="Harsha" disabled="true">
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
          <button type="button" class="btn btn-success" id="" onclick="buttonAction(this.id)">Register</button>
          <button type="button" class="btn btn-danger"  id="" onclick="buttonCommentAction(this.id)">Reject</button>
          <button type="button" class="btn btn-warning"  id="" onclick="buttonCommentAction(this.id)">On Hold</button>
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
      <button type="button" class="btn btn-success" id="rej2" name="commentSubmitBtn" onclick="buttonCommentSubmitAction(this.id)">Submit</button>
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
	
	<!-- Start of Candidate Modal -->
<div id="candidateModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      
      <h2>Candidate Details</h2>
      <span class="close" id="candidateClose">&times;</span>
  </div>
  <form action="java" id="candidatesModalForm">
  <div class="modal-body" id="candidatesModal-body">

      
                    <div class="form-group">
                        <label for="cand_id">Candidate ID:</label>
                        <input type="text" class="form-control" id="cand_id" disabled="true">
                      </div>
                      <div class="form-group">
                        <label for="cand_fname">First Name:</label>
                        <input type="text" class="form-control" id="cand_fname">
                      </div>
                      <div class="form-group">
                        <label for="cand_lname">Last Name:</label>
                        <input type="text" class="form-control" id="cand_lname">
                      </div>
					  <div class="form-group">
                        <label for="cand_dob">Date of Birth:</label>
                        <input type="text" class="form-control" id="cand_dob">
                      </div>
					  <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" id="gender">
                      </div>
					  <div class="form-group">
                        <label for="civil_status">Civil Status</label>
                        <input type="text" class="form-control" id="civil_status">
                      </div>
					  <div class="form-group">
                        <label for="cand_add1">Address 1:</label>
                        <input type="text" class="form-control" id="cand_add1">
                      </div>
					  <div class="form-group">
                        <label for="cand_add2">Address 2:</label>
                        <input type="text" class="form-control" id="cand_add2">
                      </div>
					  <div class="form-group">
                        <label for="cand_city">City:</label>
                        <input type="text" class="form-control" id="cand_city">
                      </div>
					  <div class="form-group">
                        <label for="cand_state">State:</label>
                        <input type="text" class="form-control" id="cand_state">
                      </div>
					  <div class="form-group">
                        <label for="cand_zipcode">Zipcode:</label>
                        <input type="text" class="form-control" id="cand_zipcode">
                      </div>
					  <div class="form-group">
                        <label for="cand_phone">Phone Number:</label>
                        <input type="text" class="form-control" id="cand_phone">
                      </div>
					  <div class="form-group">
                        <label for="cand_email">Email:</label>
                        <input type="text" class="form-control" id="cand_email">
                      </div>
					  <div class="form-group">
                        <label for="curr_party">Current Party:</label>
                        <input type="text" class="form-control" id="curr_party">
                      </div>
          
  
</div>
<div class="modal-footer" id="candidateModal-footer">
  <button type="button" class="btn btn-success" id="" name="candidateSaveBtn" onclick="buttonCandidateSaveAction(this.id)">Save</button>
</div>
</form>

</div>
</div>

<!-- End of Candidate Modal -->

<!-- Start of Elections Modal -->
<div id="electionModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      
      <h2>Election Details</h2>
      <span class="close" id="electionClose">&times;</span>
  </div>
  <form action="java" id="electionsModalForm">
  <div class="modal-body" id="electionsModal-body">

      
                    <div class="form-group">
                        <label for="elec_id">Election ID:</label>
                        <input type="text" class="form-control" id="elec_id" disabled="true">
                      </div>
                      <div class="form-group">
                        <label for="elec_date">Election Date:</label>
                        <input type="text" class="form-control" id="elec_date">
                      </div>
                      <div class="form-group">
                        <label for="elec_title">Election Title:</label>
                        <input type="text" class="form-control" id="elec_title">
                      </div>
					  
</div>
<div class="modal-footer" id="electionModal-footer">
  <button type="button" class="btn btn-success" id="" name="electionSaveBtn" onclick="buttonElectionSaveAction(this.id)">Save</button>
</div>
</form>

</div>
</div>

<!-- End of Election Modal -->

<!-- Start of Races Modal -->
<div id="raceModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      
      <h2>Race Details</h2>
      <span class="close" id="raceClose">&times;</span>
  </div>
  <form action="java" id="racesModalForm">
  <div class="modal-body" id="racesModal-body">

      
                    <div class="form-group">
                        <label for="race_id">Race ID:</label>
                        <input type="text" class="form-control" id="race_id" disabled="true">
                      </div>
                      <div class="form-group">
                        <label for="race_title">Race Title:</label>
                        <input type="text" class="form-control" id="race_title">
                      </div>
                      <div class="form-group">
                        <label for="race_type">Race Type:</label>
                        <input type="text" class="form-control" id="race_type">
                      </div>
					  <div class="form-group">
                        <label for="elec_id">Election ID:</label>
                        <input type="text" class="form-control" id="elec_id">
                      </div>
					  <div class="form-group">
                        <label for="egu-id">Location ID:</label>
                        <input type="text" class="form-control" id="egu-id">
                      </div>
					  
</div>
<div class="modal-footer" id="raceModal-footer">
  <button type="button" class="btn btn-success" id="" name="raceSaveBtn" onclick="buttonRaceSaveAction(this.id)">Save</button>
</div>
</form>

</div>
</div>

<!-- End of Race Modal -->


        <div class="row" id="page-footer">
          <div class="container"> 
            <p>The University of Iowa College of Engineering | Fundamentals of Software Engineering Group 8 | © Copyright 2018</p>
        </div>
    </div>
    </div>


    </body>


    </html>
