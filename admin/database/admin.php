<?php

class admin{
	private $db;
	public function __construct($link){
		$this->db = $link;
	}

	public function executeQuery($query){
		$result = $this->db->query($query);
		if(!$result){
			$result->error;
		}
		return $result;
	}

	public function login($username,$pass){

		$query = "SELECT * FROM admin WHERE username='$username' AND password='$pass'";
		$result = $this->executeQuery($query);
		if($result->num_rows > 0){
			while($row = $result->fetch_object()){
				$_SESSION['fullName'] = $row->fullName;
				$_SESSION['admin_logged_in'] = true;
				header('location:admin/index.php');
			}

		}else{
			echo "Username or password is incorrect";
		}

	}

}


?>