<?php

include_once('connection.php');

/// Item Update And Delete Ends

if(isset($_POST['id']) && isset($_POST['id']) != ""){

    $item_id = $_POST['id'];

    $update = mysqli_query($connection, "SELECT * FROM dispatch_table WHERE dispatch_id = '$item_id'");
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
 ?>
