<?php


$link= new mysqli("localhost","E.Njuguna","Kinjo1852","icecream");
$sql="SELECT * FROM user";
$result=mysqli_query($link,$sql);
$row=$result->fetch_assoc();
$rows=mysqli_num_rows($result);
$pageRows=5;
$last=ceil($rows/$pageRows);
if ($last<1) {
  $last=1;
}

$pagenum=1;

if (isset($_GET["pn"])) {
$pagenum=preg_replace('#[^0-9]#','',$_GET["pn"]);

}
if ($pagenum<1) {
   $pagenum=$last;
}elseif ($pagenum>$last) {
$pagenum=$last;
}
$limit='LIMIT'.($pagenum-1)*$pageRows.','.$pageRows;
$sql="SELECT * FROM user $limit";
$result=mysqli_query($link,$sql);
$textline1="users (<b>$rows</b>)";
$textline2="page <b>$pagenum</b> of <b>$last</b>";

$paginationCtrls='';

if ($last!=1) {
  if ($pagenum>1) {
     $previous=$pagenum-1;
     $paginationCtrls='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">previous</a>&nbsp';

     for ($i=$pagenum-4; $i <$pagenum ; $i++) {
       if ($i>0) {
         $paginationCtrls.='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>&nbsp;';
       }

     }


  }
  $paginationCtrls.=''.$pagenum.'&nbsp;';

  for ($i=$pagenum+1; $i <$last ; $i++) {
    $paginationCtrls.='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a>&nbsp;';

    if ($i>=$pagenum+4) {
      break;
    }

  }
  if ($pagenum!=$last) {
    $next=$pagenum+1;
    $paginationCtrls.='<a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a>&nbsp;';
  }

  if ($result->num_rows > 0) {
       while ($row=$result->fetch_assoc()) {
       $name=$row["name"];
       $email=$row["email"];
       $role=$row["typeuser"];
       echo '
       <tr>
       <td>'.$name.'</td>
       <td>'.$email.'</td>
       <td>'.$role.'</td>
       <td>
       <a href="../php/updateUser.php?updateid='.$email.'"><button class="update">Update</button></a>
       </td>
       <td>
       <a href="../php/deleteUser.php?deleteid='.$email.'"><button class="delete">Delete</button></a>
        </td>
       </tr>
       ';
     }
   }

}


 ?>
