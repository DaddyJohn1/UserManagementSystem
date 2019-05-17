<!-- <script type="text/javascript"></script> -->
<?php 
require_once 'db.php';
$db = new Database();

if (isset($_POST['register'])) {
	$passport = $_FILES['passport']['name'];
	$passport_tmp = $_FILES['passport']['tmp_name'];
	$passport_size = $_FILES['passport']['size'];

	$target_dir = "images/";
	$target_destination = $target_dir . $passport;

	$firstname = $db->secureSQL($_POST['firstname']);
	$lastname = $db->secureSQL($_POST['lastname']);
	$email = $db->secureSQL($_POST['email']);
	$phonenumber = $db->secureSQL($_POST['phonenumber']);
	$address = $db->secureSQL($_POST['address']);
	$bloodgroup = $_POST['bloodgroup'];


	$firstname = $db->secureInput($firstname);
	$lastname = $db->secureInput($lastname);
	$email = $db->secureInput($email);
	$phonenumber = $db->secureInput($phonenumber);
	$address = $db->secureInput($address);


	$allowed_extension = array('jpg', 'png', 'jpeg');

	$extension = pathinfo($passport, PATHINFO_EXTENSION);


	foreach ($_POST as $key => $value) {
		if (empty($_POST[$key])) {
			$error = ucwords($key) . " is required";
			// echo "<script type='text/javascript'>alert('$error');</script>";
			break;
		}
	}

	/*Passport validation */
	if (!isset($error)) {
		if (empty($passport)) {
			$error = "Passport required";
		}elseif (!in_array($extension, $allowed_extension)) {
			$error = "Image format must be JPG, JPEG or PNG";
		}elseif ($passport_size > 1000000) {
			$error = "Image size exceeds 1MB";
		}else{
			move_uploaded_file($passport_tmp, $target_destination);
		}
	}
		 

	/*Email validation - check if email exist*/
	if (!isset($error)) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid email format";
		}else{
			$email_query = "SELECT * FROM screening WHERE email='{$email}' ";
			$email_result=$db->selectQuery($email_query);
			$db_email = "";

			while ($row = mysqli_fetch_array($email_result)) {
				$db_email = $row['email'];
			}

			if ($email == $db_email) {
					$error = "Email already exist";
			}
		}
	}

	if (!isset($error)) {
		
		$query = "INSERT INTO screening(firstname, lastname, email, phonenumber, address, bloodgroup, gender, passport)";
		$query.= "VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$phonenumber}', '{$address}', '{$bloodgroup}', '{$_POST['gender']}', '{$passport}')";

		$result = $db->insertQuery($query);
		if ($result) {
			$success = "Your information has been submitted\nProceed to login";
			echo "<script type='text/javascript'>alert('$success');</script>";
			// header("Refresh:3;url=index.php");
		}else{
			$error = "Submission not successful";
		}
	}
}

 ?>
