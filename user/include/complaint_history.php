<?php
session_start();
if(isset($_SESSION['user_logged_in'])){
	$id = $_SESSION['uid'];
}

include('../../database/config.php');
include('../../database/complaint.php');
$database = new database();
$db = $database->getConnection();
$complaint = new complaint($db);
$query = "SELECT * FROM complaints WHERE user_id=$id";
$complaints = $complaint->get_complaints_by_uid($query);
?>
<div class="content">
<h4>Your Complaint history</h4>
<table class="table table-bordered table-sm">
	<thead>
		<tr>
			<td>Complaint Number</td>
			<td>Regd Date</td>
			<td>Last Updation Date</td>
			<td>Status</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($complaints)){ foreach($complaints as $cmp): ?>
		<tr>
			<td><?php echo $cmp->complaintNo; ?> </td>
			<td><?php echo $cmp->rgdDate; ?></td>
			<td><?php echo $cmp->lastUpdation; ?></td>
			<td align='center'>
				<?php if($cmp->status == null){
							echo "<button class='btn btn-sm btn-danger'>Not process yet</button>";
						}elseif($cmp->status=='in process'){
							echo "<button class='btn btn-sm btn-warning'>In process</button>";
						}elseif($cmp->status=='closed'){
							echo "<button class='btn btn-sm btn-success'>Closed</button>";
						}
				 ?>
				

			</td>
			<td data-role="getId" data-id=<?php echo $cmp->complaintNo; ?>><a href="#">View Details</a></td>
		</tr>
	</tbody>
	<?php endforeach; }else{
			echo "No record found";
		}?>
</table>
</div>
<script>
	$(document).ready(function(){
		$(document).on('click','td[data-role=getId]',function(){
			var id = $(this).data('id');
			$.ajax({
				url:"include/complaint_detail.php",
				method:'post',
				data:{id:id},
				success:function(data){
					$('.content').html(data);
				}
			});
		})
	});
</script>