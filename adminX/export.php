<?php 
 require '../include/Connection_DB.php';
   $db = new Connection_DB(); 
   $con = $db->connect();

   if(isset($_POST["export"])) {  
      
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Name', 'Account Number', 'Balance'));  
      $query = "SELECT acc_id, account_name, account_number, balance FROM account ORDER BY acc_id DESC";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>