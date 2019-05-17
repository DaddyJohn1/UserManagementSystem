<?php session_start(); 
require '../db.php'; 
 $db = new Database(); 

$mail = $_SESSION['email'];



if (isset($_POST['submit'])) {

	$password =$db->secureSQL($_POST['password']);
	$confirm_password =$db->secureSQL($_POST['confirm_password']);

	$password =$db->protectPassword($password);
	$confirm_password =$db->protectPassword($confirm_password);
	

	foreach ($_POST as $key => $value) {
		if (empty($_POST[$key])) {
			$error = "Password fields required";
			break;
		}
	}
	
	/*Password verifiation*/
	if (!isset($error)) {
		if ($password !== $confirm_password) {
			$error = "Passwords must be the same";
		}
	}
	
	/*update record*/
	if (!isset($error)) {
		$query = "UPDATE account SET ";
		$query.= "password = '$password', ";
		$query.= "confirm_password = '$confirm_password' ";
		$query.= "WHERE email = '$mail' ";

		$result = $db->updatePassword($query);
		$success = "Password reset was successful.\n Redirecting . . .";
		header("Refresh:3;url=../index.php");
	}

	

}
	
				
			
?>