<?php
session_start();
  $link= new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");


   $output = "";

  if (isset($_POST['login'])) {

  	   $email = $_POST['email'];
  	   $role = $_POST['role'];
  	   $pass = $_POST['password'];

  	   if (empty($email)) {

  	   }else if(empty($role)){

  	   }else if(empty($pass)){

  	   }else{

         $query = "SELECT * FROM users WHERE email='$email' AND role='$role' AND password='$pass'";
         $res = mysqli_query($link,$query);


         	  if ($role == "client") {

         	  	$_SESSION['client'] = $email;
         	  	header("Location: client.php");

         	  }else if($role == "admin"){

                $_SESSION['admin'] = $email;
                header("Location: admin.php");


         	  // }
         	 $output .= "you have logged-In";
         }else{
             $output .= "Failed to login";
         }

  	   }
  }




 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
  >
    <link rel="stylesheet" href="../css/login.css">
  </head>
  <body>

    <div class="hero">
      <div class="form-box">
      <div class="button-box">
        <div id="btn">

        </div>
        <button type="button" class="toggle-btn" onclick="login()">Log in</button>
        <button type="button" class="toggle-btn" onclick="register()">Register</button>
      </div>
      <div class="">
        <form id="login"class="input-grp"  action="../php/login.php" method="POST">
          <input type="email" class="input-field" placeholder="email" name="email"required>
          <input type="password" class="input-field" placeholder="Enter Password" name="password" required><br>

          <label>Select Role</label><br>
						<select name="role" >
							<option value="">Select Role</option>
							<option value="client">client</option>
							<option value="admin">Admin</option>
						</select><br><br><br>




          <button type="submit" class="submit-btn" name="login">Log in</button>
        </form>


        <form id="register" class="input-grp" action="../php/register.php" method="post">
          <input type="text" class="input-field" placeholder="User Name" name="name" required>
          <input type="email" class="input-field" placeholder="Email address" name="email"required>
          <input type="password" class="input-field" placeholder="Enter Password" name="password" required>
          <!-- <input type="text" class="input-field" placeholder="role i.e client or admin" name="role" required> -->
          <label>Select Role</label><br>
						<select name="role" >
							<option value="">Selete Role</option>
							<option value="client">Client</option>
							<option value="admin">admin</option>
						</select><br><br>

          <button type="submit" class="submit-btn" value="register" name="register">Register</button><br>

        </form>

      </div>

        </div>

    </div>
    <script>
      var x=document.getElementById("login");
      var y=document.getElementById("register");
      var z=document.getElementById("btn");
      function register(){
        x.style.left="-400px";
        y.style.left="50px";
        z.style.left="110px";
      }
      function login(){
        x.style.left="50px";
        y.style.left="450px";
        z.style.left="0px";
      }
    </script>
  </body>
</html>
