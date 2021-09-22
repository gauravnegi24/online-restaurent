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
 
    if(isset($_POST["receivedbtn"])) {
        $arrivaldate = $_POST['arrival'];
        $arrivaltime = $_POST['time'];
        $vehiclenumber = $_POST['vehicel_no'];
        $receiveditem = $_POST['received'];
        $emp_id = $_POST['emp_id'];
        $emp_name = $_POST['emp_mname'];

        $stock = mysqli_query($connection, "INSERT INTO recipt_table VALUES('','$arrivaldate','$arrivaltime','$vehiclenumber','$receiveditem','$emp_id','$emp_name')");

        if ($stock) {
            echo "<script>
            alert('data inserted successfully');
           </script>";
        }
        else
        {
            echo "<script>
            alert('data not inserted! try again');
           </script>";
        }
    }
}
$sql1 = mysqli_query($connection,"SELECT recipt_id,arrival_date,arrival_time,vehicle_number,received_item FROM recipt_table");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/spur.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="js/chart-js-config.js"></script>
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
                <a href="#!" class="searchbox-toggle">
                    <i class="fas fa-search"></i>
                </a>
                <form class="searchbox" action="#!">
                    <a href="#!" class="searchbox-toggle"> <i class="fas fa-arrow-left"></i> </a>
                    <button type="submit" class="searchbox-submit"> <i class="fas fa-search"></i> </button>
                    <input type="text" class="searchbox-input" placeholder="Type item name to search">
                </form>
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
                            <div class="card spur-card">
                                <div class="card-header bg-primary">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-truck-loading text-light"></i>
                                    </div>
                                    <div class="spur-card-title text-light"> Arrival Receipt </div>
                                </div>
                                <div class="card-body ">
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="arrivaldate">Arrive Date</label>
                                                <input type="text" id="printDate" class="form-control" name="arrival" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="arrivaltime">Arrive Time</label>
                                                <input type="text" id="printTime" class="form-control" name="time" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="vehiclenumber">Vehicle Number</label>
                                            <input type="text" class="form-control" name="vehicel_no" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2">Received Items</label>
                                           <textarea name="address" class="form-control" rows="3" required="required" placeholder="All the item despatched..."></textarea>
                                        </div>
                                        <hr>
                                        <u><h4>Received B</u>y:</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="vehiclenumber">Employee ID</label>
                                                <input type="text" class="form-control" value="<?php echo $user['emp_id'];?>" name="emp_id" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="vehiclenumber">Employee Name</label>
                                                <input type="text" class="form-control" value="<?php echo $user['emp_name'];?>" name="emp_name" readonly>
                                            </div>
                                        </div>
                                        <br><hr class="bg-info">
                                        <button type="submit" style="border-radius: 5px;" class="btn btn-outline-primary offset-11" name="receivedbtn">Submit</button>
                                    </form>
                                </div>
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
                                    <div class="spur-card-title text-light">Previous arrival details</div>
                                </div>
                                <div class="card-body border border-primary">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">arrival_date</th>
                                            <th scope="col">arrival time</th>
                                            <th scope="col">vehicel_no.</th>
                                            <th scope="col">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1; 
                                        while($data = mysqli_fetch_array($sql1)){
                                        ?>
                                            <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $data["arrival_date"]; ?></td>
                                            <td><?php echo $data["arrival_time"]; ?></td>
                                            <td><?php echo $data["vehicle_number"]; ?></td>
                                            <td><button type="button"  style="border-radius: 5px;" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#staticModal" onclick="GetDetails(<?php echo $data['recipt_id']; ?>)"><i class="far fa-eye"></i> View</button></td>
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
    <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="staticModalLabel">recipt_item</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">arrival_date:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="date" class="form-control" readonly=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">arrival_time:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="time" class="form-control" readonly=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">vehicle_no:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="vehicle" class="form-control" readonly=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">received_item:</label></div>
                        <div class="col-12 col-md-9"><textarea id="item" class="form-control" readonly=""></textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">received_by:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="user" class="form-control" readonly=""></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="border-radius:4px;" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/spur.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var d = new Date(),
            date = ((d.getDate()) + '/' + (d.getMonth()+1) + '/' + d.getFullYear());
            $('#printDate').val(date);

            var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
            $('#printTime').val(time);
        });

         function GetDetails(id){

            $.post("received.php", {
            id : id
            }, function(data,status){

                var item = JSON.parse(data);
                
                $('#date').val(item.arrival_date);
                $('#time').val(item.arrival_time);
                $('#vehicle').val(item.vehicle_number);
                $('#item').val(item.received_item);
                $('#user').val(item.emp_id);

                }
            );
            $('#staticModal').modal("show");
        }
    </script>
</body>

</html>