<?php
include 'config.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$time=date("h:i A");
$msg=$_POST['msg'];
$query="insert into help_chat(sent,msg,time,received) values('$_SESSION[uname]','$msg','$time','helper') ";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
?>
