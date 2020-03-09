<?php 
	session_start();
	// Create Connection
	require '../include/Connection_DB.php';
	$db = new Connection_DB(); 
	$con = $db->connect();

	//Custom function to get five digits of required for the opening of an account
	function generatedNumber($digits = 5){
	    $i = 0; //counter
	    $pin = ""; //our default pin is blank.
	    while($i < $digits){
	        //generate a random number between 0 and 9.
	        $pin .= mt_rand(0, 9);
	        $i++;
	    }
	    return $pin;
	}


		
	if (isset($_POST['submit'])) {
		# code...
		$cur_date = date("Y-m-d");
		$firstname = mysqli_real_escape_string($con,$_POST['first_name']);
		$lastname = mysqli_real_escape_string($con,$_POST['last_name']);
		$othername = mysqli_real_escape_string($con,$_POST['other_name']);
		$initialbalance = mysqli_real_escape_string($con,$_POST['initial_balance']);
		$account_name = mysqli_real_escape_string($con, $_POST['account_name']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$generatedNumber = generatedNumber();
		$accountNumber = "PE".$generatedNumber."RBS";

		$adminUsername = $_SESSION['login_user'];

		$booleanCheck = true;
		if(is_numeric($initialbalance)){


				while ($booleanCheck) {
					# code...
					$checkAccount = "SELECT * FROM account WHERE account_number ='$accountNumber'";
					$checkQuery = mysqli_query($con, $checkAccount);
					$checkNumRows = mysqli_num_rows($checkQuery);
					if ($checkNumRows <= 0) 
						$booleanCheck = false;
					else
						$accountNumber = "PE".$generatedNumber."RBS";
				}
				

				// check if the account number is already in the system.

					if (!$booleanCheck) {
						# code...
					
					$checkSQL = "SELECT * FROM account WHERE email = '$email'";

					$emailCheck = mysqli_query($con, $checkSQL);
					$varname = mysqli_num_rows($emailCheck);
					if($varname>0){
						$_SESSION['err_message'] =  "email already in database";
						echo "email already in database";
						header("location: forms-basic.php");
					}else {
					# code...
						$insertSQL = "INSERT INTO account(first_name,last_name,other_name,account_number,balance,account_name,email,admin_username,date_created) 
						VALUES ('$firstname', '$lastname','$othername','$accountNumber','$initialbalance','$account_name','$email','$adminUsername','$cur_date')";
						if($insertQuery = mysqli_query($con, $insertSQL)){
							$_SESSION['succ_message'] =  "inserted ".$account_name." with account Number ".$accountNumber;
							echo "inserted ".$account_name." with account Number ".$accountNumber;

							header("location: forms-basic.php");
						}
						else {
							$_SESSION['err_message'] = "error ".mysqli_error($con);
							header("location: forms-basic.php");
						}
					}	



				} 
		
		}else {

			$_SESSION['err_message'] = "Amount entered should not have letters or commas in it, eg 1000 and not K1,000";
			header("location: forms-basic.php");

		} 
		
	}else {
		header("location: forms-basic.php");
	}




?>