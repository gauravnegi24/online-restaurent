<?php
$connection = mysqli_connect('localhost','root','','tbl_product');

if (isset($_POST["Login"])) {

  $username = $_POST["uname"];
  $password = $_POST["psw"];

  $data = mysqli_query($connection, "SELECT * FROM store_login WHERE emp_username='$username' AND emp_password='$password'");

    if(mysqli_num_rows($data) == 1){

        header('location:store.php');
        session_start();
        $_SESSION['id'] = $username;
    }
    else{
        echo "<script> alert('Your Credentials are wrong. Try Again!'); </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>K&B FOOD'S - Inventrory Store Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
   form {border: 3px solid #1d1a1a;;width: 50%; margin:50px auto; background-color: rgba(0, 0, 0, 0.9); }

    input[type=text], input[type=password] {
      width: 80%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px auto;
      margin-left: 35%;
      border: none;
      cursor: pointer;
      width: 30%;
      font-size: 18px;
      border-radius: 3px;
    }

    button:hover {
      opacity: 0.8;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 20%;
      border-radius: 30%;
    }

    .container {
      padding: 25px;
      color: #b75555;
    }

    label.psw {
      float: right;
    }
    .label1{
        font-size: 18px;
        margin-right: 15px;
      }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }}
  </style>
</head>
<body style="background-image: url(bg3.jpg);">


<form method="POST" style="border-radius: 5px;">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>
   <center><h1 style="color: white;">Inventory Login</h1></center>
  <div class="container">
    <label for="uname" class="label1"><b>Username: </b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw" class="label1"><b>Password: </b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" name="Login">Login</button></br>

  </div>

  <div class="container" style="background-color:#f1f1f1">
    <label class="psw">Forgot <a href="#">password?</a></label>
  </div>
</form>
</body>
</html>
