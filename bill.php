
<?php
session_start();
include_once('connection.php');
if (!isset($_SESSION['id'])) {
header('location.indexx.php');
}
else {
$id = $_SESSION['id'];
$login = mysqli_query($con,"SELECT * FROM register where username='$id'");
$data = mysqli_fetch_array($login);
}


if (isset($_SESSION['check'])) {
     unset($_SESSION['shopping']);
}
else {
	if (isset($_SESSION['shopping'])) {
		unset($_SESSION['check']);
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["check"] as $keys => $values)
		{
			if($values["productId"] == $_GET["product_id"])
			{
				unset($_SESSION["check"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="bill.php"</script>';
			}
		}
	}
}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping"] as $keys => $values)
		{
			if($values["product_id"] == $_GET["product_id"])
			{
				unset($_SESSION["shopping"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="bill.php"</script>';
			}
		}
	}
}
if (isset($_POST['pay'])) {
	 $_SESSION['fname'] =  $_POST['first_name'];
	$_SESSION['lname'] = $_POST['last_name'];
  $_SESSION['email'] = $_POST['email'];
	$_SESSION['address']  = $_POST['address'];
	$_SESSION['country']  = $_POST['country'];
  $_SESSION['state']  = $_POST['state'];
	$_SESSION['zip']  = $_POST['zip'];
	$_SESSION['payment']  = $_POST['payment'];
	header('location:view.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

	<title></title>
</head>
<body>
<body class="bg-light">
	<nav class="navbar navbar-expand-lg navbar-dark site_navbar bg-dark site-navbar-light" id="site-navbar">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="site-nav" >
				<ul class="navbar-nav ml-auto" >
					<li class="nav-item active"><a href="#section-home" class="nav-link" >Home</a></li>
					<!--<li class="nav-item"><a href="#section-about" class="nav-link" >About</a></li>-->

					<li class="nav-item"><a href="#section-menu" class="nav-link">Menu</a></li>
				<?php if (!isset($_SESSION['id'])) {
				 echo '<li class="nav-item"><a href="login1.php" class="nav-link">Login</a></li>';
				} ?>
					<?php if (isset($_SESSION['id'])) {?>
				 <li class="nav-item"><a href="" class="nav-link"><?php echo $data['username']; ?></a></li>';
				 <li class="nav-item"> <a href="logout.php" class="nav-link">Logout</a></li>
					<?php
				} ?>

				</ul>
			</div>
		</div>
	</nav>
	<section class="site-cover" style="background-image: url(img/adventure.jpg);" id="section-home">
		<div class="container">
			<div class="row align-items-center justify-content-center text-center site-vh-100">
				<div class="col-md-12">
					<h1 class="site-heading site-animate mb-3">WELCOME TO K$B FOODS</h1>
					<h2 class="h5 site-subheading mb-5 site-animate">Come and eat well with our delicious &amp; healthy foods.</h2>
				 <!--p > <a href="loginpage.php" type="button" class="btn-dark btn-lg site-animate" >LOGIN</a></p-->
				</div>
			</div>
		</div>
	</section>
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>Checkout form</h2>
    <!--<p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>-->
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <!--<span class="badge badge-secondary badge-pill">3</span>-->
      </h4>
      <ul class="list-group mb-3">
          <?php
          if(!empty($_SESSION["check"]))
          {
            $total = 0;
            foreach($_SESSION["check"] as $keys => $values)
            {
          ?>

        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?php echo $values["productName"]; ?></h6>
            <small class="text-muted">Qty: <?php echo $values["productQty"]; ?></small>
          </div>
          <span class="text-muted">Price: <?php echo number_format($values["productQty"] * $values["productPrice"], 2);?></span>
          <a href="bill.php?action=delete&product_id=<?php echo $values["productId"];?>"><span class="text-danger"> <i class="fa fa-times"></i> </span></a>
          </li>
          <?php
              $total = $total + ($values["productQty"] * $values["productPrice"]);
            }
          ?>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total Price: </span>
          <strong><?php echo number_format($total, 2); ?></strong>
        </li>
      </ul>
      <?php

      }
      ?>
			<?php
			if(!empty($_SESSION["shopping"]))
			{
				$total = 0;
				foreach($_SESSION["shopping"] as $keys => $values)
				{
			?>

		<li class="list-group-item d-flex justify-content-between lh-condensed">
			<div>
				<h6 class="my-0"><?php echo $values["product_name"]; ?></h6>
				<small class="text-muted">Qty: <?php echo $values["product_qty"]; ?></small>
			</div>
			<span class="text-muted">Price: <?php echo number_format($values["product_qty"] * $values["product_price"], 2);?></span>
			<a href="bill.php?action=delete&product_id=<?php echo $values["product_id"];?>"><span class="text-danger"> <i class="fa fa-times"></i> </span></a>
			</li>
			<?php
					$total = $total + ($values["product_qty"] * $values["product_price"]);
				}
			?>
		<li class="list-group-item d-flex justify-content-between">
			<span>Total Price: </span>
			<strong><?php echo number_format($total, 2); ?></strong>
		</li>
	</ul>
	<?php

	}
	?>
    </div>

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation was-validated" method="post" novalidate="">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" name="first_name" class="form-control" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" name="last_name" class="form-control" id="lastName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <!--div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required="">
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div-->

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required="">
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <!--div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div-->

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" name="country" id="country" required="">
              <option>Choose...</option>
              <option value="India" >India</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" name="state" id="state" required="">
              <option value="">Choose...</option>
              <option value="Delhi" >Delhi</option>
              <option value="Uttrakhand" >Uttrakhand</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" name="zip" id="zip" placeholder="" required="">
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <hr class="mb-4">
        <h4 class="mb-3">Payment</h4>
        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="payment" value="Cash On Dilivery" type="radio" class="custom-control-input" checked="" required="">
            <label class="custom-control-label" for="credit">Cash On Dilivery</label>
          </div>

        <!--div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>-->
        </div>
        <div class="row">
      <!--<div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required="">
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>-->
      <!--<div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required="">
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>-->
        </div>
    <div class="row">
          <!--<div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>-->
          <!--<div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>-->
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" name="pay" type="submit">checkout</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">© 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script>-->

</body>
</body>
</html>
