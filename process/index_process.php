<?php
session_start();

require_once 'db.php';
$db = new Database();

if (isset($_POST['login'])) {

	$jamb_number = $_POST['jamb_number'];
	$password = $_POST['password'];
	
	$jamb_number = $db->secureSQL($jamb_number);
	$password = $db->secureSQL($password);
	
	$jamb_number = $db->secureInput($jamb_number);
	// $password = $db->protectPassword($password);
	
	foreach ($_POST as $key => $value) {
			if (empty($_POST[$key])) {
				$error = "Enter login details";
				break;
			}
	}

	if (!isset($error)) {
		$query = "SELECT * FROM screening WHERE jamb_number='{$jamb_number}' ";
		$result = $db->selectQuery($query);
	
		$db_firstname = $db_password = $db_passport=$db_jamb = "";
		while ($row = mysqli_fetch_array($result)) {
			$db_jamb = $row['jamb_number'];
			$db_password = $row['password'];
			$db_passport = $row['passport'];
			$db_firstname = $row['firstname'];
		}

		if ($jamb_number !== $db_jamb && $password!==$db_password) {
			$error = "Incorrect login details";
		}elseif ($jamb_number == $db_jamb && $password==$db_password) {
			$_SESSION['jamb_number'] = $db_jamb;
			$_SESSION['passport'] = $db_passport;
			$_SESSION['firstname'] = $db_firstname;
			header("Location: admin");
		}else{
			$error = "Invalid username or password";
		}


	}

	

}			

?>