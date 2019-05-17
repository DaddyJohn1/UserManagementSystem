<?php session_start();
require '../db.php'; 
 $db = new Database(); 





if (isset($_POST['submit'])) {

	$email =$db->secureSQL($_POST['email']);

	if (empty($email)) {
		$error = "Please provide email";
	}

	/*Email verifiation*/
	if (!isset($error)) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Invalid email format";
		}else{
			$reset_query = "SELECT * FROM account WHERE email='{$email}' ";
			$reset_result=$db->selectQuery($reset_query);
		
			$db_email = "";
			while ($row = mysqli_fetch_array($reset_result)) {
				$db_email = $row['email'];
			}
			if ($email == $db_email) {
				$_SESSION['email'] = $db_email;
				header("Location:reset_pass.php");
			}else{
				$error = "Account not found!";
			}
		}

	}

	

}
	
				
			
?>