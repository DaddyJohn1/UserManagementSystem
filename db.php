<?php 

class Database{

	private $host ="localhost";
	private $user = "root";
	private $password ="";
	private $name = "user_account";
	private $conn;


	function __construct(){
		$this->conn = $this->connectDB();
	}

	function connectDB()	{
		$conn = mysqli_connect($this->host, $this->user, $this->password, $this->name);
		return $conn;
	}

	function insertQuery($query){
		$result = mysqli_query($this->conn, $query);
		if (!$result) {
			die('QUERY FAILED ' . mysqli_error($this->conn));
		}else{
			return $result;
		}
	}

	function secureInput($data){
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		return $data;
	}

	function secureSQL($value){
		$value = mysqli_real_escape_string($this->conn, $value);
		return $value;
	}

	function selectQuery($query){
		$result = mysqli_query($this->conn, $query);
		if (!$result) {
			die("QUERY FAILED" . mysqli_error($this->conn));
		}else{
			return $result;
		}
	}

	function protectPassword($password){
		$hash = "$2y$10$";
		$salt = "iwantthepasswordtobe22";
		$hash_salt = $hash . $salt;
		$password = crypt($password, $hash_salt);
		return $password;
	}

	function updatePassword($query){
		$result= mysqli_query($this->conn, $query);
		if (!$result) {
			die("QUERY FAILED" . mysqli_error($this->conn));
		}else{
			return $result;
		}
	}

	function changePassword($query){
		$result= mysqli_query($this->conn, $query);
		if (!$result) {
			die("QUERY FAILED" . mysqli_error($this->conn));
		}else{
			return $result;
		}
	}

}
/*end of class database*/


 ?>