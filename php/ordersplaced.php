<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="../css/usertable.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome-free-5.15.3-web/css/all.css">
    <title>USERS</title>
  </head>
  <body>

      <nav>

        <ul>
          <li><a href="#" class logo>ICE CREAMISTRY<i class="fas fa-ice-cream"></i></a></li>
          <li><a href="../php/admin.php">HOMEPAGE</a></li>
          <li>  <a href="../php/userstable.php">USERS</a></li>
          <li><a href="../php/adminviewimg.php">Flavours</a></li>
        </ul>
      </nav>
    <div class="">
    <h2 style="color:black;">Placed Orders</h2>
    <table>
      <thead>
        <tr>

        <th>Email</th>
        <th>flavor</th>
        <th>quantity</th>
        <th>location</th>
        <th>mobileNo</th>


        </tr>
      </thead>
      <tbody>
        <?php
           $link= new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");
           $sql_users="SELECT * FROM orders";
           $result=$link->query($sql_users);
             if ($result->num_rows > 0) {
                  while ($row=$result->fetch_assoc()) {

                  $email=$row["email"];
                  $flavor=$row["flavor"];
                  $quantity=$row["quantity"];
                  $location=$row["location"];
                  $mobileNo=$row["mobileNo"];
                  echo '
                  <tr>

                  <td>'.$email.'</td>
                  <td>'.$flavor.'</td>
                  <td>'.$quantity.'</td>
                  <td>'.$location.'</td>
                  <td>'.$mobileNo.'</td>
                  </tr>
                  ';
                }
              }
          ?>

      </tbody>


    </table>

  </body>
</html>
