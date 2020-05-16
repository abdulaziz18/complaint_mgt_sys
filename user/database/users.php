<?php
class users{
	private $db;

	public function __construct($link){
		$this->db = $link;
	}

	public function executeQuery($query){
		$result = $this->db->query($query);
		if(!$result){
			$this->db->error;
		}
		return $result;
	}

	public function create_user($query){
		$result = $this->executeQuery($query);
		if($result){
			echo "Registration is completed.. Thank You";
		}else{
			echo "ERROR::" . $this->db->error;
		}
		
	}

	public function get_user($query){
		$result = $this->executeQuery($query);
		if($result->num_rows > 0){
			while($row = $result->fetch_object()){
				$data[] = $row;
			}
			return $data;
		}else{
			echo "No user found";
		}

		
	}
	public function login($email,$pass){
		$query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
		$result = $this->executeQuery($query);
		if($result->num_rows > 0){
			echo "record found";
			while($row = $result->fetch_object()){
				// $data[] = $row; 
				 $_SESSION['uid'] = $row->uid;
				 $_SESSION['fullName'] = $row->fullName;
				 $_SESSION['email'] = $row->email;
				 $_SESSION['user_logged_in'] = true;
				header('location:user/index.php');
			}
			
		}else{
			echo "Username or password is incorrect";
		}

	}

}


?>