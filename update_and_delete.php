<?php

include_once('connection.php');

/// Item Update And Delete Ends

if(isset($_POST['id']) && isset($_POST['id']) != ""){

    $item_id = $_POST['id'];

    $update = mysqli_query($connection, "SELECT * FROM item_table WHERE item_id = '$item_id'");
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

if(isset($_POST['deleteid'])){
    
    include_once('connection.php');
    
     $itemid = $_POST['deleteid'];
    
     $delete = mysqli_query($connection, "UPDATE item_table SET item_status = 'not_available' WHERE item_id = '$itemid'");
 }

if(isset($_POST['update_hidden_item_id'])){

    include_once('connection.php');

    $update_hidden_item_id = $_POST['update_hidden_item_id'];
    $update_name = $_POST['update_name'];
    $update_quantity = $_POST['update_quantity'];
    $update_unit = $_POST['update_unit'];

            $update_item = mysqli_query($connection, "UPDATE item_table SET item_name = '$update_name', item_unit = '$update_unit', total_item = '$update_quantity' WHERE item_id = '$update_hidden_item_id'");
 }
 /// Items Update And Delete Ends
 ?>