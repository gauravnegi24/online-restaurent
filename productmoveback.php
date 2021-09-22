<?php
include_once('connection.php');
if ($_GET['id']) {
  $del = $_GET['id'];
  $sql = mysqli_query($con,"UPDATE products SET action ='show' WHERE product_id='$del'");
  if ($sql) {
    ?>
    <script>
      alert("The product Restored.");
       window.location.href='trash.php';
    </script>
    <?php
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
