<?php
class complaint{
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
	public function create_complaint($query){
		$result = $this->executeQuery($query);
		if($result){
			echo "Complaint has been lodged successfully..";
		}else{
			echo $this->db->error;
		}
	}
	public function get_complaints_by_uid($query){
		
		$result = $this->executeQuery($query);
		if($result->num_rows > 0){
			while($row = $result->fetch_object()){
				$data[] = $row;
			}
			return $data;
		}else{
			"You don't have any complaint yet";
		}
	}

	public function get_data($query){
		$result = $this->executeQuery($query);
		if($result->num_rows > 0){
			while($row = $result->fetch_object()){
				$data[] = $row;
			}
			return $data;
		}
	}


}


?>