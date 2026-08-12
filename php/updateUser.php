<?php

   if(isset($_POST['save'])){


  $link= new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");
  $email=$_GET['updateid'];
  $sqlSelect="SELECT * FROM user WHERE email='$email'";
  $result=mysqli_query($link,$sqlSelect);
  $row=mysqli_fetch_assoc($result);
  $name=$row["name"];
  $role=$row["typeuser"];
  $password=$row["password"];



  if (isset($_POST['save'])) {

    $name=$_POST['name'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $table="user";

     $UPDATE="UPDATE $table SET name='$name',password='$password',email='$email',typeuser='$role' WHERE email='$email'";

     $result=mysqli_query($link,$UPDATE);
     if ( $result) {
       header("Location: ../php/userstable.php") ;
     }else {
       die("Error: Could not connect. ".$link->connect_error);
     }
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update form</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/main.css">
  </head>
  <body>
    <div class="hero">
      <div class="form-box">
    <form class="input-grp" action="" method="post">

      <input type="text" name="name"class="input-field" placeholder="Enter name"><br><br>

      <input type="password" name="password"class="input-field" placeholder="Enter password" ><br><br>

      <input type="email" name="email"class="input-field" placeholder="Enter email"><br><br>

      <input type="text" name="role"class="input-field" placeholder="Enter role" ><br><br>

      <button type="submit"class="submit-btn" name="save">Update</button>
        </div>
      </div>


    </form>

  </body>
</html>
