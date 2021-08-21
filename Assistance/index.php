
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.on{
  padding-top: 5%;
  padding-left: 20%;
  }
.cus{
  width: 60%;
  height:60%;
}
.customer{
  border: 2px solid;
  width: 20%;
  height:30%;
  position: absolute;
  top:35%;
  left:10%;

}
.mec{
  width: 50%;
  height:50%;
}
.mechanic{
  border: 2px solid;
  width: 20%;
  height:30%;
  position: absolute;
  top:35%;
  left:37.5%;

}
.adm{
  width: 50%;
  height:50%;
}
.admin{
  border: 2px solid;
  width: 20%;
  height:30%;
  position: absolute;
  top:35%;
  left:65%;

}
button{
  background-color: black;
  color: white;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 100%;
  height: 17%;
}
body{
  background-image: url("background.png");
  background-repeat: no-repeat;
  background-size: cover;
}
a{
  text-decoration: none;
  color: white;
}
</style>
</head>
<body>
<div class="customer">
  <center><img src="cust.png" class="cus"></center>
  <br><br><button type="button" name="button"><a href="login.php">Login to Customer Portal</a></button>
</div>
<h1 class="on">ON ROAD VEHICLE BREAKDOWN ASSISTANCE</h1>
<div class="mechanic">
  <center><img src="mech.png" class="mec"></center>
  <br><br><br><button type="button" name="button"><a href="mech_login.php">Login to Mechanic Portal</a></button>
</div>
<div class="admin">
  <center><img src="admin.png" class="adm"></center>
  <br><br><br><button type="button" name="button"><a href="admin_home.php">Login to Admin Portal</button>
</div>

</body>
</html>
