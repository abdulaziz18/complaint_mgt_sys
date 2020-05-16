<?php
session_start(); 
include('../../database/config.php');
include('../database/users.php'); 

if(isset($_SESSION['user_logged_in'])){
	$id = $_SESSION['uid'];
	
	$database = new database();
	$db = $database->getConnection();
	$users = new users($db);
	$query = "SELECT * FROM users WHERE uid=$id";
	$result = $users->get_user($query);
	foreach($result as $u){
		$u->uid;
	}

	

}
?>
<h4>Account Setting</h4>
<form enctype="multipart/form-data" id="myForm">
<div class="row">
	<div class="col-sm-6">
		


User ID<input type="text" name="id" class="form-control" value="<?php echo $u->uid; ?>" readonly>
Name:<input type="text" name="name" class="form-control" value="<?php echo $u->fullName; ?>">
<?php 
	if(!empty($u->profilePhoto)){
		echo "<img src='profile/$u->profilePhoto' width='80'>";
	}else{
		echo "<img src='profile/dummy-profile.jpg' width='80'>";
	}
?>
Profile Image:<input type="file" name="image" class="form-control">


	</div>

	<div class="col-sm-6">
	
Email:<input type="text" name="email" class="form-control" value="<?php echo $u->email; ?>" readonly>
Department:<input type="text" name="department" class="form-control" value="<?php echo $u->department; ?>">
Reg Date:<input type="text" name="regDate" class="form-control" value="<?php echo $u->regDate; ?>" readonly>
<br>
	
	</div>

&nbsp; &nbsp; <input type="submit" name="update" value="update" id="update" class="btn btn-sm btn-info">
</div>
</form>
<div id="result">
	
</div>
<script>
	$(document).ready(function(){
		$('#update').click(function(e){
			e.preventDefault();
			var form_data = new FormData($("#myForm")[0]);
			form_data.append('action','update');
			$.ajax({
				url:'database/profileHandler.php',
				method:'post',
				data:form_data,
				contentType:false,
				processData:false,
				success:function(response){
					alert(response);
					$('#result').html(response);
				}


			});
		});

	});
</script>
<?php
// 	$datee = strtotime('tomorrow');
// 	//echo $da = strtotime('now');
// //	echo $date = date('d-m-y',$datee);
// 	$date = "2020-01-15";

// 	if($datee > strtotime('now')){
// 		echo "msg is displayed" . date('Y-m-d',$datee);
// 	} else{
// 		echo date('Y-m-d',$datee);
// 	}
?>


 <?php 
// $date = strtotime('tomorrow');
// echo $tomdate = date("Y-m-d",$date);
// $today = strtotime('now');
// echo $todaydate = date('Y-m-d',$today);

// if($tomdate > $todaydate){
// 		echo "Display message";
// 	} else{
//         echo date('Y-m-d',$date) . ' now: ' . strtotime('now');
// 		echo "no";
// 	}
?>