<?php
include "config.php";
session_start();
?>
<html>
   <head>
      <style>
         #map {
         height: 40%;
         }

         .us{
           width: 100%;

         }

        table{
           width: 40%;

         }
         html,
         body {
         height: 100%;
         margin: 0;
         padding: 0;
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
         .poster{
           float: right;
           width: 60%;
           height:inherit;

         }
         @media screen and (max-height: 450px) {
           .sidenav {padding-top: 15px;}
           .sidenav a {font-size: 18px;}
         }
         .im{
           width: 15%;
           height:15%;
         }
         .details{
           border-top: 2px solid;
           border-color: grey;
         }
         p{
           float: right;
         }
         .user_lat,.user_lng{
          visibility: hidden;
         }

      </style>
   </head>
   <body>
     <div id="mySidenav" class="sidenav">
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
       <a href="login.php">Login</a>
       <a href="register.php">Register</a>
       <a href="aboutus.php">About Us</a>
       <a href="logout.php">Logout</a>
     </div>
     <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
           <div id="map"></div>
      <img src="mec_poster.png" alt="poster" class="poster">

        <?php
        $i=1;
        $result = $conn->query("SELECT * FROM mech_registered");
        if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
       echo "<form action='routing.php' method='post' class='f$i' >"."<input type='text' id='user_lat$i' name='user_lat' class='user_lat'>"."<input type='text' id='user_lng$i' name='user_lng' class='user_lng'>".
       "<table class='details'>".
       "<tr>".
       "<th rowspan=3 class='im'>"."<img src='mech.png' class='us'>"."</th>".
       "<th style=color:blue;font-size:150%>"."Name"."</th>".
       "<th style=color:blue;font-size:150%>"."Rating"."</th>".
       "</tr>".
       "<tr>".
       "<td style=font-size:150% id='name$i' >".$row['name']."<input type='hidden' name='na' value=$row[name]>"."</td>".
      "<td style=font-size:150%>"."<center>"."<img src='$row[rating].png' style=width:50%>"."</center>"."</td>".
       "</tr>".
       "<tr>".
       "<td colspan=2>"."<input name='submit' type='submit' onclick='check()' style=width:100%;cursor:pointer;background-color:black;color:white;padding-top:10px;font-size:110%;text-decoration:none;padding-bottom:10px;display:inline-block  value='Book'>"."</td>".
       "</table>"."</form>";
       $i++;

  }
}
  ?>

   </body>
   <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkts0JUc8M6Q_vvEspvkMRo18gq7_63jE&callback=initMap"></script>
<script>
navigator.geolocation.getCurrentPosition(
   function (position) {
      initMap(position.coords.latitude, position.coords.longitude)
   },
   function errorCallback(error) {
      console.log(error)
   }
);
function initMap(lat, lng) {
  var i;
  var icon={
    url:"mech_icon.png",
    scaledSize: new google.maps.Size(50, 50),
  };
  var icon1={
    url:"map_icon.png",
    scaledSize: new google.maps.Size(50, 50),
  };
 var bounds = new google.maps.LatLngBounds();
   var myLatLng = {
      lat,
      lng
   };

   var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: myLatLng
});
var marker = new google.maps.Marker({
   position: myLatLng,
   map: map,
   icon:icon1,
   title:"You",
});
   <?php
   $result = $conn->query("SELECT * FROM mech_registered");?>
   var shops= [<?php if($result->num_rows > 0){
             while($row = $result->fetch_assoc()){
                 echo '['.$row['latitude'].', '.$row['longitude'].'],';
             }
         }
         ?>];
       for( i = 0; i < shops.length; i++ ) {
         document.getElementById('user_lat'+(i+1)).value=lat;
         document.getElementById('user_lng'+(i+1)).value=lng;
        var position = new google.maps.LatLng(shops[i][0], shops[i][1]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: icon,
            title:'Shop'+(i+1),
      });

 }
  map.fitBounds(bounds);
  }
  </script>
  <?php
  $result = $conn->query("SELECT * FROM vehicle_details where uname='$_SESSION[uname]'");
  if($result->num_rows==0){
    echo "<script>alert('Register to continue..')</script>";

  }
   ?>
  <script>

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</html>
