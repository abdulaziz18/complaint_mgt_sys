<h4>Manage Users</h4>
<hr>
<?php
$database = new database();
$db = $database->getConnection();
$users = new complaint($db);
$query = "SELECT * FROM users";
$user = $users->get_data($query);

?>


<?php if(!empty($user)){?>
<table class="table table-bordered table-sm" id="myTable">
	<thead>
		<tr>
			<td>UserId</td>
			<td>Full Name</td>
			<td>Email</td>
			<td>Regd Date</td>
			<td>View Detail</td>
			<td>Delete</td>
		</tr>
	</thead>
	<?php foreach($user as $u): ?>
	<tbody>
		<tr>
			<td><?php echo $u->uid; ?></td>
			<td><?php echo $u->fullName; ?></td>
			<td><?php echo $u->email; ?></td>
			<td><?php echo $u->regDate; ?></td>
			
			<td align="center"><a href="index.php?page=view_user&uid=<?php echo $u->uid; ?>">view details</a></td>
			<td align="center"><a href="index.php?page=manage_users&uid=<?php echo $u->uid; ?>"><button class="btn btn-sm btn-danger">Delete</button></a></td>
		</tr>
	</tbody>
	<?php endforeach; }else{ echo "No users"; }?>
</table>

<?php
	if(isset($_GET['uid'])){
		echo $id = $_GET['uid'];

		$query = "DELETE FROM users WHERE uid=$id";
		$query2 = "DELETE FROM complaints WHERE user_id=$id";
		// $result = mysqli_query($db,$query);	
		// if($result){
		// 	echo "user delete";
		// }else{
		// 	echo mysqli_error($db);
		// }
		$category->executeQuery($query);
		$category->executeQuery($query2);

		echo "User successfully deleted...";
	}
?>


<script>
$(document).ready(function(){
	$('#myTable').DataTable();
});
</script>