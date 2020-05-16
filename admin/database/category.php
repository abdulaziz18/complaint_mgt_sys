<?php 
class category{
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
	public function add_data($query){
		$result = $this->executeQuery($query);
		if($result){
			echo "Info added successfully";
		}
	}


	public function get_data($query){
		$result = $this->executeQuery($query);
		if($result->num_rows > 0){
			while($row = $result->fetch_object()){
				$data[] = $row;
			}
			return $data;
		}else{
			echo "No record found";
		}
	}

	public function update($query){
		$result = $this->db->query($query);
		if($result){
			echo "Information is updated successfully";
		}else{
			echo "Something goes wrong...". $this->db->error;
		}
	}

	public function remove($query){
		$result = $this->executeQuery($query);
		if($result){
			echo "Information Deleted successfully..";
		}else{
			echo "Something is wrong..".$this->db->error;
		}
	}
	
}
?>