<?php
include_once('connection.php');
if ($_GET['file']) {
  $del = $_GET['file'];
  $sql = mysqli_query($con,"DELETE FROM products  WHERE product_img='$del'");
  if ($sql) {
    ?>
    <script>
      alert("The product has been deleted.");
       window.location.href='trash.php';
    </script>
    <?php
    unlink("product/$del");
  }
  else {
    ?>
    <script>
      alert("Some thing went wrong");
      window.location.href='trash.php';
    </script>
    <?php
  }

}

?>
