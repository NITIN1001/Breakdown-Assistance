<?php
include 'config.php';
session_start();
$query="update booked set Status='Complete' where mech_uname='$_SESSION[user]' ";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
  header( "refresh:3;url=request.php" );
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      h1{
        color: DodgerBlue;
      }
      img{
        height: 50%;
      }
    </style>
  </head>
  <body>
    <center><h1>WELL DONE YOU HAVE COMPLETED THE SERVICE</h1>
<br>
<img src="party.png" alt="">
    </center>

  </body>
</html>
