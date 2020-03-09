<?php
session_start();
$con = mysqli_connect('localhost','root','', 'course_work');
if (isset($_POST['submit'])) {

	// $id = mysqli_real_escape_string($con, $_POST['id']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$con_password = mysqli_real_escape_string($con,$_POST['confirm_password']);

	if ($password == '' || $password == null) {
		# code...

		$_SESSION['err_create_message'] = "Password can't be null";
		header("location: forms-basic.php");
	} else {
		# code...
		if ($password == $con_password) {
			# code...

 			$pass = md5($password);


			$insertSQL = "INSERT INTO client (email, password) VALUES ('$email','$pass')";
			if ($insertQuery = mysqli_query($con, $insertSQL)){
				$_SESSION['suc_message'] = "Client ".$email." was successfully added";
				header("location: forms-basic.php");
			}else {
					$_SESSION['err_create_message'] = "Error ".mysqli_error($con);
					header("location: forms-basic.php");
			}

		} else {
					$_SESSION['err_create_message'] = "Passwords don't match";
					header("location: forms-basic.php");
		}
	}
	
	

	
} else  {
	header("location: forms-basic.php");
}

?>