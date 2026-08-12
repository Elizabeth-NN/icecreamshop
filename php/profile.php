
<?php
  session_start();


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
  <link rel="stylesheet" href="../css/profile.css">
  <link rel="stylesheet" href="../css/main.css">

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="../fontawesome-free-5.15.3-web/css/all.css">
     <title>PROFILE</title>

   </head>
   <body style="background-color:#EE7674;">
     <nav>

       <ul>
         <li><a href="#" class logo>ICE CREAMISTRY<i class="fas fa-ice-cream"></i></a></li>
         <li><a href="../php/client.php">HOMEPAGE</a></li>
         <li>  <a href="../php/clientviewimg.php">Flavours</a></li>
         <li><a href="../php/logout.php">Log out</a></li>
       </ul>
     </nav>
     <div class="container">

       <div class="wrapper" >
         <?php

         $link=new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");




         $q=mysqli_query($link,"SELECT * FROM user");

          ?>
          <h2 style="text-align:center;">MY PROFILE</h2>
          <?php
           $row=mysqli_fetch_assoc($q);
           echo "<div ><img src='../images/per.png'  height=110 width=120></div>";
           ?>
           <div>
            <b>Welcome,</b>
           </div>
           <h4>
             <?php

              echo $_SESSION['client'];
              ?>

           </h4>


       </div>


       <?php
        $email= $_SESSION['client'];
          if ($email) {
            $q=mysqli_query($link,"SELECT * FROM user");
            $rows=mysqli_fetch_assoc($q);
            $_SESSION['name']= $rows['name'];
            $_SESSION['role']= $rows['typeuser'];

              echo "<table>";
               echo "<tr>";
                 echo "<td>";
                   echo "<b>Name:</b>";
                 echo "</td>";
                 echo "<td>";
                   echo   $_SESSION['name'];
                 echo "</td>";
               echo "</tr>";


               echo "<table>";
                echo "<tr>";
                  echo "<td>";
                    echo "<b>Email:</b>";
                  echo "</td>";
                  echo "<td>";
                    echo  $_SESSION['client'];
                  echo "</td>";
                echo "</tr>";

                echo "<table>";
                 echo "<tr>";
                   echo "<td>";
                     echo "<b>Role:</b>";
                   echo "</td>";
                   echo "<td>";
                     echo   $_SESSION['role'];
                   echo "</td>";
                 echo "</tr>";



              echo "</table>";


            }



        ?>

     </div>
   </body>
 </html>
