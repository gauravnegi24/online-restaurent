<?php
session_start();
include_once('connection.php');
if(!isset($_SESSION['admin_id'])){
  header('location:index.php');
}
else {
  $id = $_SESSION['admin_id'];
  $sql = mysqli_query($con,"SELECT * from admin where UserName = '$id'");
  $data = mysqli_fetch_array($sql);
}
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
  <title>K & B Food Admin </title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
     <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/sweetalert.min.css">


<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                      <b class="logo-icon p-l-10">
                        K & B
                      </b>
                      <span class="logo-text">
                       Food
                      </span>

                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->

                        <!-- Search -->
                        <!-- ============================================================== -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                             <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Event today</h5>
                                                        <span class="mail-desc">Just a reminder that event</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Settings</h5>
                                                        <span class="mail-desc">You can customize this template</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Pavan kumar</h5>
                                                        <span class="mail-desc">Just see the my admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Luanch Admin</h5>
                                                        <span class="mail-desc">Just see the my new admin!</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> <?php echo $data ['UserName']; ?></a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="profile.php" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="inventory.php" aria-expanded="false"><i class="fas fa-dolly-flatbed"></i><span class="hide-menu">Inventory Manage</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="storeleave.php" aria-expanded="false"><i class="fas fa-sticky-note"></i><span class="hide-menu">Store Employee Leaves</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="empleaves.php" aria-expanded="false"><i class="fas fa-sticky-note"></i><span class="hide-menu">Employee Leaves</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="addproduct.php" aria-expanded="false"><i class="fas fa-plus"></i><span class="hide-menu">Add Product</span></a></li>
                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="trash.php" aria-expanded="false"><i class="fas fa-trash-alt"></i><span class="hide-menu">Trash</span></a></li>
                    </ul>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">

                <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"> Store Employee Leaves</h5>
                                            <div class="table-responsive">
                                                <table id="zero_config" class="table table-striped table-bordered">
                                                  <thead>
                                                      <tr>

                                                          <th>Employee Id</th>
                                                          <th>Leave Date</th>
                                                          <th>Apply Date</th>
                                                          <th>Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody id="review">

                                                  </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>



                                      <div class="modal fade" id="ReviewModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title text-primary" id="staticModalLabel">Employee Leaves Details</h5>
                                                      <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>

                                                  <div class="modal-body">
                                                  <form action="status.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                      <div class="row form-group">
                                                          <div class="col col-md-3"><label for="text-input" class="form-control-label"></label></div>
                                                          <div class="row form-group">
                                                              <div class="col col-md-3"> <input type="text" hidden id="leave_id"> </div>
                                                          </div>
                                                      </div>
                                                      <div class="row form-group">
                                                          <div class="col col-md-3"><label for="text-input" class="form-control-label">Employee Id:</label></div>
                                                          <div class="col-12 col-md-9"><input type="text" disabled="" id="emp_id" class="form-control" autocomplete="off"></div>
                                                      </div>
                                                      <div class="row form-group">
                                                          <div class="col col-md-3"><label for="textarea-input" class="form-control-label">Name:</label></div>
                                                          <div class="col-12 col-md-9"><input id="emp_name" type="text" class="form-control" disabled=""></div>
                                                      </div>
                                                      <div class="row form-group">
                                                          <div class="col col-md-3"><label for="text-input" class="form-control-label">Contact:</label></div>
                                                          <div class="col-12 col-md-9"><input type="text" disabled="" id="emp_contact" class="form-control" autocomplete="off"></div>
                                                      </div>
                                                      <div class="row form-group">
                                                          <div class="col col-md-3"><label for="text-input" class="form-control-label">Email:</label></div>
                                                          <div class="col-12 col-md-9"><input type="text" disabled="" id="emp_email" class="form-control" autocomplete="off"></div>
                                                      </div>
                                                      <div class="row form-group">
                                                          <div class="col col-md-3"><label for="text-input" class="form-control-label">Leave Type:</label></div>
                                                          <div class="col-12 col-md-9"><input type="text" disabled="" id="leave_type" class="form-control" autocomplete="off"></div>
                                                      </div>
                                                      <div class="row form-group">
                                                          <div class="col col-md-3"><label for="text-input" class="form-control-label">Reason:</label></div>
                                                          <div class="col-12 col-md-9"><input type="text" disabled="" id="reason" class="form-control" autocomplete="off"></div>
                                                      </div>
                                                      <div class="row form-group">
                                                          <div class="col col-md-3"><label for="text-input" class="form-control-label">Leave Date:</label></div>
                                                          <div class="col-12 col-md-9"><input type="text" disabled="" id="leave_date" class="form-control" autocomplete="off"></div>
                                                      </div>
                                                      <div class="row form-group">
                                                          <div class="col col-md-3"><label for="text-input" class="form-control-label">Apply Date:</label></div>
                                                          <div class="col-12 col-md-9"><input type="text" disabled="" id="apply_date" class="form-control" autocomplete="off"></div>
                                                      </div>

                                                  <div class="modal-footer">
                                                      <button type="button" name="accept" style="border-radius:4px;" class="btn btn-outline-success" onclick="update();"><i class="fas fa-check"></i> Accept</button>
                                                      <button type="button" name="reject" style="border-radius:4px;" class="btn btn-outline-danger" onclick="update1();"><i class="far fa-times-circle"></i> Reject</button>
                                                      <input type="hidden" id="hidden_leave_id">
                                                  </div>
                                                </form>
                                              </div>
                                          </div>
                                      </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
      <script type="text/javascript" src="dist/js/sweetalert.min.js"></script>
    <script>
        $('#zero_config').DataTable();
    </script>
    <script type="text/javascript">
         $(document).ready(function(){
          load_review_data();

          function load_review_data(page){
            $.ajax({
            url: "viewleave.php",
            method: "POST",
            data:{ page : page },
            success:function(data,status){
                $('#review').html(data);
            }
          })
        }
        $(document).on('click', '.page-link', function(){
          var page = $ (this).attr("id");
                  load_review_data(page);
                });

        });

        function GetRatingDetails(id){
            $('#hidden_leave_id').val(id);
            $.post("storeview.php", {
            leave_id : id
            }, function(data,status){
                var review = JSON.parse(data);
                $('#emp_id').val(review.emp_id);
                $('#emp_name').val(review.emp_name);
                $('#emp_contact').val(review.emp_contact);
                $('#emp_email').val(review.emp_email);
                $('#leave_type').val(review.leave_type);
                $('#reason').val(review.reason);
                $('#leave_date').val(review.leave_date);
                $('#apply_date').val(review.apply_date);
             }
            );
        }

        function DeleteRatingDetails(deleteid){
          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, Delete ",
              cancelButtonText: "No, Cancel ",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm) {
              if (isConfirm) {
                $.ajax({
                   url: "viewleave.php",
                   type:'post',
                   data : {deleteratingid : deleteid},
                   success:function(data,status){
                    swal("Deleted!", "Rating details has been deleted.", "success");
                   }
                });
              }
              else {
                swal("Cancelled", "Rating details is Safe :)", "error");
              }
            });
        }
    </script>
    <script type="text/javascript">
    function update(){
      var hidden_leave_id = $('#hidden_leave_id').val();
      $.ajax({
        url:"status.php",
        type: "POST",
        data:{
              hidden_leave_id  : hidden_leave_id
            },
        success:function(data)
        {
          $('#ReviewModal').modal('hide');

        }

      });
     location.reload();
   };
    </script>
    <script type="text/javascript">
    function update1(){
      var hidden1_leave_id = $('#hidden_leave_id').val();
      $.ajax({
        url:"status.php",
        type: "POST",
        data:{
              hidden1_leave_id  : hidden1_leave_id
            },
        success:function(data)
        {
          $('#ReviewModal').modal('hide');

        }

      });
     location.reload();
   };
    </script>
</body>

</html>
