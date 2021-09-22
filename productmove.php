<?php
include_once('connection.php');
if (isset($_GET['product_id'])) {
  $del = $_GET['product_id'];
  $sql = mysqli_query($con,"UPDATE products SET action='hide' WHERE product_id='$del'");
  if ($sql) {
    ?>
    <script>
      alert("This product move on trash.");
       window.location.href='addproduct.php';
    </script>
    <?php
  }
  else {
    ?>
    <script>
      alert("Some thing went wrong");
      window.location.href='addproduct.php';
    </script>
    <?php
  }

}

?>
