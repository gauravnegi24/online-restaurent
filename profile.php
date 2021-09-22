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

  if(isset($_POST["update"])){
      $update_name = $_POST["name"];
      $update_contact = $_POST["contact"];
      $update_address = $_POST["address"];
      $update_username = $_POST["username"];
      $update_password = $_POST["password"];

      $update_id = $user['emp_id'];

      $update = mysqli_query($connection, "UPDATE store_login SET emp_name = '$update_name',emp_contact = '$update_contact',emp_address = '$update_address',emp_username = '$update_username',emp_password = '$update_password' WHERE emp_id = '$update_id'");

      if($update){
          echo '<script>
                alert("Data Updated Successfully!");
                </script>';
      }
      else{
        echo '<script>
        alert("Something went wrong! Data not updated!");
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
                <a href="arrived.php" style="background-color: #2e6aca;" class="dash-nav-item">
                    <i class="fas fa-truck-loading"></i> Arrived </a>
                <a href="dispatch.php" class="dash-nav-item">
                    <i class="fas fa-dolly-flatbed"></i> Dispatch </a>
                <a href="application.php" class="dash-nav-item">
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
                        <div class="col-xl-9" style="margin: 0 auto;">
                            <div class="card spur-card" style="margin:0 auto;">
                                <div class="card-header bg-dark text-white">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="spur-card-title"> <?php echo $user['emp_name']; ?> </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name: </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" value="<?php echo $user['emp_name']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Contact:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="contact" value="<?php echo $user['emp_contact']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="address" value="<?php echo $user['emp_address']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Username: </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" value="<?php echo $user['emp_username']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="password" value="<?php echo $user['emp_password']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <button type="submit" style="float:right;" name="update" class="btn btn-outline-info"><i class="fas fa-pen-square"></i> Update</button>
                                            </div>
                                        </div>
                                    </form>
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