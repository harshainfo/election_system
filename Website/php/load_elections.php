<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



header('Content-type: application/json; charset=UTF-8');

require_once 'dbcon.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['actionId']) && !empty($_POST['actionId'])) {

 $actionId = strval($_POST['actionId']);
 $action = substr($actionId, 0, 3);
 $vid = intval(substr($actionId, 3, (strlen($actionId)-3)));

   if($action == 'aut'){
      
      $queryElections = "SELECT e.elec_id, e.elec_date, e.elec_title FROM election e, election_race er, precinct p, precinct_egu pe, egu eg, race r, vot_loc_history vlh, voter_history vh WHERE e.elec_id = er.elec_id AND er.race_id = r.race_id AND r.egu_id = eg.egu_id AND eg.egu_id=pe.egu_id AND pe.prec_id=p.prec_id AND p.prec_id = vlh.prec_id AND vlh.vot_loc_hist_id = vh.vot_loc_hist_id AND vh.end_date IS NULL AND vh.status LIKE 'Registered' AND vh.voter_id = :vid";
         $stmt = $DBcon->prepare( $queryElections ); 
         $stmt->execute(array(':vid'=>$vid));
         $rows = $stmt->fetchAll();
         echo json_encode($rows);
        
         
         exit; 
   }



   }

   
?>