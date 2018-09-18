<?php
  
     header('Content-type: application/json; charset=UTF-8');
   
     require_once 'dbcon.php';
 
     if (isset($_POST['vid']) && !empty($_POST['vid'])) {
      
         $vid = intval($_POST['vid']);
         $query = "SELECT * FROM voter WHERE voter_id=:vid";
         $stmt = $DBcon->prepare( $query ); 
         $stmt->execute(array(':vid'=>$vid));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);       
         echo json_encode($row);
         exit; 
     }
     ?>