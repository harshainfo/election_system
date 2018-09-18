<?php

	header('Content-type: application/json; charset=UTF-8');
   
     require_once 'dbcon.php';
 
     if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
      
         $user_id = intval($_POST['user_id']);
         $query = "SELECT * FROM user WHERE user_id=:user_id";
         $stmt = $DBcon->prepare( $query ); 
         $stmt->execute(array(':user_id'=>$user_id));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);

         echo json_encode($row);
         exit; 
     }


?>