<?php
include_once('connection.php');

    if(isset($_POST['leave_id']) && isset($_POST['leave_id']) != ""){

    $R_id = $_POST['leave_id'];

    $update = mysqli_query($con, "SELECT * FROM emp_leave WHERE leave_id = '$R_id'");
    if(!$update){
        exit(mysqli_error());
    }

    $response = array();

    if(mysqli_num_rows($update) > 0){
         while ($row = mysqli_fetch_assoc($update)){
             $response = $row;
         }
    }
    else{
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }

    echo json_encode($response);
 }
 else{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
 }

  /// Delete Rating Data

    if(isset($_POST['deleteratingid'])){

    include_once('connection.php');

     $rateid = $_POST['deleteratingid'];

     $delete = mysqli_query($connection, "DELETE FROM emp_leave WHERE leave_id = '$rateid'");
 }

?>
