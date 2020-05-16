<?php
include('category.php');
include('config.php');
$database = new database();
$db = $database->getConnection();
$category = new category($db);

if(isset($_POST['action'])){
	$action = $_POST['action'];
	$id = $_POST['id'];
	
	
	switch ($action) {
		case 'edit':
			$categoryName = $_POST['category'];
			$description = $_POST['description'];
			$query = "UPDATE category SET category_name='$categoryName', description='$description' WHERE category_id=$id";
			$category->update($query);
			break;
		case 'delete':
			$query = "DELETE FROM category WHERE category_id=$id";
			$category->remove($query);

			break;
	}
	
}

?>