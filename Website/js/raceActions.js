
        function viewAddRace(){
            $("#admin-panel").hide();
			$('#add-party-form').hide();
			$('#add-election-candidate').hide();
			$('#add-candidate-form').hide();
			$('#add-user-form').hide();
			$('#view-parties-table').hide();
			$('#view-users-table').hide();
			$('#view-candidates-table').hide();
			$('#view-elections-table').hide();
			$('#view-races-table').hide();

            $("#add-race-form").show();
        }

        function viewRacesTable(){
            console.log('View Parties Clicked   ');
			$("#admin-panel").hide();
            $('#add-party-form').hide();
			$('#add-candidate-form').hide();
			$('#add-election-form').hide();
			$('#add-race-form').hide();
			$('#add-user-form').hide();
			$('#view-parties-table').hide();
			$('#view-users-table').hide();
			$('#view-candidates-table').hide();
			$('#view-elections-table').hide();
			

			$('#racesTable').DataTable();
            $('#view-races-table').show();

        }

        function buttonEditRaceAction(actionId){
            //console.log(actionId+' Clicked!');
            var modal = document.getElementById('raceModal');
            var buttons = document.getElementsByName('raceSaveBtn');
            buttons[0].setAttribute('id',actionId);
            buttons[0].setAttribute('onclick','buttonSaveRaceAction('+buttons[0].id+')');
            
            var race_id = actionId.substring(3, actionId.length);

            //console.log(race_id);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/view_race.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var race = JSON.parse(xhr.responseText);

                            document.getElementById('race_id').value = race.race_id;
                            document.getElementById('race_title').value = race.race_title;
                            document.getElementById('race_type').value = race.race_type;
							document.getElementById('elec_id').value = race.elec_id;
							document.getElementById('egu_id').value = race.egu_id;
                            
                            //console.log('Out active');
                            //inputPartyId;


                        }
                    }
                    xhr.send("race_id="+race_id);


            modal.style.display = "block";

            var span = document.getElementById('raceClose');

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

        function buttonSaveRaceAction(actionId){
            var modal = document.getElementById('partyModal');
            
            var race_id = document.getElementById('race_id').value;
            var race_title = document.getElementById('race_title').value;
            var race_type = document.getElementById('race_type').value;
            var elec_id = document.getElementById('elec_id').checked;
			var egu_id = document.getElementById('egu_id').value;

            var status;
            
            modal.style.display = "none";

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/save_race.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);

                            if(data.length > 0){
                                $('#partiesTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#racesTableBody').append('<tr><td>' + element['race_id'] + '</td><td>'
                                            + element['race_title'] + '</td><td>' 
                                            + element['race_type'] + '</td><td>'
                                            + element['elec_id'] + '</td><td>'
											+ element['egu_id'] + '</td><td>'
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['race_id'] +'" onclick="buttonEditRaceAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['race_id'] +'" onclick="buttonDeleteRaceAction(this.id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#racesTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId.getAttribute('id')+"&race_title="+race_title+"&race_type="+race_type+"&elec_id ="+elec_id+"&egu_id  ="+egu_id );


            }

            function buttonDeleteRaceAction(actionId){

            console.log(actionId);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/save_race.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);

                            if(data.length > 0){
                                $('#racesTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#racesTableBody').append('<tr><td>' + element['race_id'] + '</td><td>'
                                            + element['race_title'] + '</td><td>' 
                                            + element['race_type'] + '</td><td>'
                                            + element['elec_id'] + '</td><td>'
											+ element['egu_id'] + '</td><td>'
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['race_id'] +'" onclick="buttonEditRaceAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['race_id'] +'" onclick="buttonDeleteRaceAction(this.id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#racesTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId);


            }