<?php

	header('Content-type: application/json; charset=UTF-8');
   
     require_once 'dbcon.php';
 
     if (isset($_POST['party_id']) && !empty($_POST['party_id'])) {
      
         $party_id = intval($_POST['party_id']);
         $query = "SELECT * FROM party WHERE party_id=:party_id";
         $stmt = $DBcon->prepare( $query ); 
         $stmt->execute(array(':party_id'=>$party_id));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);

         echo json_encode($row);
         exit; 
     }


?>