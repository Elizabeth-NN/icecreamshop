<?php
$db=new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");


if (isset($_GET['deleteid'])) {
  $flavor=$_GET['deleteid'];

  $delete = "DELETE from images where flavor =?
 ";
 $stmt=$db->prepare($delete);
 $stmt->bind_param("s",$flavor);


 if ($stmt->execute()) {

     header('location:../php/adminviewimg.php');
  }else {
    die("Error: Could not connect. ".$link->connect_error);
  }
  $stmt->close();
  $link->close();

}
