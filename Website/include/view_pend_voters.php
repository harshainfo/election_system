<html>
<head>
	<title></title>

	<!-- CSS file for DataTable -->
	<link rel="stylesheet" type="text/css"  src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

	<!-- Javascript file for DataTable-->
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
	<script>

		// Get the modal
		var modal = document.getElementById('moreModal');

		// Get the button that opens the modal
		var btn = document.getElementById("moreBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
			modal.style.display = "block";
		}

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
		document.getElementById('myTable').DataTable();
		$(document).ready(function(){
			$('#myTable').DataTable();
		};
/*
			$(document).on('click', '#moreBtn', function(e){

				e.preventDefault();

  var vid = $(this).data('id'); // get id of clicked row
  
  $('#moreModal').hide(); // hide dive for loader
  $('#moreModal').show();  // load ajax loader
  
  $.ajax({
  	url: 'php/more_voter.php',
  	type: 'POST',
  	data: 'vid='+vid,
  	dataType: 'json'
  })
  .done(function(data){
  	console.log(data);
  	/*
      $('#moreModal').hide(); // hide dynamic div
      $('#moreModal').show(); // show dynamic div
      $('#txt_fname').html(data.first_name);
      $('#txt_lname').html(data.last_name);
      $('#txt_email').html(data.email);
      $('#txt_position').html(data.position);
      $('#txt_office').html(data.office);
      $('#modal-loader').hide();    // hide ajax loader
      
  })
  .fail(function(){
  	$('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
  });
  
});
		});

		// Get the modal
		var modal = document.getElementById('moreModal');

		// Get the button that opens the modal
		var btn = document.getElementById("moreBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		/*
		// When the user clicks the button, open the modal 
		btn.onclick = function() {
			modal.style.display = "block";
		}
		

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



		*/
	</script>
</head>
<body>
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

		<!-- The Modal -->
		<div id="moreModal" class="modal">

			
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
								<td><?= $row["first_name"]?></td>
								<td><?= $row["last_name"]?></td>
								<td><?= $row["status"]?></td>
								<td><button type="button" class="btn btn-primary" id="moreBtn" data-id=<?= $row['voter_id'] ?>>More</button></td>
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



				</tbody>
			</table>
		</body>
		</html>
