
<div class="row">
	<div class="col-sm-8">
		<h4>Add Department area</h4>
		
		<?php
		if(isset($_POST['submit'])){
			$departmentName = $_POST['dptName'];
			$query = "INSERT INTO department(department)VALUES('$departmentName')";
			$department->add_data($query);	
		
		}

		?>
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="myForm">
			<label>Department Name:</label>
			<input type="text" name="dptName" id="dptName" class="form-control" placeholder="Enter department name" required>
			
			<br>
			<input type="submit" name="submit" value="Create" id="create" class="btn btn-sm btn-primary">
			<input type="hidden" name="update" value="Update" id="update" class="btn btn-sm btn-primary">
			<input type="hidden" name="department_id" id="department_id">
		</form>
	</div>
</div>
<br>
<div id="result"></div>
<h4>Manage Departments</h4>
<hr>
 <table class="table table-bordered table-sm" id="myTable">
	<thead>
		<tr>
			<td>Id</td>
			<td>Department</td>
			<td>Creation Date</td>
			<td>Last Updated</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php $result = $department->get_data("SELECT * FROM department"); 
			  foreach($result as $department):
		?>
		<tr id="<?php echo $department->d_id; ?>">
			<td><?php echo $department->d_id; ?></td>
			<td data-target="department"><?php echo $department->department; ?></td>
			<td data-target="creation"><?php echo $department->crreationDate; ?></td>
			<td data-target='updationDate'><?php echo $department->updationDate; ?></td>
			<td>
				<button class="btn btn-sm btn-primary" data-role='update' data-id="<?php echo $department->d_id; ?>">Edit</button>
				<button class="btn btn-sm btn-danger" data-role='delete' data-id="<?php echo $department->d_id; ?>">Delete</button>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table> 

<?php 
	
?>

<script>
   $(document).ready(function(){
      $("#myTable").DataTable();

      $(document).on('click','button[data-role=update]',function(){
      	var id = $(this).data('id');
      	var department = $('#'+id).children('td[data-target=department]').text();
      	var updationDate = $('#'+id).children('td[data-target=updationDate]').text();
      	$('#department_id').val(id);
      	$('#dptName').val(department);
      	$('#create').hide();
      	$('#update').attr('type','submit');
      });


      $('#update').click(function(e){
      	e.preventDefault();
      	var id = $('#department_id').val();
       	var department = $('#dptName').val();
       	$.ajax({
      		url:"database/departmentHandler.php",
      		method:"POST",
      		data:{action:'edit',department:department,id:id},
      		dataType:"html",
      		success:function(data){
      			$('#myForm')[0].reset();
      			$('#result').html(data).fadeOut(1500);
      			$('#update').attr('type','hidden');
      			$('#create').show();

      		}
      	});

      });

      $(document).on('click','button[data-role=delete]',function(e){
      	e.preventDefault();
      	

      	var id = $(this).data('id');
      	$.ajax({
      		url:"database/departmentHandler.php",
      		method:"POST",
      		data:{action:'delete',id:id},
      		dataType:"html",
      		success:function(data){
      			$('#result').html(data).fadeOut(1500);
      		}
      	});

      });

    
   });
 </script>