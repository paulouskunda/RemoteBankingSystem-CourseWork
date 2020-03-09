<?php
   session_start();
   require '../include/Connection_DB.php';
   $db = new Connection_DB(); 
   $con = $db->connect();
   
   
  // if($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_POST['username']) && $_POST['password']){
      // username and password sent from[] form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE user_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($con,$sql);

      if($row = mysqli_fetch_array($result)){
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: clients.php");
      }else {
         $_SESSION['error'] = "Your Login Name or Password is invalid";
        echo $error;
      }

   }else{
      $error = mysqli_error($con);
   }

   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }

         input{
            width: 100%;
         }

      </style>
      
   </head>
   
   <body style="background-image: url(images/index.jpg);">
      
      <h1 style="text-align: center; margin: 5%;">BANKER LOGIN PAGE</h1>
      <div align="center" >
         
         <div style="width:300px; border: solid 1px #333333; background-color: #fff;" align="left">
            <div style="background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            
            <div style="margin:30px">
               
               <form action = "" method = "post">
                  <?php

                      if (isset($_SESSION['error'])) {
                         # code...
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                      }
                  ?>
                  <label>UserName  :</label>
                  <input type="text" name="username" class="box"/><br/><br/>
                  <label>Password  :</label><input style="width: 100%;" type= "password" name="password" class="box"/><br/><br/>
                  <input type="submit" value="Login" style="color: #fff; background-color: #000;" /><br/>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px">
                  <?php if(isset($error)){
             echo $error;
         }
         ?>
               </div>
               
            </div>
            
         </div>
         
      </div>

   </body>
</html>