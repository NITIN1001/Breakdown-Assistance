<?php
include 'config.php';
session_start();
$msg=$_POST['msg'];
date_default_timezone_set('Asia/Kolkata');
$time=date("h:i A");
$result = $conn->query("SELECT * FROM booked where mech_uname='$_SESSION[user]'");
    while($row = $result->fetch_assoc()){
$query="insert into chat(sent,msg,time,received) values('$_SESSION[user]','$msg','$time','$row[uname]') ";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
}
 ?>
