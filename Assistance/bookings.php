<?php
include 'config.php';
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    body{
      background-image: url('service.png');
      background-repeat: no-repeat;
      background-size:cover;
    }
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

    </style>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="mechanics.php">Mechanics</a>
      <a href="customers.php">Customers</a>
      <a href="bookings.php">Bookings</a>
      <a href="admin_about.php">About Us</a>
      <a href="index.php">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <h1>Bookings</h1>
    <div>
    <?php
    $i=1;
    $result = $conn->query("SELECT * FROM booked");
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<table class='details' >".
    "<tr>".
    "<th  style=color:blue;font-size:150%>"."Customer"."</th>".
    "<th style=color:blue;font-size:150%>"."Mechanic"."</th>".
    "<th style=color:blue;font-size:150%>"."Booking time"."</th>".
    "<th style=color:blue;font-size:150%>"."Status"."</th>".
    "</tr>".
    "<tr>".
    "<td style=font-size:150% >".$row['customer_name']."</td>".
    "<td style=font-size:150%>".$row['mechanic_name']."</td>".
    "<td style=font-size:150%>".$row['Booked_time']."</td>".
    "<td style=font-size:150%>".$row['Status']."</td>".
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
