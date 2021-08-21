<?php
include 'config.php';
session_start();
echo "<div style=color:red><h2>Mechanic Details</h2>
<hr></div>";
$result = $conn->query("SELECT * FROM mech_registered where name='$_SESSION[na]'");
if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              echo "Name :    $row[name]<br><br>Contact Details: $row[phno]<br><br>Address :<br>$row[address]<br><br>";
          }
        }
$req= $conn->query("SELECT * FROM booked where mechanic_name='$_SESSION[na]'");
while($row1=$req->fetch_assoc()){
  echo "<br>Status: $row1[Status]";
  echo "<input type='text' value='$row1[Status]' style='visibility:hidden' id='status'>";
  if($row1['Status']=="Complete"){
    echo "<br><br><a href=feedback.php style='background-color:DodgerBlue;padding:10px;padding-botton:10px;display:inline-block;text-decoration:none;color:white'>Give Feedback</a>
<a href=search.php style='background-color:DodgerBlue;padding:10px;display:inline-block;text-decoration:none;color:white'>Request service</a>";
  }
}
?>
