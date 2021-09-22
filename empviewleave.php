<?php

    include_once('connection.php');

 ///
  $record_per_page = 8;
  $page = '';
  $output = '';

    if(isset($_POST["page"])){

      $page = $_POST["page"];
    }
    else{
      $page = 1;
    }

    $start_from = ($page - 1) * $record_per_page;

    $rating = mysqli_query($con, "SELECT * FROM emp_leave LIMIT $start_from,$record_per_page");

                                        $leave = mysqli_query($con,"SELECT * FROM emp_leave");
                                        while ($lev = mysqli_fetch_array($leave)) {

                                    $output .=   '<tr>';
                                        $output  .= '<td>'.$lev['emp_id']. '</td>';
                                         $output  .= '<td>'.$lev['leave_date']. '</td>';
                                         $output  .= '<td>'.$lev['apply_date']. '</td>';
                                         $output .=   '<td><button type="submit" class="btn btn-outline-success" data-toggle="modal" data-target="#ReviewModal" onclick="GetRatingDetails('.$lev['leave_id'].')" > <i class="fa fa-eye"></i>&nbsp; View</button></td>

                                          </tr>';
                                        }


        $page_query = "SELECT * FROM emp_leave ORDER BY leave_id ASC";
        $page_result = mysqli_query($con,$page_query);
        $total_records = mysqli_num_rows($page_result);
        $total_pages = ceil($total_records /$record_per_page);


        echo $output;

?>
