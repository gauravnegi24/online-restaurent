<?php
include_once('connection.php');

if(isset($_POST['submit1']))
{
	$fname=$_POST['f_name'];
	$lname=$_POST['l_name'];
	$contact=$_POST['contact'];
	$Email=$_POST['Email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
$sql = mysqli_query($con,"INSERT INTO register VALUES('','$fname','$lname','$contact','$Email','$password')");
if ($sql) {
	?>
	<script type="text/javascript">
		alert("You are registered successfully.");
		window.locaton.href='login1.php';
	</script>
	<?php
}
else {
	?>
	<script type="text/javascript">
		alert("Something went wrong please check your details!");
		window.locaton.href='login1.php';
	</script>
	<?php
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width-device-width,initial-state-1"/>
 <link rel="stylesheet" href="css/bootstrap.css">


<link rel="stylesheet" href="css/bootstrap.min.css">


<script src="https:js/jquery.min.js"></script>


<script src="js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="Assets/registration.css">
 <!--<script src="Assets/actions.js"></script>-->
<title>Registration</title>
</head>
<body>
<h1 class="text-center">REGISTER</h1>
		<div class="container">
				<form class="well form-horizontal"  method="post"  id="register_form">
		<fieldset>
			 <legend>Personal Information</legend>
 			<div class="form-group">
 				<label class="col-md-4 control-lable">First Name</label>
 					<div class="col-md-4 inputGroupContainer">
 						<div class="input-group">
  						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
 		 				<input type="text" id="f_name" class="form-control" name="f_name" placeholder="Enter your first name" required>
 		 				</div>
 		 			</div>
 			</div>
			<br/>

 			<div class="form-group">
 				<label class="col-md-4 control-lable">Last Name</label>
 				  	<div class="col-md-4 inputGroupContainer">
  						<div class="input-group">
  						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
 						<input type="text" id="l_name" class="form-control" name="l_name" placeholder="Enter your last name" required>
 			 			</div>
 				  	</div>
 			</div>
			<br/>

 			<div class="form-group">
 				<label class="col-md-4 control-lable">Contact Number</label>
 				  	<div class="col-md-4 inputGroupContainer">
  						<div class="input-group">
  						<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
 						<input type="number" id="contact" class="form-control" name="contact" placeholder="Enter Phone number" required onKeyPress="if (this.value.length==10) return false;">
 				 		</div>
 					</div>
 			</div>
			<br/>

 			<div class="form-group">
 				<label class="col-md-4 control-lable">Email</label>
 					<div class="col-md-4 inputGroupContainer">
  						<div class="input-group">
  						<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
 						<input type="Email" id="Email" class="form-control" name="Email" placeholder="Enter Email ID" required>
 			 			</div>
 					</div>
 			</div>
			<br/>

 			<div class="form-group">
 				<label class="col-md-4 control-lable">User Name</label>
 			 	  	<div class="col-md-4 inputGroupContainer">
  						<div class="input-group">
  						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
 						<input type="text" id="username" class="form-control" name="username" placeholder="Create a unique username" required>
 			 			</div>
 					</div>
 			</div>
			<br/>

 		    <div class="form-group">
 				<label class="col-md-4 control-lable">Password</label>
 				   <div class="col-md-4 inputGroupContainer">
  						<div class="input-group">

 						<input type="password" name="password" class="form-control" name="password" placeholder="Enter password" required>
 			 			</div>
 					</div>

<!--
    <span class="input-group-btn">
        <button class="btn btn-white btn-minuse" type="button">-</button>
    </span>
    <input type="text" class="form-control no-padding add-color text-center height-25" maxlength="3" value="0">
    <span class="input-group-btn">
        <button class="btn btn-red btn-pluss" type="button">+</button>
    </span>
 -->
<!-- /input-group -->
 			</div>
			<br/>
			<br/>
 			 <div class="col-md-4">
 			 	<button type="submit"  align="center" class="btn btn-success btn-center" name="submit1">SUBMIT</button>
 			 </div>
		</fieldset>
	</form>
</div>
</body>
</html>
