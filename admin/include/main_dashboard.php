
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
             
<!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-users"></i>
                </div>
                <div class="mr-5"><?php echo $u->num_rows; ?> Total Users </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="index.php?page=manage_users">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw  fa-comments"></i>
                </div>
                <div class="mr-5"><?php echo $inprocess->num_rows; ?> Complaints in process!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="index.php?page=pending_complaints">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?php echo $closed_complaints->num_rows; ?> Complaints that have been closed</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="index.php?page=closed_complaints">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><?php echo $notprocess_complaints->num_rows; ?> Complaints that have to be processed</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="index.php?page=notprocess_complaints">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>


        <!-- Quick Notice and Calender row -->
        <div class="row">
        <div class="col-sm-6 col-md-6">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-pen"></i>
              Quick Notice</div>
            <div class="card-body">
              
            	<form class="" id="myForm">
            		<label>Start date: </label><br>
            		<input type="date" id="start_date" class="form-control">
            		<label>Till date: </label><br>
            		<input type="date" id="end_date" class="form-control">
            		<label>Message: </label><br>
            		<textarea class="form-control" rows="5" id="message"></textarea>
            		<button class="btn btn-sm btn-info mt-1 float-right " id="send">Send <i class="fa fa-arrow-right"></i> </button>
            	</form>

            </div>
          
          </div>
        </div>

        
        <div class="col-sm-6 col-md-6">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-calendar-alt"></i>
              Calender</div>
            <div class="card-body">
              
              <div id="calendar">
                
              </div>

            </div>
          
          </div>
        </div>
        </div>
  
      <script>
        $(document).ready(function(){
          $("#send").click(function(e){
            e.preventDefault();
            var start_date = $("#start_date").value();
            var end_date = $("#end_date").value();
            var message = $("#message").value();
            alert(start_date);
          });

          
        });
      </script>