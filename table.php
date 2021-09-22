<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title;
         ?> </title>
<?php require_once ("../config/dbConfig.php"); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
  <link href="../../assets/css/bootstrap-glyphicons.css" rel="stylesheet">
  <script src="../../assets/js/jQuery.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
</head>

<body>

<style>
.col-25 {
  float: left;
  width: 10%;
  margin-top: 7px;
}

.col-75 {
  float: left;
  width: 15%;
  margin-top: 13px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
  .btn-primary{

    border-color: #121519;
  }
   body{
    
    background-color: #cec3c3;
    
   }

   #myMenu{
     display:none;
   }
  </style>
 <body>

 <div class="container">
     <h1 align="center">VEG INVENTORY CONTROL</h1>
    <form action="./action_page.php" type="get">
     <div class="row">
      <div class="col-25">
       <label><i class="fa fa-calendar-o"></i><b>DATE</b></label>
      </div>
    <div class="col-75">
      <input class="w3-input w3-border" type="date" placeholder="DD MM YYYY" name="date">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname"><b>TIME</b></label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" placeholder="time">
    </div>
  </div>

 <div class="row">
    <div class="col-25">
      <label for="country"><b>TOTAL ITEM</b></label>
    </div>
    <div class="col-75">
        <input type="text" id="lname" name="lastname">
    </div>
  </div>
</div>
  <br>
      <button type="button" class="btn btn-primary btn-lg" onclick="openMenu()">MENU</button>
      <input type="submit" class="btn btn-primary btn-lg" value="ADD ITEM"/>
      <button type="button" class="btn btn-primary btn-lg">DELETE ITEM</button>
</div> 
</form>
<div id="myMenu" value="false">
<?php
  require("stock33.php");
?>
</div>
    
<script>
  function openMenu() {
    document.getElementById("myMenu").style.display ="block"
  }
</script>