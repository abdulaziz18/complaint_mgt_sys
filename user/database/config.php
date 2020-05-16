<?php 
class database{
	private $host = "localhost";
	private $user = "root";
	private $pwd = "";
	private $db = "complaint";
	public $link;

	public function getConnection(){
		$link = new mysqli($this->host,$this->user,$this->pwd,$this->db);
		if($link->connect_error){
			echo "ERROR::connection failed " . $link->connect_error;
		}
	
		return $link;
	}

}



?>