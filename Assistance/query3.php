<?php
include 'config.php';
session_start();
$result = $conn->query("SELECT * FROM help_chat where sent='$_SESSION[uname]' or received='$_SESSION[uname]'");
while($row = $result->fetch_assoc()){
  if($row['sent']==$_SESSION['uname']){
    echo "<br><div class='ms1' >$row[msg]<p style=float:right;font-size:10px>$row[time]</p></div>";
  }
  elseif ($row['received']==$_SESSION['uname']) {
    echo "<br><div class='ms2' >$row[msg]<p style=float:right;font-size:10px>$row[time]</p></div>";
  }
}
?>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
      .ms1{
        background-color: purple;
        width:80%;
        padding: 5px;
        font-size: 110%;
        border: 2px solid;
        border-color: purple;
        border-radius: 10px;
        color: white;
        position: relative;
        left: 15%;
  }
.ms2{
  background-color: black;
  width: 80%;
  padding: 5px;
  font-size: 110%;
  border: 2px solid;
  border-color: black;
  border-radius: 10px;
  color: white;

}
    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
