<?php

	header('Content-type: application/json; charset=UTF-8');
   
     require_once 'dbcon.php';
 
     if (isset($_POST['race_id']) && !empty($_POST['race_id'])) {
      
         $race_id = intval($_POST['race_id']);
         $query = "SELECT * FROM race WHERE race_id=:race_id";
         $stmt = $DBcon->prepare( $query ); 
         $stmt->execute(array(':race_id'=>$race_id));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);

         echo json_encode($row);
         exit; 
     }


?>
