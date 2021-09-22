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

  if(isset($_POST["addItem"])){

    $item = $_POST["ItemName"];
    $unit = $_POST["ItemUnit"];
    $quantity = $_POST["ItemQuantity"];

    $add_Item = mysqli_query($connection, "INSERT INTO item_table VALUES('','$item','$unit','$quantity','available')");

    if($add_Item){
        echo '<script>
              alert("New Item Added Successfully!");
              window.location.href = "store.php"; 
              </script>';
    }
    else{
        echo '<script>
              alert("New Item Not Added Try Again!");
              window.location.href = "store.php"; 
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
                <a href="#" class="spur-logo"> <span>K $ B FOOD'S</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="store.php" style="background-color: #2e6aca;" class="dash-nav-item">
                    <i class="fas fa-warehouse"></i> Storage </a>
                <a href="arrived.php" class="dash-nav-item">
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
			            <div class="col-lg-12">
                            <div class="card spur-card">
                                <div class="card-header bg-success text-light">
                                    <div class="spur-card-icon">
                                        <i class="far fa-plus-square"></i>
                                    </div>
                                    <div class="spur-card-title"> Add New Item </div>
                                </div>
                                <div class="card-body ">
                                    <form class="form-inline" method="POST">
                                        <div class="form-group mb-2">
                                            <input type="text" name="ItemName" class="form-control" placeholder="Item Name" required autocomplete="off">
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" name="ItemUnit" class="form-control" placeholder="Item Unit" required autocomplete="off">
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" name="ItemQuantity" class="form-control" placeholder="Item Quantity" required autocomplete="off">
                                        </div>
                                        <button type="submit" class="btn btn-outline-info mb-2" style="border-radius:5px;" name="addItem"><i class="fas fa-utensils"></i> Add Item</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="container-fluid" id="data">

                </div>
            </main>
        </div>
    </div>
    <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg   " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="staticModalLabel">Item in Stock</h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Item Name:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="view_name" class="form-control" autocomplete="off"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Item Quantity:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="view_quantity" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Item Unit:</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="view_unit" class="form-control"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="border-radius:4px;" class="btn  btn-outline-primary" onclick="UpdateItem()">Update</button>
                    <button type="button" style="border-radius:4px;" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                    <input type="hidden" id="hidden_item_id">
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/spur.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            load_data();
        });
        function load_data(page){
            $.ajax({
                url: "data.php",
                method: "post",
                data: {page:page},
                success:function(data,status){
                    $('#data').html(data);
                }            
            });
        }

        $(document).on('click', '.page-link', function(){
            var page = $(this).attr("id");
            load_data(page);
        });

        function GetDetails(id){

            $('#hidden_item_id').val(id);

            $.post("update_and_delete.php", {
            id : id
            }, function(data,status){

                var item = JSON.parse(data);
                
                $('#view_name').val(item.item_name);
                $('#view_quantity').val(item.total_item);
                $('#view_unit').val(item.item_unit);

                }
            );
            $('#staticModal').modal("show");
        }

        function DeleteItem(deleteid){
            swal({
                title: "Are you sure?",
                text: "You will recover this from trash!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                    url: "update_and_delete.php",
                    type:'post',
                    data : {deleteid : deleteid},
                    success:function(data,status){
                    swal("Poof! Your Item has been archived!", {
                    icon: "success",
                    });
                  }
                 });
                } 
                else{
                    swal("Your Item is safe!");
                }
            });
        }

        function UpdateItem(){
            var update_name = $('#view_name').val();
            var update_quantity = $('#view_quantity').val();
            var update_unit = $('#view_unit').val();

            var update_hidden_item_id = $('#hidden_item_id').val();

            if($('#view_name').val() == "" || $('#view_quantity').val() =="" || $('#view_unit').val() == ""){
                swal("Sorry", "Can't Leave Fields Empty", "error");
            }
            else{
                $.post("update_and_delete.php",{

                    update_hidden_item_id : update_hidden_item_id,
                    update_name : update_name,
                    update_quantity : update_quantity,
                    update_unit : update_unit
                },

                function(data,status){
                    swal("Done", "Data Updated Successfully", "success");
                    $("[data-dismiss=modal]").trigger({ type: "click" });
                    }
                );
            }

        }
    </script>
</body>
</html>