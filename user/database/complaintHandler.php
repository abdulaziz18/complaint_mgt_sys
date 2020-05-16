<?php
include('../../database/config.php');
include('../../database/complaint.php');
$database = new database();
$db = $database->getConnection();
$complaint = new complaint($db);

if(isset($_POST['action'])){
	$action = $_POST['action'];
	switch ($action) {
		case 'lodge_complaint':
			$uid = $_POST['uid'];
			$category_id = $_POST['category'];
			$department = $_POST['department'];
			$cmp_type = $_POST['cmp_type'];
			$file_name = $_FILES['file']['name'];
			$title = mysqli_real_escape_string($db,$_POST['title']);
			$cmp_detail = mysqli_real_escape_string($db,$_POST['cmp_detail']);
			$tmp_file = $_FILES['file']['tmp_name'];
			$fname = '';
			if(!empty($title) && !empty($cmp_detail)){
				//echo "Validation is okay";
				if(!empty($file_name)){
					$fname = $file_name;
					move_uploaded_file($tmp_file,"../upload_file/".$fname);
				}else{
					$fname = "N/A";
				}
				$query = "INSERT INTO complaints(user_id,category_id,department,complaint_title,complaint_type,complaint_detail,complaint_file)VALUES($uid,$category_id,'$department','$title','$cmp_type','$cmp_detail','$fname')";
					$complaint->create_complaint($query);	
			}else{
				die("*Title or complaint detail is empty");
			}
			
			break;
		
		}
}


?>