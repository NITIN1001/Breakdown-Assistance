                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
<html>
<head>
<title>User Signup</title>
</head>
<style>
.head1{
color:blue;
width:50%;
height:40%;
font-size:150%;
}
a{
 text-decoration: none;
 color: red;
}
img{
  height: 50%;

}
</style>
<body>
<?php
extract($_POST);
include("config.php");
$rs=mysqli_query($conn,"select * from mech_details where uname='$uname'");
if (mysqli_num_rows($rs)>0)
{

   echo "<br><br><center><div class=head1>Username Already Exists
   <br><br><a href='mech_signup.php'>Back</a></div></center>";

  exit;
}
$query="insert into mech_details(firstname,lastname,uname,psw,cpsw) values('$fname','$lname','$uname','$psw','$cpsw')";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
echo "<center><img src='suc.png'>
<h2>Username $uname created successfully</h2>
<p>click here to login <a href='mech_login.php'>login</a></center>";
?>
</body>
</html>
          
