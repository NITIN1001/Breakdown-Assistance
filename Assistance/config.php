<?php
$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="mechanics";
$conn=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>
