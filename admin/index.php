 <?php 
 session_start();
 if(!isset($_SESSION['admin_logged_in'])){
  header('location:../index.php');
 }


 ?>

 <?php
include('../database/config.php');
include('../database/complaint.php');
include('../user/database/users.php');
include('database/category.php');
$database = new database();
$db = $database->getConnection();
$category = new category($db);
$department = new category($db);
$complaint = new complaint($db);
$users = new users($db);
$user_query = "SELECT * FROM users";
$u = $users->executeQuery($user_query);
$query1 = "SELECT * FROM complaints WHERE status is null";
$query2 = "SELECT * FROM complaints WHERE status = 'in process'";
$query3 = "SELECT * FROM complaints WHERE status = 'closed'";
$notprocess_complaints = $complaint->executeQuery($query1);
$inprocess = $complaint->executeQuery($query2);
$closed_complaints = $complaint->executeQuery($query3);

?>

 <?php include('include/header.php'); ?>
  <div id="wrapper">
   <!-- Sidebar -->
   
       <ul class="sidebar navbar-nav mr-4" >
  
    <div style="text-align:center" class="mt-2">
         <img src="admin.jpg" class="rounded-circle ml-2 mt-0 m-auto d-block" width="85"> 
         <h6><a href="#" class="text-light">Abdulaziz Ansari</a></h6>
         <p class="text-light"><span class="badge badge-success text-success online">0</span> online</p>
    </div>


      <li class="nav-item active active_sidenav link" id="dashboard">
        <a class="nav-link" href="index.php?page=dashboard" id="dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown link">
        <a class="nav-link dropdown-toggle toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-cog"></i>
          <span>Manage complaints</span>
        </a>
        <div class="dropdown-menu sidebar-dropdown rounded-border-0 side-dropdown" aria-labelledby="pagesDropdown">
          
          <a class="dropdown-item" href="index.php?page=notprocess_complaints" id='notprocess-comp'>
            <i class="fa fa-list"></i> Not process yet comp <span class="badge badge-danger m-auto complaint_qty"><?php echo $notprocess_complaints->num_rows; ?></span></a>
          <a class="dropdown-item" href="index.php?page=pending_complaints" id="pending-comp"><i class="fa fa-list"></i> Pending complaints <span class="badge badge-warning badge-md m-right complaint_qty"><?php echo $inprocess->num_rows; ?></span></a>
          <a class="dropdown-item" href="index.php?page=closed_complaints" id='closed-comp'><i class="fa fa-right"></i> Closed complaints <span class="badge badge-success badge-md m-auto complaint_qty"><?php echo $closed_complaints->num_rows; ?></span></a>
          
        </div>
      </li>
      
      <li class="nav-item link" id="departments">
        <a class="nav-link" href="index.php?page=departments" id="department">
          <i class="fas fa-fw fa-edit"></i>
          <span>Add Department</span></a>
      </li>

      <li class="nav-item link" id="add-category">
        <a class="nav-link" href="index.php?page=add_category" id="add_category">
          <i class="fas fa-fw fa-pen"></i>
          <span>Add Category</span></a>
      </li>

      <li class="nav-item link" id="manage-users">
        <a class="nav-link" href="index.php?page=manage_users">
          <i class="fas fa-fw fa-users"></i>
          <span>Manage Users</span></a>
      </li>
      <li class="nav-item link" id="user-log">
        <a class="nav-link" href="index.php?page=user_details">
          <i class="fas fa-fw fa-list"></i>
          <span>User Login Details</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../user/logout.php?logout=logout">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Log out</span></a>
      </li>
    </ul>

<!-- End of sidebar -->

    <div id="content-wrapper">

      <div class="container-fluid">

      <?php 
       
       if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch($page){
          case 'dashboard':
            include('include/main_dashboard.php');
            break;
          case 'notprocess_complaints':
            include('include/notprocess-complaint.php');
            break;
          case 'pending_complaints':
            include('include/pending_complaints.php');
            break;
          case 'closed_complaints':
            include('include/closed_complaints.php');
            break;
          case 'departments':
            include('include/add_department.php');
            break;
          case 'add_category':
            include('include/add_category.php');
            break;
          case 'manage_users':
            include('include/manage_users.php');
            break;
          case 'user_details':
            include('include/user_login_detail.php');
            break;
          case 'complaint_detail':
            include('include/complaint_detail.php');
            break;
          case 'take_action':
            include('include/take_action.php');
            break;
          case 'view_user':
            include('include/view_user.php');
            break;
        }
       }else{
        include('include/main_dashboard.php');
       }

       ?>


 <!-- /.container-fluid -->
      </div>
     
      
<!-- Footer -->
<?php include('include/footer.php'); ?>

<!-- /.content-wrapper -->
    </div>
    
  <!-- /#wrapper -->
  </div>


  <script type="text/javascript">
      $(document).ready(function(){
    $(".toggle").click(function(){
        $('.sidebar-dropdown').slideToggle();
        
      });
    $(document).on('click','#content-wrapper',function(){
      $(".sidebar-dropdown").slideUp(1000);
    });


   });
  </script>