<?php
  session_start();
   require '../include/Connection_DB.php';
    $db = new Connection_DB(); 
    $con = $db->connect();

if (isset($_POST['newSubmit'])) {
    		# code...
    		 $isOldChecked = true;
    			echo "Calling me";
    	 	$new_pass = $_POST['new_password'];
    	 	$confirm_pass = $_POST['confirm_password'];

    	 	if ($new_password == $confirm_password) {
    	 		# code...
    	 	


	    		if (md5($new_pass) != $oldNeedToChangePassWord) {
	    			# code...
	    		
	    		// $checkSQL = "UPDATE client SET password where email ='$email'";
	    		// $checkMysql = mysqli_query($con, $checkSQL);

	    		}else {
	    			$_SESSION['new_message'] = "Use a different password";
	    		}

	    	} else {
	    			$_SESSION['new_message'] = "Password don't match";
	    	}
    	}
?>