<?php
$link=new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");


if (isset($_GET['deleteid'])) {

   $email=$_GET['deleteid'];
   $sql="DELETE FROM user WHERE email=?";

   $stmt=$link->prepare($sql);
   $stmt->bind_param("s",$email);

    if ($stmt->execute()) {
     header("Location: ../php/userstable.php") ;
   }else {
     die("Error: Could not connect. ".$link->connect_error);
   }

   $stmt->close();
   $link->close();

}























 ?>
