<?php

	header('Content-type: application/json; charset=UTF-8');
   
     require_once 'dbcon.php';
 
     if (isset($_POST['cand_id']) && !empty($_POST['cand_id'])) {
      
         $cand_id = intval($_POST['cand_id']);
         $query = "SELECT * FROM candidate WHERE cand_id=:cand_id";
         $stmt = $DBcon->prepare( $query ); 
         $stmt->execute(array(':cand_id'=>$cand_id));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);

         echo json_encode($row);
         exit; 
     }


?>
