<?php
include 'config.php';
session_start();
$query="update booked set status='Booked' where mech_uname='$_SESSION[user]'";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
 ?>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
    #matter{
      visibility: hidden;

        }

#sender{
  visibility: hidden;

}
#par{
  overflow-y: scroll;
  height: 20%;
}
    .chat{
        float: right;
      width:70%;

    }
    .chatbox{
      border: 2px solid;

      border-color: DodgerBlue;
      border-radius: 10px;
      background-image: url('cars1.png');
      background-repeat: no-repeat;
      background-size: cover;
    }
    .mech{
      height: 5%;
      width: 14%;
    }
    .send{
      height: 4%;
      width: 7%;
      float: right;
    }

    h3{
      color: white;
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
    #printoutPanel{
      float: right;

    }
    .chat{
        float: right;
          width:25%;

    }
    .chatbox{
      border: 2px solid;
      border-color: DodgerBlue;
      border-radius: 10px;
    }
    .mech{
      height: 6%;
      width: 16%;
    }
    .send{
      height: 4%;
      width: 7%;
      float: right;
    }
    #msg:focus{
          border-radius: 10px;
          border-color: white;
          border-bottom: none;
          border-left: none;

    }
    #msg{
      width: 90%;
      height: 4%;
      border-color: DodgerBlue;
      border-bottom: none;
      border-left: none;
      border-radius: 10px;

    }
    h3{
      color: white;
    }
    .header{

    }
    .im{
      width:15%;
      height: 15%;
    }
    .us{
      width: 100%;
    }
    table{
      width: 47%;

      border-top: 2px solid;
      border-color: grey;
    }
th{
  background-color: black;
  color: white;
  font-size: 100%;
}
tr{
  text-align: center;
  font-size: 120%;
}
.sub{
  cursor:pointer;
  background-color:DodgerBlue;
  color:white;
  border-color: DodgerBlue;
  padding-top:5px;
  font-size:100%;
  text-decoration:none;
  padding-bottom:5px;
  display:inline-block

}
    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="mech_login.php">Login</a>
      <a href="#">About Us</a>
      <a href="mech_logout.php">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
       <div id='printoutPanel'></div>
      <div id="myMap" style="width:72.5%;height:40%;"> </div>
    </form>
      <form class='chat' method="post">
      <div class="chatbox">
        <div class='header'>
        <img src="customer2.png" alt="" class="mech">
        <?php
        $result = $conn->query("SELECT * FROM booked where mech_uname='$_SESSION[user]'");
        while($row = $result->fetch_assoc()){
        echo "<p style=font-size:120%;color:orange;padding-left:35%;><b>$row[customer_name]</b></p>";
         }

        ?>



        <hr>
      </div>
<div class="ll">
        <div class="matter" id='matter'>

        </div>
</div>
        <input type="text" name="msg"  id="msg" placeholder="Enter your message....">
      <img src='send_icon.png'  name="send"  class="send" id='send' >
      </div>
    </form>
<form action="complete.php" method="post">
      <div class="customer_details">
        <?php
        $result1 = $conn->query("SELECT * FROM booked where mech_uname='$_SESSION[user]'");
        if($result1->num_rows > 0){
                  while($row1 = $result1->fetch_assoc()){
        $result = $conn->query("SELECT * FROM vehicle_details where uname='$row1[uname]'");
        if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                      echo "<table >
                      <tr>
                      <td rowspan=2 class='im'><img src='customer2.png' class='us'></td>
                      <th>Name</th>
                      <th>Vehicle</th>
                      <th>Vehicle Number</th>
                      <th>Mobile Number</th>
                      <td rowspan=2 style='padding-left:10px'><input type='submit' value='complete service' class='sub'></td>
                      </tr>
                      <tr>
                      <td>$row[owner]</td>
                      <td>$row[vehicle_type]</td>
                      <td>$row[vehicle_number]</td>
                      <td>$row[phno]</td>
                      </tr>



                      </table>";
                  }
                }
              }
            }
         ?>

      </div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script>
    $(document).ready(function(){
      $.ajax({
      type: "GET",
      url: "query1.php",
      dataType: "html",
      success: function(data){
          $("#matter").append(data);
            document.getElementById('matter').style.visibility="visible";
         }
         });
         setInterval(function(){
           $.ajax({
           type: "GET",
           url: "query1.php",
           dataType: "html",
           success: function(data){
               $("#matter").html(data);
                  }
              });
         },1000);

 });
        $(document).on('click','.send', function(){
          msg=document.getElementById('msg').value;
              $.ajax({
               url:"mech_chat.php",
               method:"post",
               data:{msg:msg,},
               success:function(data)
              {
           $('#msg').val('');
          }
             });

  });


    </script>

    <script type='text/javascript'>
    var map, directionsManager;

    function GetMap()
    {
        map = new Microsoft.Maps.Map('#myMap', {
            zoom:15,
            credentials: 'AqRw2EfAXR6GHshZOgyRDwjUQt31WJJDCzQCGEqQCaTzOGUX9iDzDHjVZWa5FAmC',

        });

        //Load the directions module.
        Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
            //Create an instance of the directions manager.
            directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);

           <?php

            $result = $conn->query("SELECT * FROM mech_registered where uname='$_SESSION[user]'");?>
            var shops= [<?php if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                          echo '['.$row['latitude'].', '.$row['longitude'].'],';
                      }
                  }
                  ?>];
                  <?php
                  $result1 = $conn->query("SELECT * FROM booked where mech_uname='$_SESSION[user]'");?>
                  var customer= [<?php if($result1->num_rows > 0){
                            while($row1 = $result1->fetch_assoc()){
                                echo '['.$row1['user_lat'].', '.$row1['user_lng'].'],';
                            }
                        }
                        ?>];
            //Create waypoints to route between.
            directionsManager.addWaypoint(new Microsoft.Maps.Directions.Waypoint({ address:'you',location: new Microsoft.Maps.Location(shops[0][0],shops[0][1]) }));
            directionsManager.addWaypoint(new Microsoft.Maps.Directions.Waypoint({ address:'customer',location: new Microsoft.Maps.Location(customer[0][0],customer[0][1]) }));


            //Set the request options that avoid highways and uses kilometers.
            directionsManager.setRequestOptions({
                distanceUnit: Microsoft.Maps.Directions.DistanceUnit.km,
                routeAvoidance: [Microsoft.Maps.Directions.RouteAvoidance.avoidLimitedAccessHighway]
            });

            //Make the route line thick and green. Replace the title of waypoints with an empty string to hide the default text that appears.
            directionsManager.setRenderOptions({
                drivingPolylineOptions: {
                    strokeColor: 'DodgerBlue',
                    strokeThickness: 6
                },
                waypointPushpinOptions: {


                               }
            });
    directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('printoutPanel') });

            directionsManager.calculateDirections();
                  });

    }
    </script>
        <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
    <script>

    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    <div class="">

    </div>
  </body>
</html>
