<?php include 'config.php'; ?>
<?php
session_start();
echo "<span class='uname'><h3>$_SESSION[user]</h3></span>";
$query="update mech_details set registered=1 where uname='$_SESSION[user]'";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
 ?>
<?php
$lat=$_POST['lat'];
$long=$_POST['long'];
$query="insert mech_registered(name,uname,rating,latitude,longitude,phno,address) values('$_POST[na]','$_SESSION[user]',3,'$lat','$long','$_POST[phno]','$_POST[add]')";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .uname{
      background-color: black;
      color: white;

      float: right;
      border-radius: 6px;
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
    .success{
      height: 50%;
      width: 30%;
    }
    .suc{
      border: 2px solid;

    }
    </style>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="mech_login.php">Login</a>
      <a href="#">About Us</a>
      <a href="mech_logout.php">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <?php
    header( "refresh:5;url=request.php" );
    echo "<center><img src='success1.png' class='success'></center>
    <h2 style=color:DodgerBlue;padding-left:37%;>Registration Success</h2>
    <p style=padding-left:37%;>You will be Redirected.....</p>";
  ?>
    <script type="text/javascript">
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
  </body>
</html>
