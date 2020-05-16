<?php
$database = new database();
$db = $database->getConnection();
$complaint = new complaint($db);
$query = "SELECT * FROM complaints WHERE status='in process'";
$complaints = $complaint->get_data($query);

?>
<h3>Pending Complaints</h3>
<hr>
<?php if(!empty($complaints)){?>
<table class="table table-bordered table-sm" id="myTable">
	<thead>
		<tr>
			<td>Complaint Number</td>
			<td>Complainant Name</td>
			<td>Regd Date</td>
			<td>Status</td>
			<td>Action</td>
		</tr>
	</thead>
	<?php foreach($complaints as $cmp): ?>
	<tbody>
		<tr>
			<td><?php echo $cmp->complaintNo; ?></td>
			<td>
			<?php
			 	$query1="SELECT * FROM users WHERE uid=$cmp->user_id";
			 	$result = $complaint->get_data($query1);
			 	foreach($result as $res){
			 		echo $res->fullName;
			 	}

			 ?>
				
			</td>
			<td><?php echo $cmp->rgdDate ?></td>
			<td align="center"><button class="btn btn-sm btn-warning">In process</button></td>
			<td><a href="index.php?page=complaint_detail&cid=<?php echo $cmp->complaintNo; ?>">view details</a></td>
		</tr>
	</tbody>
	<?php endforeach; }else{ echo "No pending complaints"; }?>
</table>

<script>
$(document).ready(function(){
	$('#myTable').DataTable();
});
</script>