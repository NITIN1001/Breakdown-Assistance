<?php
include 'config.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$time=date("h:i A");
$msg=$_POST['msg'];
$req1=$conn->query("select * from mech_registered where name='$_SESSION[na]'");
  while($row1=$req1->fetch_assoc()){
$query="insert into chat(sent,msg,time,received) values('$_SESSION[uname]','$msg','$time','$row1[uname]') ";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
}
 ?>
