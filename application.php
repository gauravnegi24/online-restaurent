<?php 
include_once('connection.php');

session_start();
if (!isset($_SESSION['id'])) {
  header('location:index.php');
}
else {
  $username = $_SESSION['id'];
  $sql = mysqli_query($connection,"SELECT * FROM store_login WHERE emp_username = '$username'");
  $user = mysqli_fetch_array($sql);

  $e_id = $user['emp_id'];
  $application = mysqli_query($connection, "SELECT * FROM store_leaves WHERE emp_id = '$e_id'");

  if(isset($_POST["apply"])){
      $emp_id = $_POST["emp_id"];
      $emp_name = $_POST["emp_name"];
      $emp_contact = $_POST["emp_contact"];
      $emp_email = $_POST["emp_email"];
      $leave_type = $_POST["leave_type"];
      $reason = $_POST["reason"];
      $leave_date = $_POST["date"];
      $date_apply = date('Y-m-d');

      $leave_query = mysqli_query($connection, "INSERT INTO store_leaves VALUES('','$emp_id','$emp_name','$emp_contact','$emp_email','$leave_type','$reason','$leave_date','$date_apply','Not Seen')");

      if($leave_query){
          echo '<script>
                alert("Your Application Sent Successfully!");
                </script>';
      }
      else{
            echo '<script>
            alert("Sorry! Something Went Wrong Try Again...");
            </script>';
      }
  }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/spur.css">
    <title>K & B FOOD'S</title>
</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="store.php" class="spur-logo"> <span>K $ B FOOD'S</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="store.php" class="dash-nav-item">
                    <i class="fas fa-warehouse"></i> Storage </a>
                <a href="arrived.php" class="dash-nav-item">
                    <i class="fas fa-truck-loading"></i> Arrived </a>
                <a href="dispatch.php" class="dash-nav-item">
                    <i class="fas fa-dolly-flatbed"></i> Dispatch </a>
                <a href="application.php" style="background-color: #2e6aca;" class="dash-nav-item">
                    <i class="fas fa-envelope"></i> Leave Apply </a>
                <a href="trash.php" class="dash-nav-item">
                    <i class="fas fa-trash-alt"></i> Trash </a>
            </nav>
        </div>
        <div class="dash-app bg-secondary">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <div class="tools">
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fas fa-user text-info"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item text-primary" href="profile.php"><i class="fas fa-edit"></i> Edit</a><hr class="bg-dark">
                            <a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row dash-row">
                        <div class="col-xl-12">
                            <div class="card spur-card border border-primary">
                                <div class="card-header bg-primary">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-envelope-open-text text-light"></i>
                                    </div>
                                    <div class="spur-card-title text-light"> Leave Form </div>
                                </div>
                                <div class="card-body ">
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmpID">Emp. ID</label>
                                                <input type="text" name="emp_id" class="form-control" value="<?php echo $user['emp_id'];?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputName">Emp. Name</label>
                                                <input type="text" name="emp_name" class="form-control" value="<?php echo $user['emp_name'];?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputContact">Emp. Contact No.</label>
                                                <input type="text" name="emp_contact" class="form-control" value="<?php echo $user['emp_contact'];?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail">Emp. Email</label>
                                                <input type="email" name="emp_email" class="form-control" value="<?php echo $user['emp_email'];?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputType"><b>Leave Type</b></label><br>
                                            <input type="radio" value="Exam" name="leave_type" required> Exam 
                                            <input type="radio" value="Sick" style="margin-left:50px;" name="leave_type" required> Sick 
                                            <input type="radio" value="Family" style="margin-left:50px;" name="leave_type" required> Family 
                                            <input type="radio" value="Other" style="margin-left:50px;" name="leave_type" required> Other 
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-9">
                                                <label for="inputReason">Reason of Leave</label>
                                                <input type="text"  name="reason" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputDate">Date of Leave</label>
                                                <input type="date"  name="date" class="form-control" required>
                                            </div>
                                        </div><br><hr class="bg-info">
                                        <button type="submit" name="apply" style="float:right;" class="btn btn-outline-primary ">Apply</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card spur-card">
                                <div class="card-header bg-primary">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-envelope-open text-light"></i>
                                    </div>
                                    <div class="spur-card-title text-light">Previously Applications</div>
                                </div>
                                <div class="card-body border border-primary">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date of Apply</th>
                                            <th scope="col">Date of Leave</th>
                                            <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1; 
                                        while($leaves = mysqli_fetch_array($application)){
                                        ?>
                                            <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $leaves["apply_date"]; ?></td>
                                            <td><?php echo $leaves["leave_date"]; ?></td>
                                            <td><?php echo $leaves["leave_status"]; ?></td>
                                            </tr>
                                        <?php
                                        $i++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="js/spur.js"></script>
</body>
</html>