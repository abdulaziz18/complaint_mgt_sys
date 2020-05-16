<?php
include('database/config.php');
include('user/database/users.php');

$database = new database();
$db = $database->getConnection();
$user = new users($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  

  <title>Complaint Management System - User Registeration</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<style>
body{
  background: url('complaint.jpg')!important;
  background-size:cover!important;;
  background-repeat: no-repeat!important;;

}

</style>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="fullName" name='fullName' class="form-control" placeholder="Full name" required="required" autofocus="autofocus">
                  <label for="fullName">Full name</label>
                </div>
              </div>
              
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="Register">
        </form>
        <?php 
          if(isset($_POST['submit'])){
              $fullName = $_POST['fullName'];
              $email = $_POST['email'];
              $pass = md5($_POST['password']);
              $confirmPass = md5($_POST['confirmPassword']);
              if($pass !== $confirmPass){
                die("Password is not match");
              }else{
                
                $query = "INSERT INTO users (fullName,email,password)VALUES('$fullName','$email','$pass')";
                $user->create_user($query);
              }

          }
  
        ?>
        <div class="text-center">
          
          Already have acct ?<a class="d-block small mt-3" href="index.php">Login Page</a>
          
        </div>
      </div>
    </div>
  </div>





  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
