<?php

	header('Content-type: application/json; charset=UTF-8');
   
     require_once 'dbcon.php';
 
     if (isset($_POST['prec_id']) && !empty($_POST['prec_id'])) {
      
         $user_id = intval($_POST['prec_id']);
         $query = "SELECT * FROM precinct WHERE prec_id=:prec_id";
         $stmt = $DBcon->prepare( $query ); 
         $stmt->execute(array(':prec_id'=>$prec_id));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);

         echo json_encode($row);
         exit; 
     }


?>