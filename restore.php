<?php

include_once('connection.php');

$id = $_GET["id"];
if(isset($_GET["id"]))
{
    $sql = "UPDATE item_table SET item_status ='available' WHERE item_id = '$id'";
    if(mysqli_query($connection,$sql))
    {
        echo "<script>
        alert('Item Restored successfully');
        window.location.href='trash.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Something Went Wrong Try Again!');
        window.location.href='trash.php';
        </script>";
    }
}
?>