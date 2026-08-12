
<?php
  $db = mysqli_connect("localhost","E.Njuguna","Kinjo1852","icecream");


  $result = mysqli_query($db, "SELECT * FROM images");
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
a {
 text-decoration: none;
 display: block;
 text-align: center;
 font-size: 30px;
 padding: 15px 25px;
 color: #9D6381;
}
a:hover{
  color: #EE7674;
}
input{
  display: none;
}

h1{
  font-weight: normal;
  font-size: 35px;
  position: relative;
  margin: 40px 0;
  color: #9D6381;
  text-align: center;

}
h1::before{
  content: '';
  position: absolute;
  width: 100px;
  height: 3px;
  background-color:#EE7674;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  animation: animate 4s linear infinite;
}
@keyframes animate {
  0%{
    width: 100px;
  }
  50%{
    width: 200px;
  }
  100%{
    width: 100px;
  }
}

.top-content{
  background-color: #FFFAFA;
  width: 90%;
  margin: 0 auto 20px auto;
  display: flex;
  align-items: center;
  border-radius: 5px;
  box-shadow: 3px 3px 5px #EE7674;
}
h3{
  height: 100%;
  background-color: #EE7674;
  line-height: 60px;
  padding: 0 50px;
  color: #FFFAFA;
}
label{
  display: inline-block;
  height: 100%;
  margin: 0 20px;
  line-height: 60px;
  font-size: 18px;
  color: green;
  cursor: pointer;
  transition: .5s;

}
label:hover{
 color:#9D6381;

}
   #content{

    width: 90%;
    margin:auto;
    display:grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 20px;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{

    position: relative;
    height: 230px;
    border-radius:10px;
    box-shadow: 3px 3px 5px #9DBF9E;
    cursor: pointer;
    transition: .5s;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
     width: 80%;
     height: 80%;
     border-radius: 10px;
   }
</style>
</head>
<body>

  <div class="container">
    <h1>YUMMY FLAVOURS</h1>
    <div class="top-content">
      <h3>we care about your happiness</h3>
      <a href="../php/client.php">HOMEPAGE</a>
      <a href="../html/order.html">ORDER NOW</a>
      <a href="../cart/index.php">MY CART</a>


      <a href="#" class="nav-link"><?php echo $_SESSION['client']; ?></a>
    </div>
<div id="content">



  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div' >";
      	echo "<img src=".$row['image']." >";
      	echo "<p>".$row['flavor']."</p>";
        echo "<p>".$row['price']."</p>";
      echo "</div>";
    }
  ?>


</div>
</body>
</html>
