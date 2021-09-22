<?php
    $title="Home";
    require("header.php");

     $result=selectAll("users");
     print_r($result);

     $result=selectAllWhere("users","email='sonusanwal65@gmail.com'");
     print_r($result);

    $result=selectFieldWhere("users",['email','firstName','lastName'],"email='sonusanwal65@gmail.com'");
    print_r($result);

    if(insertInto(['email@email.com','password','suraj','sanwal'],"users")){
      echo "data added sucessfully";
    }else{
      echo "error";
    }
    

    if(insertIntoFields(['email','password,'firstName','lastName'].['email@email.com','password','suraj','sanwal'],"users")){
      echo "data added sucessfully";
    }else{
      echo "error";
    }

    if(updateField("firstName","users","Sonu","email='sonusanwal65@)gmail.com'")){
      echo "data updated sucessfully";
    }else{
      echo "error";
    }

     
?   