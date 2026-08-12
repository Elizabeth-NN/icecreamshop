<?php



  $link= new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");


  if (isset($_POST['save'])) {

    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $role=$_POST['role'];
    $table="user";

    $hashedpwd=password_hash($password,PASSWORD_DEFAULT);
    $INSERT="INSERT INTO $table (name, password,email,typeuser) VALUES (?, ?, ?,?)";
    $stmt=$link->prepare($INSERT);
    $stmt->bind_param("ssss",$name,$hashedpwd, $email,$role );

    if ($stmt->execute()) {
      header("Location: ../php/userstable.php") ;
    }else {
      die("Error: Could not connect. ".$link->connect_error);
    }
    $stmt->close();
    $link->close();

  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ICE CREAMISTRY</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/main.css">
  </head>
  <body>
    <div class="hero">
      <div class="form-box">
    <form class="input-grp" action="" method="post">

      <input type="text" name="name"class="input-field" placeholder="Enter name"><br><br>
      <input type="password" name="password"class="input-field" placeholder="Enter password"><br><br>
      <input type="email" name="email"class="input-field" placeholder="Enter email"><br><br>
      <input type="text" name="role"class="input-field" placeholder="Enter role"><br><br>

      <button type="submit"class="submit-btn" name="save">Add</button>
        </div>
      </div>


    </form>

  </body>
</html>
