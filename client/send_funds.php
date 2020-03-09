<?php
	session_start();
	//GET CONNECTION VARIABLE
 	require '../include/Connection_DB.php';
    $db = new Connection_DB(); 
    $con = $db->connect();

	$_SESSION['error_trans_message'] = null;
	$_SESSION['confirm_message'] = null;

	date_default_timezone_set("Africa/Harare");
	//check if the submit button was pressed before calling this page
	if (isset($_POST['submit'])) {
	 	# code...

		/*use mysqli_real_escape_string to handle sql injections
		* @param connection variable and value from the form.
		*/

		$account_number = mysqli_real_escape_string($con, $_POST['account_num']);
		$amount = mysqli_real_escape_string($con, $_POST['amount']);
		//Variable for checking_account balance
		$current_balance = '';
		$receiver_current_balance = '';
		$trans_cur_date  = date("Y-m-d");
		$remark = "transacion of funds to ".$account_number;
		$sender_ = $_SESSION['account_number'];

		if (is_numeric($amount)) {
		 	# code...
		 
				//check if the account number provided is valid.
				$verifyAccount =  "SELECT * FROM account WHERE account_number = '$account_number'";
				$verifyQuery = mysqli_query($con,$verifyAccount);
				$verifyNum = mysqli_num_rows($verifyQuery);

				if($verifyNum > 0){
					$reciverrows = mysqli_fetch_assoc($verifyQuery);
					$receiver_current_balance = $reciverrows['balance'];
						// QUERY THE DATABASE TO CHECK IF THE USER MAKING THE TRANSFER HAS MORE THE MONEY THEY WANT TO SEND
						$checkSQL = "SELECT * FROM account WHERE account_number = '$sender_'";
						$checkQuery = mysqli_query($con, $checkSQL );

						$checkNumRows = mysqli_num_rows($checkQuery);


						if ($checkNumRows > 0) {
							# code...
							while ($checkRows = mysqli_fetch_assoc($checkQuery)) {
								# code...
								$current_balance = $checkRows['balance'];
							}




						}

						if ($sender_ != $account_number) {
						 	# code...
						 

						//check if the current balance is greater than the amount been sent.
						// else send a message to the user that the request action can't take place.

						if ($current_balance >= $amount) {
							# code...

							$new_balance = $current_balance - $amount;
							//update the account table balance column first

							$updateSQL = "UPDATE ACCOUNT SET BALANCE = '$new_balance' WHERE account_number = '$sender_'";
							//check if update was successfull before inserting into the transacion table
							if ($updateQuery = mysqli_query($con, $updateSQL)) {
								# code...
								$new_receiver = $receiver_current_balance + $amount;
								//update the receiver account balance secondly 
								$updateReciverSQL = "UPDATE ACCOUNT SET BALANCE = '$new_receiver' WHERE account_number = '$account_number'";
								if (mysqli_query($con, $updateReciverSQL)) {
									# code...
								
								//run the insert query into the database

									$insertSQL = "INSERT INTO transactions(sender_acc_no, receiver_acc_no,transaction_amount,trans_date,remark) VALUES('$sender_','$account_number','$amount','$trans_cur_date','$remark')";
									
									$insertDeb = "INSERT INTO debit(account_number) VALUES('$account_number') ";

									$insertCred = "INSERT INTO credit(account_number) VALUES ('$sender_')";
									
									if ($insertQuery = mysqli_query($con, $insertSQL)) {
										# code...
										$_SESSION['confirm_message'] = "Transacion of ZMK ".$amount." to account number ".$account_number;
												header("location: forms-basic.php");
										


									}else {
										$_SESSION['error_trans_message'] = 'Try again later';
										echo "We encountered an error type \n".mysqli_error($con);
										header("location: forms-basic.php");
									}

								} else {
									echo "We encountered an error type \n".mysqli_error($con);
									// $_SESSION['error_trans_message'] = 'Try again later';
										// header("location: forms-basic.php");
								}

							}else {
								echo "We encountered an error type \n".mysqli_error($con);
								$_SESSION['error_trans_message'] = 'Try again later '.mysqli_error($con);
										// header("location: forms-basic.php");
							}


						} else {
							$_SESSION['error_trans_message'] = "sorry funds not enough, you can only send ".number_format($current_balance)." or lower";
							echo "sorry funds not enough, you can only send ".number_format($current_balance)." or lower";
							header("location: forms-basic.php");
							// echo "sorry funds not enough, you can only send ".$current_balance." or lower";
						}

					}else {
						$_SESSION['error_trans_message'] = "You cannot send yourself money using this system.";
						echo "You cannot send yourself money using this system.";
						 header("location: forms-basic.php");
						// echo "You cannot send yourself money using this system.";

					}

				} else {
					$_SESSION['error_trans_message'] = "Sorry we don't have this <strong>".$account_number."</strong> account number in our system.";
					echo "Sorry we don't have this <strong>".$account_number."</strong> account number in our system.".mysqli_error($con);
					 header("location: forms-basic.php");
					// echo "Sorry we don't have this <strong>".$account_number."</strong> account number in our system.";
				}
		} else{

					$_SESSION['error_trans_message'] = "Amount entered should not have letters or commas in it, eg 1000 and not K1,000";
					// echo "Sorry we don't have this <strong>".$account_number."</strong> account number in our system.".mysqli_error($con);
					 header("location: forms-basic.php");
		}

	 } 


?>