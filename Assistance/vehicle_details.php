<?php
include 'config.php';
session_start();
extract($_POST);
$query="insert into vehicle_details(uname,owner,vehicle_type,vehicle_number,phno) values('$_SESSION[uname]','$owner','$vehicle_type','$vehicle_number','$phno') ";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
header( "refresh:5;url=search.php" );
echo "<center><img src='success1.png' class='success'></center>
<h2 style=color:DodgerBlue;padding-left:43%;>Registration Success</h2>
<h2 style=padding-left:43%;>You will be Redirected.....</h2>";

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style media="screen">
    .success{
      height: 50%;
      width: 30%;
    }
    </style>
  </body>
</html>
