<?php
session_start();
echo "<span class='uname'>$_SESSION[user]</span>";
 ?>
<html lang="en" dir="ltr">
  <head>
<style media="screen">
  form{
    padding-left: 2%;
  }
  .uname{
    float: right;
    background-color: black;
    color: white;
    font-size: 120%;
  }
  input{
   width: 90%;
   padding: 8px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #ccc;
   box-sizing: border-box;
   font-size: 110%;
  }
  .register{
    border: 2px solid;
    background-color: black;
    color: Tomato;
    width: 30%;
    padding-left: 2%;
    padding-top: 2%;
}
label{
  font-size: 110%;
}
.sub{
  background-color: DodgerBlue;
  color: white;
  font-size: 120%;
  font-family: serif;
  font-weight: bold;
  border: none;
  cursor: pointer;
}
.add{
   margin: 8px 0;
  height: 10%;
  width: 90%;
  padding: 4px 15px;
  font-size: 110%;
  overflow: auto;
}
h1{
  color:white;
}
.ban{
  padding-top: 2%;
  float: right;
  width: 55%;
  height: 100%;
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
    <title></title>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="mech_login.php">Login</a>
      <a href="mech_register.php">Register</a>
      <a href="#">About Us</a>
      <a href="mech_logout.php">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <br>
    <img src="register_banner.png" alt="" class="ban">
    <br>
    <form  action="register_confirm.php" method="post">
      <div class='register'>
        <h1>REGISTER</h1>
    <label>Shop name</label>
    <br>
    <input type="text" name="" value="" placeholder="Enter shop name">
    <br>
    <br>
    <label>Owner</label>
    <br>
    <input type="text" placeholder="Enter shop Owner">
    <br>
    <br>
    <label>Mechanic name</label>
    <br>
    <input type="text" name="na" value="" placeholder="Enter mechanic name">
    <br>
    <br>
    <label>Mobile number</label>
    <br>
    <input type="text" name="phno" value="" placeholder="Enter shop Telephone no.">
    <br>
    <br>
    <label>Address</label>
    <br>
    <input type="text" name="add" value="" class='add' placeholder="Enter shop address..." id='add'>
    <br>
    <br>
    <input type="submit" name="sub" value="Submit" class="sub" >
    <br>
  </div>
 </form>


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
