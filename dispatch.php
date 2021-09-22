<?php
$connection = mysqli_connect('localhost','root','','tbl_product');

session_start();

if (!isset($_SESSION['id'])) {
  header('location:index.php');
}

else {
  $username = $_SESSION['id'];
  $sql = mysqli_query($connection,"SELECT * FROM store_login WHERE emp_username = '$username'");
  $user = mysqli_fetch_array($sql);
  $items = mysqli_query($connection, "SELECT item_name FROM item_table ORDER BY item_name ASC");
  $dispatch1 = mysqli_query($connection,"SELECT * FROM dispatch_table");
  $row = mysqli_fetch_array($items);

    if(isset($_POST["dispatchbtn"])) {
        $dispatchdate = $_POST['dispatchdate'];
        $dispatchtime = $_POST['dispatchtime'];
        $dispatchitem = $_POST['dispatchitem'];
        $dispatch_by_emp_id = $_POST['emp_id'];
        $dispatch_by_emp_name = $_POST['emp_name'];
        $dispatch_to_emp_id = $_POST['to_emp_id'];
        $dispatch_to_emp_name = $_POST['to_emp_name'];

        $dispatch = mysqli_query($connection, "INSERT INTO dispatch_table VALUES('','$dispatchdate','$dispatchtime','$dispatchitem','$dispatch_by_emp_id','$dispatch_by_emp_name','$dispatch_to_emp_id','$dispatch_to_emp_name')");

        if ($dispatch) {
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
                <a href="arrived.php" class="dash-nav-item">
                    <i class="fas fa-truck-loading"></i> Arrived </a>
                <a href="dispatch.php" style="background-color: #2e6aca;" class="dash-nav-item">
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
                                        <i class="fas fa-dolly-flatbed text-light"></i>
                                    </div>
                                    <div class="spur-card-title text-light"> Dispatch Receipt </div>
                                </div>
                                <div class="card-body ">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="arrivaldate">Dispatch Date</label>
                                                <input type="text" id="printDate" class="form-control" name="dispatchdate" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="arrivaltime">Dispatch Time</label>
                                                <input type="text"  id="printTime" class="form-control" name="dispatchtime" readonly>
                                            </div>
                                        </div>
                                        <u><h4>Dispatch B</u>y:</h4>
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
                                        <u><h4>Dispatch T</u>o:</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="vehiclenumber">Employee ID</label>
                                                <input type="text" class="form-control" name="to_emp_id" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="vehiclenumber">Employee Name</label>
                                                 <input type="text" class="form-control" name="to_emp_name" required="">
                                            </div>
                                        </div>
                                        <hr>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="exampleFormControlSelect1">Items</label>

                                                       <select class="form-control" name="item-name">
                                                           <option>Select</option>
                                                         <?php

                                                         while($rows = mysqli_fetch_array($items)){
                                                             ?>

                                                            <option value="<?php echo $rows['item_name']; ?>"><?php echo $rows['item_name']; ?></option>

                                                            <?php

                                                            }
                                                            ?>
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="Quantity">Item Quantity</label>
                                                    <input type="text" class="form-control" name="qty" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                <br>
                                                <form method="post">
                                                    <button type="submit" name="cart" style="border-radius: 5px;margin-top: 7px;" class="btn btn-outline-dark">Add to Dispatch</button>
                                                </form>

                                                </div>
                                            </div>

                                        <br>
                                        <h3>Dispatch Details</h3>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="70%">Item Name</th>
                                                    <th width="20%">Quantity</th>
                                                    <th width="10%">Action</th>
                                                </tr>

                                                   <tr>
                                                    <td></td>
                                                    <td></td>

                                                </tr>


                                            </table>
                                        </div>
                                        <br><hr class="bg-info">
                                        <button type="submit" style="border-radius: 5px;" name="dispatchbtn" class="btn btn-outline-primary offset-11">Submit</button>
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
                                    <div class="spur-card-title text-light">Previous dispatch details</div>
                                </div>
                                <div class="card-body border border-primary">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Dispatch Date</th>
                                            <th scope="col">Dispatch Time</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        while($data1 = mysqli_fetch_array($dispatch1)){
                                        ?>
                                          <tr>
                                            <td><?php echo $i ;?></td>
                                            <td><?php echo $data1["dispatch_date"]; ?></td>
                                            <td><?php echo $data1["dispatch_time"]; ?></td>
                                            <td><button type="button" style="border-radius: 5px;" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#staticModal" onclick="GetDetails(<?php echo $data1['dispatch_id']; ?>)"><i class="far fa-eye"></i> View</button></td>
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
        <div class="modal-dialog modal-lg   " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="staticModalLabel">recipt_item</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">dispatch_date:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="date" class="form-control" readonly=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">dispatch_time:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="time" class="form-control" readonly=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">dispatch_item:</label></div>
                        <div class="col-12 col-md-9"><textarea id="item" class="form-control" readonly=""></textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">received_by:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="user" class="form-control" readonly=""></div>
                    </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">received_by:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="user_name" class="form-control" readonly=""></div>
                    </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">received_by:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="receiver_id" class="form-control" readonly=""></div>
                    </div>
                     <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">received_by:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="receiver_name" class="form-control" readonly=""></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="border-radius:4px;" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
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

            $.post("dispatched.php", {
            id : id
            }, function(data,status){

                var item = JSON.parse(data);

                $('#date').val(item.dispatch_date);
                $('#time').val(item.dispatch_time);
                $('#item').val(item.dispatch_item);
                $('#user').val(item.dispatch_emp_id);
                $('#user_name').val(item.dispatch_emp_name);
                $('#receiver_id').val(item.received_emp_id);
                $('#receiver_name').val(item.received_emp_name);


                }
            );
            $('#staticModal').modal("show");
        }
    </script>
</body>

</html>
