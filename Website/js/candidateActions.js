
        function viewAddCandidate(){
            $("#admin-panel").hide();
			$('#add-party-form').hide();
			$('#add-election-form').hide();
			$('#add-race-form').hide();
			$('#add-user-form').hide();
			$('#view-parties-table').hide();
			$('#view-users-table').hide();
			$('#view-candidates-table').hide();
			$('#view-elections-table').hide();
			$('#view-races-table').hide();
			
            $("#add-candidate-form").show();
        }

        function viewCandidatesTable(){
            console.log('View Candidates Clicked   ');
			$("#admin-panel").hide();
            $('#add-party-form').hide();
			$('#add-candidate-form').hide();
			$('#add-election-form').hide();
			$('#add-race-form').hide();
			$('#add-user-form').hide();
			$('#view-parties-table').hide();
			$('#view-users-table').hide();
			$('#view-elections-table').hide();
			$('#view-races-table').hide();
			
			$('#candidatesTable').DataTable();
            $('#view-candidates-table').show();
        }

        function buttonEditCandidateAction(actionId){
            //console.log(actionId+' Clicked!');
            var modal = document.getElementById('candidateModal');
            var buttons = document.getElementsByName('candidateSaveBtn');
            buttons[0].setAttribute('id',actionId);
            buttons[0].setAttribute('onclick','buttonSaveCandidateAction('+buttons[0].id+')');
            
            var cand_id = actionId.substring(3, actionId.length);

            //console.log(candidate_id);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/view_candidate.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var candidate = JSON.parse(xhr.responseText);

							document.getElementById('cand_id').value;
							document.getElementById('cand_fname').value;
							document.getElementById('cand_lname').value;
							document.getElementById('cand_dob').value;
							document.getElementById('date_created').value;
							document.getElementById('gender').value;
							document.getElementById('civil_status').value;
							document.getElementById('cand_add1').value;
							document.getElementById('cand_add2').value;
							document.getElementById('cand_city').value;
							document.getElementById('cand_state').value;
							document.getElementById('cand_zipcode').value;
							document.getElementById('cand_phone').value;
							document.getElementById('cand_email').value;
							document.getElementById('curr_party').value;

                        }
                    }
                    xhr.send("cand_id="+cand_id);


            modal.style.display = "block";

            var span = document.getElementById('candidateClose');

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

        function buttonSaveCandidateAction(actionId){
            var modal = document.getElementById('candidateModal');
            
            var cand_id = document.getElementById('cand_id').value;
            var cand_fname = document.getElementById('cand_fname').value;
			var cand_lname = document.getElementById('cand_lname').value;
			var cand_dob = document.getElementById('cand_dob').value;
			var gender = document.getElementById('gender').value;
            var civil_status = document.getElementById('civil_status').value;
			var cand_add1 = document.getElementById('cand_add1').value;
			var cand_add2 = document.getElementById('cand_add2').value;
			var cand_city = document.getElementById('cand_city').value;
			var cand_state = document.getElementById('cand_state').value;
			var cand_zipcode = document.getElementById('cand_zipcode').value;
			var cand_phone = document.getElementById('cand_phone').value;
			var cand_email = document.getElementById('cand_email').value;
			var curr_party = document.getElementById('curr_party').value;
         
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
                                $('#candidatesTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#candidatesTableBody').append('<tr><td>' + element['cand_id'] + '</td><td>'
                                            + element['cand_fname'] + '</td><td>' 
                                            + element['cand_lname'] + '</td><td>'
                                            + element['cand_dob'] + '</td><td>'
											+ element['gender'] + '</td><td>' 
                                            + element['civil_status'] + '</td><td>'
                                            + element['cand_add1'] + '</td><td>'
											+ element['cand_add2'] + '</td><td>' 
                                            + element['cand_city'] + '</td><td>'
                                            + element['cand_state'] + '</td><td>'
											+ element['cand_zipcode'] + '</td><td>' 
                                            + element['cand_phone'] + '</td><td>'
                                            + element['cand_email'] + '</td><td>'
											+ element['cand_party'] + '</td><td>'                                          
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['cand_id'] +'" onclick="buttonEditCandidateAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['cand_id'] +'" onclick="buttonDeleteCandidateAction(this.id, this.cand_id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#candidatesTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId.getAttribute('id')+"&cand_fname="+cand_fname+"&cand_lname="+cand_lname+"&status="+status);


            }

            function buttonDeleteCandidateAction(actionId, cand_id){

            console.log(actionId);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/save_candidate.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);

                            if(data.length > 0){
                                $('#candidatesTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#candidatesTableBody').append('<tr><td>' + element['party_id'] + '</td><td>'
                                            + element['cand_fname'] + '</td><td>' 
                                            + element['cand_lname'] + '</td><td>'
                                            + element['cand_dob'] + '</td><td>'
											+ element['gender'] + '</td><td>' 
                                            + element['civil_status'] + '</td><td>'
                                            + element['cand_add1'] + '</td><td>'
											+ element['cand_add2'] + '</td><td>' 
                                            + element['cand_city'] + '</td><td>'
                                            + element['cand_state'] + '</td><td>'
											+ element['cand_zipcode'] + '</td><td>' 
                                            + element['cand_phone'] + '</td><td>'
                                            + element['cand_email'] + '</td><td>'
											+ element['cand_party'] + '</td><td>' 
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['cand_id'] +'" onclick="buttonEditElectionAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['cand_id'] +'" onclick="buttonDeleteElectionAction(this.id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#candidatesTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId);


            }