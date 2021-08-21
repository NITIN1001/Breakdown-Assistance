<?php
session_start();
include 'config.php';
extract($_POST);
if(isset($submit))
{

	$rs= $conn->query("select * from mech_details where uname='$user' and psw='$psw'");
	$rs1= $conn->query("select * from booked where mech_uname='$user'");
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		while($row=$rs->fetch_assoc()){
			$_SESSION["user"]=$row['uname'];
			$registered=$row['registered'];
		}
		if(mysqli_num_rows($rs1)>0){
			while($row1=$rs1->fetch_assoc()){
				$status=$row1['Status'];
			}
		}
	}
}
if (isset($_SESSION["user"])&&$registered==0)
{
  header("Location:mech_register.php");
}
if (isset($_SESSION["user"])&&$registered==1&&$status=='Pending')
{
  header("Location:request.php");
}
if (isset($_SESSION["user"])&&$registered==1&&$status=='Booked')
{
  header("Location:mech_route.php");
}
 ?>
<html>
<head>
  <style media="screen">
  .er{
    color: red;
    padding-left: 43%;
  }
    .login{
      border:2px solid;
      padding: 10px;
     box-shadow: 2px 2px;
     width: 40%;
     height: 55%;
    }
    body{
      background-image: url("mech_back.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }
    form{
      padding-top: 1%;
      padding-left: 37%;
    }
    .sub{
      background-color: black;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 100%;
    }
    img{
      width: 25%;
      height: 25%;
    }
    input[type=text], input[type=password]{
    width: 100%;
   padding: 12px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #ccc;
   box-sizing: border-box;
}
h1{
  color:GoldenRod;
}
a{
 text-decoration: none;
 color: red;
}
p{
  padding-left: 12%;
  font-family: Arial, Helvetica, sans-serif;
  opacity: 0.85;
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
<body >
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="mech_login.php">Login</a>
		<a href="mech_signup.php">Signup</a>
	 <a href="mech_logout.php">Logout</a>
  </div>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<center>  <h1>Welcome To Mechanic Portal</h1></center>
<?php  if(isset($found))
 {
   echo '<p class="er">!Invalid user id or password<p>';
 } ?>
  <form method="POST" name="form1">
<div class="login">
  <center><img src="mech.png" alt="Mechanic"></center>
  <br><br><label>Username</label>
  <br><input type="text" name="user" placeholder="Enter username">
  <br><label>Password</label>
  <br><input type="password" name="psw" placeholder="Enter Password">
  <br><input type="submit" name="submit" value="Login" class="sub">
  </div>
  <p>Need an acount? <a href="mech_signup.php">Signup</a></p>
</form>
 </body>
 <script>
 function openNav() {
   document.getElementById("mySidenav").style.width = "250px";
 }

 function closeNav() {
   document.getElementById("mySidenav").style.width = "0";
 }
 </script>
</html>
