<?php

   $link= new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");

   $output = "";

  if (isset($_POST['register'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    $table="user";

    $error = array();
   if (empty($name)) {
     $error['error'] = "Username is Empty";
   }elseif (empty($email)) {
     $error['error'] = "Email is empty";
   }elseif (empty($role)) {
     $error['error'] = "Select role";
   }elseif (empty($password)) {
     $error['error'] = "Enter Password";
   }



    if (isset($error['error'])) {
      $output .= $error['error'];
    }else{
      $output .= "";
    }





    if (count($error) < 1) {

        $hashedpwd=password_hash($password,PASSWORD_DEFAULT);
        $INSERT="INSERT INTO $table (name, password,email,typeuser) VALUES (?, ?, ?,?)";
        $stmt=$link->prepare($INSERT);
        $stmt->bind_param("ssss",$name,$hashedpwd, $email,$role );



        if ($stmt->execute()) {

          header("Location: ../html/registeredsuccessful.html");
        }else{
          $output .= "Failed to register";
          header("Location: ../php/login.php");
        }
        $stmt->close();
        $link->close();
  }
}

?>
