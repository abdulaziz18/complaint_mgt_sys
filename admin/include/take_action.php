<?php
if(isset($_GET['cid'])){
	$id = $_GET['cid'];
}
?>
<table>
	<form method="post" action="">
	<tr>
		<td><b>Complaint No: &nbsp;&nbsp;</td>
		<td width=""><input type="text" value="<?php echo $id; ?>" class="form-control" name="id" readonly></b></td>
	</tr>
	<tr>
		<td><b>Status</b></td>
		<td><select class="form-control" name="status" required>
			<option value="">Select Status</option>
			<option value="in process">In process</option>
			<option value="closed">Closed</option>
		</select>
	</td>
	</tr>
	<tr>
		<td><b>Remark</b></td>
		<td><textarea rows="7" cols="40" class="form-control" name="remark" required></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Submit" class="btn btn-sm btn-primary"></td>
	</tr>
	</form>
</table>

<?php
	if(isset($_POST['submit'])){
		$cid = $_POST['id'];
		$status = $_POST['status'];
		$remark = $_POST['remark'];
		$query = "INSERT INTO complaintremark(complaintNo,status,remark)VALUES($cid,'$status','$remark')";
		$query2 = "UPDATE complaints SET status='$status' WHERE complaintNo=$cid";
		$complaint->executeQuery($query);
		$complaint->executeQuery($query2);

		echo "Status is updated successfully";
	}
?>