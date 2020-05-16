<?php 
session_start();
if(isset($_SESSION['user_logged_in'])){
	$user_id = $_SESSION['uid'];
}
	include('../database/config.php');
	include('../../database/complaint.php');
	include('../database/category.php');
		$database = new database();
		$db = $database->getConnection();
		$category = new category($db);
		$categories = $category->get_data("SELECT * FROM category");
		$department = $category->get_data("SELECT * FROM department");


		?>
<h4>Register the complaints </h4>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="myForm">
<div class="row">
	
		<div class="col-sm-6">
			<div class="form-group">
			<label>Category: </label>
			<select class="form-control" name="category" id="category">
				<?php foreach($categories as $result): ?>
					  <option value="<?php echo $result->category_id; ?>">
						 <?php echo $result->category_name; ?>
					   </option>
				<?php endforeach; ?>
								
			</select>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
			<label>Department: </label>
			<select class="form-control" name="department" id="department">
				<?php foreach($department as $dpt):?>
					  <option><?php echo $dpt->department ?></option>
				<?php endforeach;?>
			</select>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
			<label>Complaint Type: </label>
			<select class="form-control" name="cmp_type" id="cmp_type">
				<option>Complaint</option>
				<option>General Query</option>
				
			</select>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
			<label>Complaint Title: </label>
			<input type="text" name="title" class="form-control" id="title" placeholder="Write title..">
			</div>
		</div>

</div>
<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
			<label>Complaint Details: </label>
			<textarea class="form-control" rows="8" id="cmp_detail" name="cmp_detail"></textarea>
			</div>
		</div>
		<div class="col-sm-12">
			<input type="hidden" value="<?php echo $user_id ?>" name="uid">
			<input type="file" class="form-control" name="file"><br>
			<div id="result"></div>
			<input type="submit" name="submit" value="Submit" id="submit" class="btn btn-sm btn-dark">
		</div>
</div>
</form>
	

<script type="text/javascript">
	$(document).ready(function(){
		$('#submit').click(function(e){
			e.preventDefault();
			var form_data = new FormData($('#myForm')[0]);
			form_data.append('action','lodge_complaint');
			$.ajax({
				url:'database/complaintHandler.php',
				method:'post',
				data:form_data,
				contentType:false,
				processData:false,
				success:function(response){
					$('#result').html(response);
					$('#myForm')[0].reset();
				}


			});
		});
	});
</script>