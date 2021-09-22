<?php
include_once('connection.php');
  if (isset($_POST['hidden_leave_id'])) {
    $id = $_POST['hidden_leave_id'];
    $st = "Accepted";
     $status = mysqli_query($con,"UPDATE emp_leave SET leave_status ='$st' where leave_id = '$id'");
     }

 ?>
<?php
if (isset($_POST['hidden1_leave_id'])) {
  $idd = $_POST['hidden1_leave_id'];
  $tt = "Rejected";
   $status = mysqli_query($con,"UPDATE emp_leave SET leave_status ='$tt' where leave_id = '$idd'");
 }
 ?>
