<?php 
require_once '../db.php';
$db = new Database();


if (isset($_POST['change_password'])) {

	$current_password = $_POST['current_password'];
	$new_password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];

	$current_password = $db->secureSQL($current_password);
	$new_password = $db->secureSQL($new_password);
	$confirm_password = $db->secureSQL($confirm_password);

	$current_password = $db->protectPassword($current_password);
	$new_password = $db->protectPassword($new_password);
	$confirm_password = $db->protectPassword($confirm_password);

	/*current password validation*/
	foreach ($_POST as $key => $value) {
		if (empty($_POST)) {
			$error = "Required fields";
		}
	}

	if (!isset($error)) {
		if ($new_password !== $confirm_password) {
			$error = "New passwords must match";
		}
	}

	if (!isset($error)) {
		$change_query = "SELECT * FROM account WHERE password = '{$current_password}' ";
		$result = $db->selectQuery($change_query);

		$db_password = "";
		while ($row = mysqli_fetch_array($result)) {
			$db_password = $row['password'];
		}
		if ($current_password == $db_password) {
			$query = "UPDATE account SET ";
			$query.= "password = '$new_password', ";
			$query.= "confirm_password = '$confirm_password' ";
			$query.= "WHERE password = '$current_password' ";

			$result = $db->updatePassword($query);
			$success = "Password changed successfully.\nRedirecting to login . . . ";
			header("Refresh:3;url=../admin/includes/logout.php");
		}else{
			$error = "Your current password was incorrect";
		}
	}








	
}




?>