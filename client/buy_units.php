<?php
	session_start();
	//GET CONNECTION VARIABLE
 	require '../include/Connection_DB.php';
    $db = new Connection_DB(); 
    $con = $db->connect();
if (isset($_POST['submit'])) {
	/*use mysqli_real_escape_string to handle sql injections
		* @param connection variable and value from the form.
		*/
			$amount = mysqli_real_escape_string($con, $_POST['amount']);
			//Variable for checking_account balance
			$current_balance = '';
			$new_zesco_balance = '';
			$trans_cur_date = date("Y-m-d");
			$remark = "buying of Zesco units";

				$account_number = "ZESCO";
				$sender_ = $_SESSION['account_number'];
	if(is_numeric($amount)){

				// QUERY THE DATABASE TO CHECK IF THE USER MAKING THE TRANSFER HAS MORE THE MONEY THEY WANT TO SEND
			$checkSQL = "SELECT * FROM account WHERE account_number = '$sender_'";
			$checkQuery = mysqli_query($con, $checkSQL);
			$checkNumRows = mysqli_num_rows($checkQuery);

			if($checkNumRows > 0){
				while($checkRows = mysqli_fetch_assoc($checkQuery))
				{
					$current_balance = $checkRows['balance'];
				}
			}

				// QUERY THE DATABASE TO CHECK IF THE USER MAKING THE TRANSFER HAS MORE THE MONEY THEY WANT TO SEND
			$checkSQL = "SELECT * FROM COOPERATE WHERE cop_account_num = '$account_number'";
			$checkQuery = mysqli_query($con, $checkSQL);
			$checkNumRows = mysqli_num_rows($checkQuery);

			if($checkNumRows > 0){
				while($checkRows = mysqli_fetch_assoc($checkQuery))
				{
					$new_zesco_balance = $checkRows['balance'];
				}
			}
			//check if the current balance is greater than the amount been sent.
							// else send a message to the user that the request action can't take place.
			if ($current_balance >= $amount){
				$new_balance = $current_balance - $amount;
				$new_zesco_ = $new_zesco_balance + $amount;

				$updateSQL = "UPDATE ACCOUNT SET BALANCE = '$new_balance' WHERE account_number = '$sender_'";
				//check if update was successfull before inserting into the transacion table

				if ($updateQuery = mysqli_query($con, $updateSQL)){


					$updateInternalSQL = "UPDATE COOPERATE SET BALANCE = '$new_zesco_' WHERE COP_account_num = '$account_number'";
					//check if update was successfull before inserting into the transacion table

					if ($updateInternalQuery = mysqli_query($con, $updateInternalSQL)){

						//run the insert query into the database
							$insertSQL = "INSERT INTO utility_transactions (client_acc_no, utility_acc_no,transaction_amount,trans_date,remark) VALUES ('$sender_','$account_number','$amount','$trans_cur_date','$remark')";



							if ($insertQuery = mysqli_query($con, $insertSQL)){
								$_SESSION['con_message'] = "Units worth ZMK ".$amount." have been bought";
													header("location: forms-basic.php");
							}else {
									$_SESSION['err_trans_message'] = 'Try again later '.mysqli_error($con);
									header("location: forms-basic.php");
							}


					} else {
									$_SESSION['err_trans_message'] = 'Try again later '.mysqli_error($con);
				header("location: forms-basic.php");

					}
				}else {
					$_SESSION['err_trans_message'] = 'Try again later '.mysqli_error($con);
				header("location: forms-basic.php");
				}
			}else {
				$_SESSION['err_trans_message'] = 'You don\'t have enoung funds';
				header("location: forms-basic.php");
			}

 }else{

					$_SESSION['err_trans_message'] = "Amount entered should not have letters or commas in it, eg 1000 and not K1,000";
					// echo "Sorry we don't have this <strong>".$account_number."</strong> account number in our system.".mysqli_error($con);
					 header("location: forms-basic.php");
		}
}

?>