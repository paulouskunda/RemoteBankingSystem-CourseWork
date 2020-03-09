<?php  
 require '../include/Connection_DB.php';
   $db = new Connection_DB(); 
   $con = $db->connect();

  //this will go in a while loop but for now
    $getAllClients = "SELECT * FROM account";
    $getClientsQuery = mysqli_query($con, $getAllClients);
    $getClientsnumb = mysqli_num_rows($getClientsQuery); 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export Mysql Table Data to CSV file in PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Export Mysql Table Data to CSV file in PHP</h2>  
                <h3 align="center">Employee Data</h3>                 
                <br />  
                <form method="post" action="export.php" align="center">  
                     <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
                </form>  
                <br />  
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="25%">Name</th>  
                               <th width="35%">Account Number</th>  
                              <th width="35%">Balance</th> 
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($getClientsQuery))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["acc_id"]; ?></td>  
                               <td><?php echo $row["account_name"]; ?></td>  
                               <td><?php echo $row["account_number"]; ?></td>  
                               <td><?php echo $row["balance"]; ?></td>  
                          </tr>  
                     <?php       
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>

