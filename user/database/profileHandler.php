<?php
include('../../database/config.php');
include('../database/users.php');
$database = new database();
$db = $database->getConnection();
$users = new users($db);


if(isset($_POST['action'])){
	$page = $_POST['action'];
	$id = $_POST['id'];
	$name = $_POST['name'];
	$department = $_POST['department'];
	$img_name = $_FILES['image']['name'];
	$tmp_name = $_FILES['image']['tmp_name'];
	if(!empty($img_name)){
		move_uploaded_file($tmp_name, '../profile/'.$img_name);
		$query = "UPDATE users SET fullName='$name', department='$department', profilePhoto='$img_name' WHERE uid=$id";	
		$users->executeQuery($query);
	}

	$query = "UPDATE users SET fullName='$name', department='$department', profilePhoto='$img_name' WHERE uid=$id";	
	if($users->executeQuery($query)){
		echo "Profile Updated";
	}

	
}


?>