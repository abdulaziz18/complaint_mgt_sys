<?php
if(isset($_GET['uid'])){
	$uid= $_GET['uid'];
	$query = "SELECT * FROM users WHERE uid=$uid";
	$user = $users->get_user($query);
	foreach($user as $u){
		$u->fullName;
	}


}


?>
<div class="row">
	<div class="col-6">
	<?php 
		if(!empty($u->profilePhoto)){ ?>
			<img src="../user/profile/<?php echo $u->profilePhoto;?>" width="70" style="float:left;"><br>
	<?php	}else{	?>
		<img src="../user/profile/dummy-profile.jpg" width="70" style="float:left;"><br>
	<?php } ?>
<h4> <?php echo $u->fullName; ?>'s Profile</h4><br>
<table class="table table-sm">
	<tr>
		<td><strong>User Id:</strong></td>
		<td><?php echo $u->uid; ?></td>
	</tr>
	<tr>
		<td><strong>Full Name:</strong></td>
		<td><?php echo $u->fullName; ?></td>
	</tr>
	<tr>
		<td><strong>Email:</strong></td>
		<td><?php echo $u->email; ?></td>
	</tr>
	<tr>
		<td><strong>Department:</strong></td>
		<td><?php echo $u->department; ?></td>
	</tr>
	<tr>
		<td><strong>Creation Date:</strong></td>
		<td><?php echo $u->regDate; ?></td>
	</tr>
	<tr>
		<td><strong>Last Updation Date:</strong></td>
		<td><?php echo $u->updationDate; ?></td>
	</tr>
</table>
</div>
</div>