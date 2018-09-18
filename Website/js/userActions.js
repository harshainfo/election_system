
        function viewAddUser(){
            $('#page-content').children().filter(':not(#add-user-form)').hide();
            $("#add-user-form").show();

        }

        function viewUsersTable(){
            console.log('View users Clicked   ');
            $('#page-content').children().filter(':not(#view-users-table)').hide();
            $('#usersTable').DataTable();
            $('#view-users-table').show();

        }

        function buttonEditUserAction(actionId){
            //console.log(actionId+' Clicked!');
            var modal = document.getElementById('userModal');
            var buttons = document.getElementsByName('userSaveBtn');
            buttons[0].setAttribute('id',actionId);
            buttons[0].setAttribute('onclick','buttonSaveUserAction('+buttons[0].id+')');
            
            var user_id = actionId.substring(3, actionId.length);

            //console.log(user_id);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/view_user.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var user = JSON.parse(xhr.responseText);

                            document.getElementById('user_id').value = user.user_id;
                            document.getElementById('username').value = user.username;
                            document.getElementById('password').value = user.password;
                            document.getElementById('first_name').value = user.first_name;
                            document.getElementById('last_name').value = user.last_name;
                            document.getElementById('email').value = user.email;
                            document.getElementById('phone').value = user.phone;
                            document.getElementById('role').value = user.role;

                        }
                    }
                    xhr.send("user_id="+user_id);


            modal.style.display = "block";

            var span = document.getElementById('userClose');

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

        function buttonSaveUserAction(actionId){
            var modal = document.getElementById('userModal');
            
            var user_id = document.getElementById('user_id').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var first_name = document.getElementById('first_name').value;
            var last_name = document.getElementById('last_name').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;
            var role = document.getElementById('role').value;

            //console.log(activeChk);
            //console.log(status);
            //console.log(actionId.getAttribute('id'));

            modal.style.display = "none";

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/save_user.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);

                            if(data.length > 0){
                                $('#usersTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#usersTableBody').append('<tr><td>' + element['user_id'] + '</td><td>'
                                            + element['username'] + '</td><td>' 
                                            + element['password'] + '</td><td>'
                                            + element['first_name'] + '</td><td>'
                                            + element['last_name'] + '</td><td>' 
                                            + element['phone'] + '</td><td>'
                                            + element['email'] + '</td><td>'
                                            + element['role'] + '</td><td>' 
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['user_id'] +'" onclick="buttonEditUserAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['user_id'] +'" onclick="buttonDeleteUserAction(this.id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#UsersTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId.getAttribute('id')+"&userName="+username+"&password="+password+"&first_name="+first_name+"&last_name="+last_name+"&phone="+phone+"&email="+email+"&role="+role);


            }

            function buttonDeleteUserAction(actionId){

            console.log(actionId);

            var xhr = new XMLHttpRequest();
                    xhr.open("POST", "php/save_user.php", true);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {

                    
                        if(xhr.readyState == 4 && xhr.status == 200){
                            console.log(xhr.responseText);

                            var data = JSON.parse(xhr.responseText);

                            if(data.length > 0){
                                $('#usersTableBody').html('');
                                    $(data).each(function(index,element){
                                        console.log(index); console.log(element);
                                        $('#usersTableBody').append('<tr><td>' + element['user_id'] + '</td><td>'
                                            + element['username'] + '</td><td>' 
                                            + element['password'] + '</td><td>'
                                            + element['first_name'] + '</td><td>'
                                            + element['last_name'] + '</td><td>' 
                                            + element['phone'] + '</td><td>'
                                            + element['email'] + '</td><td>'
                                            + element['role'] + '</td><td>'
                                            + '<button type="button" class="btn btn-primary" id="edi'+ element['user_id'] +'" onclick="buttonEditUserAction(this.id)">Edit</button>'
                                            + '<button type="button" class="btn btn-danger" id="del'+ element['user_id'] +'" onclick="buttonDeleteUserAction(this.id)">Delete</button></td></tr>');
                                    });
                                }else{
                                    $('#usersTableBody').append('');

                                }

                           }
                    }
                    xhr.send("actionId="+actionId);


            }