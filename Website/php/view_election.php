<?php

	header('Content-type: application/json; charset=UTF-8');
   
     require_once 'dbcon.php';
 
     if (isset($_POST['elec_id']) && !empty($_POST['elec_id'])) {
      
         $cand_id = intval($_POST['elec_id']);
         $query = "SELECT * FROM election WHERE elec_id=:elec_id";
         $stmt = $DBcon->prepare( $query ); 
         $stmt->execute(array(':elec_id'=>$elec_id));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);

         echo json_encode($row);
         exit; 
     }


?>
