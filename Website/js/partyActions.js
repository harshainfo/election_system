
        function viewAddParty(){
            $("#admin-panel").hide();
            $("#add-party-form").show();

        }

        function viewPartiesTable(){
            console.log('View Parties Clicked   ');
            $("#admin-panel").hide();
            $('#partiesTable').DataTable();
            $('#view-parties-table').show();

        }

        function buttonEditPartyAction(actionId){
            //console.log(actionId+' Clicked!');
            var modal = document.getElementById('partyModal');
            var buttons = document.getElementsByName('partySaveBtn');
            buttons[0].setAttribute('id',actionId);
            buttons[0].setAttribute('onclick','buttonSavePartyAction('+buttons[0].id+')');
            
            var party_id = actionId.substring(3, actionId.length);

            //console.log(party_id);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/view_party.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var party = JSON.parse(xhr.responseText);

                            document.getElementById('party_id').value = party.party_id;
                            document.getElementById('party_name').value = party.party_name;
                            document.getElementById('date_created').value = party.date_created;
                            if(party.status == 'active'){
                                //console.log('In active');
                                document.getElementById('activeChk').checked = true ;
                            }else{
                                //console.log('In active Else');
                                document.getElementById('activeChk').checked = false ;
                            }
                            //console.log('Out active');
                            //inputPartyId;


                        }
                    }
                    xhr.send("party_id="+party_id);


            modal.style.display = "block";

            var span = document.getElementById('partyClose');

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

        function buttonSavePartyAction(actionId){
            var modal = document.getElementById('partyModal');
            
            var party_id = document.getElementById('party_id').value;
            var party_name = document.getElementById('party_name').value;
            var date_created = document.getElementById('date_created').value;
            var activeChk = document.getElementById('activeChk').checked;
            var status;
            if(activeChk == true){
                status = 'active';
            }else{
                status = 'inactive';
            }


            //console.log(activeChk);
            //console.log(status);
            //console.log(actionId.getAttribute('id'));

            modal.style.display = "none";

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/save_party.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);

                            if(data.length > 0){
                                $('#partiesTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#partiesTableBody').append('<tr><td>' + element['party_id'] + '</td><td>'
                                            + element['party_name'] + '</td><td>' 
                                            + element['date_created'] + '</td><td>'
                                            + element['status'] + '</td><td>'
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['party_id'] +'" onclick="buttonEditPartyAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['party_id'] +'" onclick="buttonDeletePartyAction(this.id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#partiesTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId.getAttribute('id')+"&partyName="+party_name+"&dateCreated="+date_created+"&status="+status);


            }

            function buttonDeletePartyAction(actionId){

            console.log(actionId);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/save_party.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);

                            if(data.length > 0){
                                $('#partiesTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#partiesTableBody').append('<tr><td>' + element['party_id'] + '</td><td>'
                                            + element['party_name'] + '</td><td>' 
                                            + element['date_created'] + '</td><td>'
                                            + element['status'] + '</td><td>'
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['party_id'] +'" onclick="buttonEditPartyAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['party_id'] +'" onclick="buttonDeletePartyAction(this.id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#partiesTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId);


            }