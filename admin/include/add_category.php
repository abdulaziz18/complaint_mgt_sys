
<div class="row">
	<div class="col-sm-8">
		<h4>Add Category Area</h4>
		
		<?php
		if(isset($_POST['submit'])){
			$categoryName = $_POST['category'];
			$description = $_POST['discription'];

		
			$query = "INSERT INTO category(category_name,description)VALUES('$categoryName','$description')";
			$category->add_data($query);	
		
		}

		?>
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="myForm">
			<label>Category Name:</label>
			<input type="text" name="category" id="category" class="form-control" id="category" placeholder="Enter category name" required>
			<label>Description: </label>
			<textarea class="form-control" name="discription" id="description" required></textarea><br>
			<input type="submit" name="submit" value="Create" id="create" class="btn btn-sm btn-primary">
			<input type="hidden" name="update" value="Update" id="update" class="btn btn-sm btn-primary">
			<input type="hidden" name="category_id" id="category_id">
		</form>
	</div>
</div>
<br>
<div id="result"></div>
<h4>Manage Categories</h4>
<hr>
<table class="table table-bordered table-sm" id="myTable">
	<thead>
		<tr>
			<td>Id</td>
			<td>Category</td>
			<td>Category Description</td>
			<td>Creation Date</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php $result = $category->get_data("SELECT * FROM category"); 
			  foreach($result as $category):
		?>
		<tr id="<?php echo $category->category_id; ?>">
			<td><?php echo $category->category_id; ?></td>
			<td data-target="category"><?php echo $category->category_name; ?></td>
			<td data-target="description"><?php echo $category->description; ?></td>
			<td><?php echo $category->creationDate; ?></td>
			<td>
				<button class="btn btn-sm btn-primary" data-role='update' data-id="<?php echo $category->category_id; ?>">Edit</button>
				<button class="btn btn-sm btn-danger" data-role='delete' data-id="<?php echo $category->category_id; ?>">Delete</button>
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
      	var category = $('#'+id).children('td[data-target=category]').text();
      	var description = $('#'+id).children('td[data-target=description]').text();
      	$('#category_id').val(id);
      	$('#category').val(category);
      	$('#description').val(description);
      	$('#create').hide();
      	$('#update').attr('type','submit');
      });


      $('#update').click(function(e){
      	e.preventDefault();
      	var id = $('#category_id').val();
       	var category = $('#category').val();
       	var description = $('#description').val();
      	$.ajax({
      		url:"database/categoryHandler.php",
      		method:"POST",
      		data:{action:'edit',category:category,description:description,id:id},
      		dataType:"html",
      		success:function(data){
      			$('#result').html(data).fadeOut(1500);
      			$('#myForm')[0].reset();
      			$('#update').attr('type','hidden');
      			$('#create').show();
      		}
      	});

      });

      $(document).on('click','button[data-role=delete]',function(e){
      	e.preventDefault();
      	

      	var id = $(this).data('id');
      	$.ajax({
      		url:"database/categoryHandler.php",
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