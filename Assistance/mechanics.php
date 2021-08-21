<?php
include 'config.php';
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .im{
      width: 15%;
      height:15%;
    }
    .details{
      border-top: 2px solid;
      border-color: grey;
      width: 40%;
    }
    .us{
      width:100%;
    }
    td{
      text-align: center;
    }
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }
    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }
    body{
      background-image: url('service.png');
      background-repeat: no-repeat;
      background-size:cover;
    }
    </style>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="admin_home.php">Home</a>
      <a href="mechanics.php">Mechanics</a>
      <a href="customers.php">Customers</a>
      <a href="bookings.php">Bookings</a>
      <a href="admin_about.php">About Us</a>
      <a href="index.php">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <h1>Registered Mechanics</h1>
    <div>
    <?php
    $i=1;
    $result = $conn->query("SELECT * FROM mech_registered");
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<table class='details' >".
    "<tr>".
    "<th rowspan=2 class='im'>"."<img src='mech.png' class='us'>"."</th>".
    "<th style=color:blue;font-size:150%>"."Name"."</th>".
    "<th style=color:blue;font-size:150%>"."Rating"."</th>".
    "</tr>".
    "<tr>".
    "<td style=font-size:150% id='name$i' >".$row['name']."<input type='hidden' name='na' value=$row[name]>"."</td>".
    "<td style=font-size:150%>"."<center>"."<img src='$row[rating].png' style=width:50%>"."</center>"."</td>".
    "</tr>".
    "</table>";
    $i++;

    }
    }
    ?>
  </div>
  <script>

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
  </body>
</html>
