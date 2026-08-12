<?php

$email=$_POST['email'];
$flavor=$_POST['flavor'];
$quantity=$_POST['quantity'];
$location=$_POST['location'];
$password=$_POST['password'];
$mobileNo=$_POST['mobileNo'];
$table="orders";

$link= new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");

    if ($link===false) {
        die("Error: Could not connect. ".mysqli_connect_error());
    }

    $sql="INSERT INTO $table (email, flavor,quantity,location,password,mobileNo) VALUES ('$email', '$flavor', '$quantity','$location','$password','$mobileNo')";
    if(mysqli_query($link,$sql)){
        header("Location: ../html/orderPlaced.html");
    }
    else {
        echo "ERROR: Could not able to execute $sql. " .mysqli_error($link);
    }

    mysqli_close($link);



 ?>
