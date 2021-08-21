<?php
include 'config.php';
session_start();
$query="insert into feedback(uname,rating,feed,mech_name) values('$_SESSION[uname]',$_POST[rating],'$_POST[feed1]','$_SESSION[na]') ";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
$req1=$conn->query("select * from mech_registered where name='$_SESSION[na]'");
  while($row1=$req1->fetch_assoc()){
    $rat=(int)(($row1['rating']+$_POST['rating'])/2);
  }

$query1="update mech_registered set rating=$rat where name='$_SESSION[na]'";
$rs1=mysqli_query($conn,$query1)or die("Could Not Perform the Query");
header( "refresh:3;url=search.php" );
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center><h1>Thank you for your feedback</h1></center>
  </body>
</html>
