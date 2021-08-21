<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .signup{
        border: 2px solid;
        width: 30%;

      }
      form{
        padding-top: 3%;

      }
.uname,.psw,.cpsw{
  width: 88%;
}
.success
{
  background-color: DodgerBlue;
  color: white;
  border-radius: 5px;
  padding: 11px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
 width:88%;
  height: 7%;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 110%;
  font-weight: bold;
}
.fa{
  color: grey;
}
.acc{

}
.log{
  color: red;
}
body{
  background-image: url("mech_back.jpg");
  background-repeat: no-repeat;
  background-size: cover;

}
img{
  width: 19%;
  height: 10%;
  padding-top: 3%;
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
#d1,#d2{
  color:red;
}
    </style>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
     <a href="mech_login.php">Login</a>
      <a href="mech_signup.php">Signup</a>
      <a href="#">About Us</a>
    <a href="mech_logout.php">Log out</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <center>
    <form class="form1" name="form1" action="mech_success.php" method="post" onsubmit="return match()">
<div class="signup">
      <img src="mech.png" alt="user">
      <h1 style="color:GoldenRod">Sign Up </h1>
      <p class="fa">Please fill in this form to create an account!</p>
      <hr>
      <br> <input type="text" name="fname" placeholder="FIRST NAME">
        <input type="text" name="lname" placeholder="LAST NAME" class="lname">
        <br><br><input type="text" name="uname" placeholder="USER NAME" class="uname">
        <br><br><input type="password" name="psw" id="psw" placeholder="PASSWORD" class="psw" onblur="len()">
        <pre id='d1'></pre>
        <input type="password" name="cpsw" id="cpsw" placeholder="CONFIRM PASSWORD" class="cpsw" onblur="match()">
        <pre id='d2'></pre>
         <input type="submit" value="Sign Up" class="success">
        <br><br>
    </div>
  </form></center>
  <center><p class="acc">Already have an account?<a href="mech_login.php" class="log"> Login here</a></p></center>
  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  function len(){
  var y=document.form1.psw.value;
  if(y.length<8){
      d1.innerHTML="!Password should atleast have 8 charecters";
      document.form1.psw.focus();
  }
  else {
    d1.innerHTML="";
  }
  }
function match(){
  if(document.getElementById('cpsw').value!=document.getElementById('psw').value){
    d2.innerHTML="!Confirm Password donot match";
    document.form1.cpsw.focus();
    return false;
  }
  else{
    d2.innerHTML="";
    return true;
  }
}
  </script>
  </body>
</html>
