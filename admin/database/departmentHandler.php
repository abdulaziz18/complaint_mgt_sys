<?php
include('category.php');
include('config.php');
$database = new database();
$db = $database->getConnection();
$department = new category($db);

if(isset($_POST['action'])){
	$action = $_POST['action'];
	$id = $_POST['id'];
	

	
	switch ($action) {
		case 'edit':
			$dptName = $_POST['department'];
			$updationDate = date('Y-m-d');
			$query = "UPDATE department SET department='$dptName', updationDate='$updationDate' WHERE d_id=$id";
			$department->update($query);
			break;
		case 'delete':
			$query = "DELETE FROM department WHERE d_id=$id";
			$department->remove($query);

			break;
	}
	
}

?>