<?php
include_once('connection.php');

session_start();
if (!isset($_SESSION['id'])) {
  header('location:index.php');
}
else{
  $username = $_SESSION['id'];
  $sql = mysqli_query($connection,"SELECT * FROM store_login WHERE emp_username = '$username'");
  $user = mysqli_fetch_array($sql);
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
                <a href="store.php" class="spur-logo"> <span>K & B FOOD'S</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="store.php" class="dash-nav-item">
                    <i class="fas fa-warehouse"></i> Storage </a>
                <a href="arrived.php" class="dash-nav-item">
                    <i class="fas fa-truck-loading"></i> Arrived </a>
                <a href="dispatch.php" class="dash-nav-item">
                    <i class="fas fa-dolly-flatbed"></i> Dispatch </a>
                <a href="application.php" class="dash-nav-item">
                    <i class="fas fa-envelope"></i> Leave Apply </a>
                <a href="trash.php" style="background-color: #2e6aca;" class="dash-nav-item">
                    <i class="fas fa-trash-alt"></i> Trash </a>
            </nav>
        </div>
        <div class="dash-app bg-secondary">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="#!" class="searchbox-toggle">
                    <i class="fas fa-search"></i>
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
                        <div class="col-lg-12">
                            <div class="card spur-card">
                                <div class="card-header bg-primary">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-archive text-light"></i>
                                    </div>
                                    <div class="spur-card-title text-light">Trashed Items</div>
                                </div>
                                <div class="card-body border border-primary">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Item</th>
                                            <th scope="col">Item Unit</th>
                                            <th scope="col">Item Quantity</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="trashdata">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/spur.js"></script>
    <script>
        $(document).ready(function(){
           allRecord();
        });

        function allRecord(){
            var readrecord = "readrecord";
            $.ajax({
                url: "trash_data.php",
                type: "POST",
                data:{ readrecord : readrecord },
                success:function(data,status){
                    $('#trashdata').html(data);
                }
            });
        }
    </script>
</body>
</html>