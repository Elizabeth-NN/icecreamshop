<?php
  // Create database connection
  $db = mysqli_connect("localhost","E.Njuguna","Kinjo1852","icecream");


  $result = mysqli_query($db, "SELECT * FROM images");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/usertable.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome-free-5.15.3-web/css/all.css">
    <title>Flavours</title>
  </head>
  <style media="screen">
    img{
    width:150px;
    height:150px;

    }
  </style>
  <body>
    <nav>

      <ul>
        <li><a href="#" class logo>ICE CREAMISTRY<i class="fas fa-ice-cream"></i></a></li>
        <li><a href="../php/admin.php">HOMEPAGE</a></li>
        <li>  <a href="../php/ordersplaced.php">ORDERS</a></li>
        <li><a href="../php/userstable.php">Registered Users</a></li>
      </ul>
    </nav>
    <div class=""><br>
    <h2 style="color:black;">Flavours</h2><br>
    <a href="../html/addimgform.html" ><button type="button" class="add"name="save">Add Flavor</button></a>
    </div>
    <table>
      <thead>
        <tr>
        <th>Image</th>
        <th>Price</th>
        <th>Flavor</th>
        <th>Update</th>
        <th>Delete</th>

        </tr>
      </thead>
      <tbody>
        <?php
           $link=  mysqli_connect("localhost","E.Njuguna","Kinjo1852","icecream");
           $sql_users="SELECT * FROM images";
           $result=$link->query($sql_users);
             if ($result->num_rows > 0) {
                  while ($row=$result->fetch_assoc()) {

                  echo '
                  <tr>
                  <td>'."<img src='../images/".$row['image']."' >".'</td>
                  <td>'.$row['price'].'</td>
                  <td>'.$row['flavor'].'</td>

                  <td>
                  <a href="../php/updateimg.php?updateid='.$row['flavor'].'"><button class="update">Update</button></a>
                  </td>
                  <td>
                  <a href="../php/deleteimg.php?deleteid='.$row['flavor'].'"><button class="delete">Delete</button></a>
                   </td>
                  </tr>
                  ';
                }
              }
          ?>

      </tbody>


    </table>

  </body>
</html>
