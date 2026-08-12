<?php

//isset($_POST['save'])
if (isset($_GET['updateid'])) {


  $link= new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");
  $flavor=$_GET['updateid'];



  if (isset($_POST['save'])) {


    $price=$_POST['price'];
    $table="images";


     $UPDATE="UPDATE $table SET flavor='$flavor',price='$price' WHERE flavor='$flavor'";

     $result=mysqli_query($link,$UPDATE);

     if ( $result) {
        echo "Data updated successfully";
       header("Location: ../php/adminviewimg.php") ;
     }else {
       die("Error: Could not connect. ".$link->connect_error);
     }
   }
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
       <link rel="stylesheet" href="../css/login.css">
   </head>
   <body>
     <div class="hero">
       <div class="form-box">

     <form method="POST" action="
     " enctype="multipart/form-data">
       <input type="hidden" name="size" value="1000000"><br>
       <div>
         <input type="file" name="image" required>
       </div><br><br>
       <div>
         <textarea
           id="text"
           cols="20"
           rows="4"
           name="flavor"
           placeholder="Flovor..." required></textarea>
       </div><br><br>
       <div>
         <input type="text" name="price" placeholder="Price..." required>
       </div><br><br>
       <div>
         <button type="submit" name="save" class="submit-btn">POST</button>
       </div><br><br>
     </form>
       </div>


     </div>

   </body>
 </html>
