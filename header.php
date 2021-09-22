<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title;
         ?> </title>
<?php require_once (""); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
  <link href="../../assets/css/bootstrap-glyphicons.css" rel="stylesheet">
  <script src="../../assets/js/jQuery.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
</head>

<body>
 <header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <!--<div class="container">
        <a class="navbar-brand" href="#">-->
          <img src="http://placehold.it/200x100?text=Inventory%20Management" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./aboutUs.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropdown-toggle" id="menu1" data-toggle="dropdown">Inventory
                  <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                  <li role="presentation" class="btn-link"><a role="menuitem" href="./veg.php">Veg</a></li>
                  <li role="presentation" class="btn-link"><a role="menuitem" href="./nonVeg.php">Non-Veg</a></li>
                  <!-- <li role="presentation" class="btn-link"><a role="menuitem" href="#">JavaScript</a></li> -->
                  <!-- <li role="presentation" class="divider"></li> -->
                  <!-- <li role="presentation" class="btn-link"><a role="menuitem" href="#">About Us</a></li> -->
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
