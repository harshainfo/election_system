
        function viewAddElection(){
            $("#admin-panel").hide();
			$('#add-party-form').hide();
			$('#add-election-candidate').hide();
			$('#add-race-form').hide();
			$('#add-user-form').hide();
			$('#view-parties-table').hide();
			$('#view-users-table').hide();
			$('#view-candidates-table').hide();
			$('#view-elections-table').hide();
			$('#view-races-table').hide();

			
            $("#add-election-form").show();
        }

        function viewElectionsTable(){
            console.log('View Candidates Clicked   ');
			$("#admin-panel").hide();
            $('#add-party-form').hide();
			$('#add-candidate-form').hide();
			$('#add-election-form').hide();
			$('#add-race-form').hide();
			$('#add-user-form').hide();
			$('#view-parties-table').hide();
			$('#view-users-table').hide();
			$('#view-candidates-table').hide();
			$('#view-races-table').hide();
			
			$('#electionsTable').DataTable();
            $('#view-elections-table').show();
        }

        function buttonEditElectionAction(actionId){
            //console.log(actionId+' Clicked!');
            var modal = document.getElementById('electionModal');
            var buttons = document.getElementsByName('electionSaveBtn');
            buttons[0].setAttribute('id',actionId);
            buttons[0].setAttribute('onclick','buttonSaveElectionAction('+buttons[0].id+')');
            
            var cand_id = actionId.substring(3, actionId.length);

            //console.log(candidate_id);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/view_election.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var candidate = JSON.parse(xhr.responseText);

							document.getElementById('elec_id').value;
							document.getElementById('elec_date').value;
							document.getElementById('elec_title').value;
                        }
                    }
                    xhr.send("elec_id="+elec_id);


            modal.style.display = "block";

            var span = document.getElementById('electionClose');

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

        function buttonSaveElectionAction(actionId){
            var modal = document.getElementById('electionModal');
            
            var cand_id = document.getElementById('elec_id').value;
            var cand_fname = document.getElementById('elec_date').value;
			var cand_lname = document.getElementById('elec_title').value;
			
         
            //console.log(activeChk);
            //console.log(status);
            //console.log(actionId.getAttribute('id'));

            modal.style.display = "none";

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/save_candidate.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);

                            if(data.length > 0){
                                $('#electionsTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#electionsTableBody').append('<tr><td>' + element['elec_id'] + '</td><td>'
                                            + element['elec_date'] + '</td><td>' 
                                            + element['elec_title'] + '</td><td>'                                  
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['elec_id'] +'" onclick="buttonEditElectionAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['elec_id'] +'" onclick="buttonDeleteElectionAction(this.id, this.elec_id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#electionsTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId.getAttribute('id')+"&elec_date="+elec_date+"&elec_title="+cand_title);


            }

            function buttonDeleteElectionAction(actionId, elec_id){

            console.log(actionId);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/save_election.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);

                            if(data.length > 0){
                                $('#electionsTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#electionsTableBody').append('<tr><td>' + element['elec_id'] + '</td><td>'
                                            + element['elec_date'] + '</td><td>' 
                                            + element['elec_title'] + '</td><td>'
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['elec_id'] +'" onclick="buttonEditElectionAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['elec_id'] +'" onclick="buttonDeleteElectionAction(this.id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#electionsTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId);


            }