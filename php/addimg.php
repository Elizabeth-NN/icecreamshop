<?php


  $db = mysqli_connect("localhost","E.Njuguna","Kinjo1852","icecream");



  $msg = "";

  if (isset($_POST['upload'])) {
  	$image = $_FILES['image']['name'];
  	$flavor = mysqli_real_escape_string($db, $_POST['flavor']);
    $price=mysqli_real_escape_string($db, $_POST['price']);

  	$target = "../images/".basename($image);

  	$sql = "INSERT INTO images (image, flavor,price) VALUES ('$image', '$flavor','$price')";

  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      header("Location: ../php/adminviewimg.php") ;
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
?>
