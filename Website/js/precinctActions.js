
        function viewAddPrecinct(){
            $("#admin-panel").hide();
            $("#add-precinct-form").show();

        }

        function viewPrecinctsTable(){
            console.log('View Precincts Clicked   ');
            $("#admin-panel").hide();
            $('#precinctsTable').DataTable();
            $('#view-precincts-table').show();

        }

      