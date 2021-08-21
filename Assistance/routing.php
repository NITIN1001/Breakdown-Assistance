<?php include 'config.php';
session_start();
$_SESSION['na']=$_POST['na'];

?>
<?php
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$time=date("h:i:sa");
$req=$conn->query("select * from user_details where uname='$_SESSION[uname]'");
$req1=$conn->query("select * from mech_registered where name='$_POST[na]'");
$req2=$conn->query("select * from booked where uname='$_SESSION[uname]'");
if($req2->num_rows==0){
  $ac=0;
}
else {
  $ac=1;
}
if($ac==0){
  while($row = $req->fetch_assoc()){
    while($row1=$req1->fetch_assoc()){
 $query="insert into booked(customer_name,user_lat,user_lng,mechanic_name,Booked_time,uname,mech_uname,status) values('$row[firstname]','$user_lat',$user_lng,'$_POST[na]','$time','$_SESSION[uname]','$row1[uname]','Pending') ";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
}
}
}
 ?>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <script type='text/javascript'>
    function GetMap()
    {
        map = new Microsoft.Maps.Map('#myMap', {
            credentials: 'AqRw2EfAXR6GHshZOgyRDwjUQt31WJJDCzQCGEqQCaTzOGUX9iDzDHjVZWa5FAmC'
        });

        //Load the directions module.
        Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
            //Create an instance of the directions manager.
            directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);

            navigator.geolocation.getCurrentPosition(function (position) {

           <?php
            extract($_POST);
            $result = $conn->query("SELECT * FROM mech_registered where name='$na'");?>
            var shops= [<?php if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                          echo '['.$row['latitude'].', '.$row['longitude'].'],';
                      }
                  }
                  ?>];
            //Create waypoints to route between.
            directionsManager.addWaypoint(new Microsoft.Maps.Directions.Waypoint({ address:'you',location: new Microsoft.Maps.Location(position.coords.latitude,position.coords.longitude) }));
            directionsManager.addWaypoint(new Microsoft.Maps.Directions.Waypoint({ address:'shop',location: new Microsoft.Maps.Location(shops[0][0],shops[0][1]) }));

            //Set the request options that avoid highways and uses kilometers.
            directionsManager.setRequestOptions({
                distanceUnit: Microsoft.Maps.Directions.DistanceUnit.km,
                routeAvoidance: [Microsoft.Maps.Directions.RouteAvoidance.avoidLimitedAccessHighway]
            });

            //Make the route line thick and green. Replace the title of waypoints with an empty string to hide the default text that appears.
            directionsManager.setRenderOptions({
                drivingPolylineOptions: {
                    strokeColor: 'green',
                    strokeThickness: 6
                },

            });

            //Calculate directions.
            directionsManager.calculateDirections();
        });
      });
    }
    </script>
        <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
<style media="screen">

  #matter{
    visibility: hidden;

  }
  .chat{
      float: right;
        width:25%;

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
  #msg:focus{
        border-radius: 10px;
        border-color: DodgerBlue;
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

  .details{

    width: 70%;
    background-image: url('deta.png');
    background-repeat: no-repeat;
    background-size: cover;
    color: black;
    padding: 10px 5px;

  }
  .det{
    float: left;
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

  #result{
    float: left;
  }
</style>
</head>

<body>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <a href="">About Us</a>
    <a href="logout.php">Logout</a>
  </div>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <div id="myMap" style="width:100%;height:40%"> </div>


    <form class="det" >
      <div class="details" id="details">

      </div>
        </form>
    <form class='chat' method="post">
    <div class="chatbox">
      <div class='header'>
      <img src="chat_mech.png" alt="" class="mech">
      <?php  echo "<center><p style=color:orange;font-size:120%;><b>$na</b></p></center>";?>

      <hr>
    </div>
      <div class="matter" id='matter'>

      </div>

      <input type="text" name="msg"  id="msg" placeholder="Enter your message....">
    <img src='send_icon.png'  name="send"  class="send" id='send' >
    </div>
  </form>
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script>


$(document).ready(function(){
   $('#details').load("query.php");
    document.getElementById('matter').style.visibility="visible";
   setInterval(function(){
     $('#details').load("query.php");
   },1000);

 });


 $(document).ready(function(){
   $.ajax({
   type: "GET",
   url: "query2.php",
   dataType: "html",
   success: function(data){
       $("#matter").append(data);
         document.getElementById('matter').style.visibility="visible";
      }
      });
      setInterval(function(){
        $.ajax({
        type: "GET",
        url: "query2.php",
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
            url:"insert_chat.php",
            method:"post",
            data:{msg:msg,},
            success:function(data)
           {
        $('#msg').val('');
       }
          });

});


</script>
    <script type="text/javascript">
    var status=document.getElementById('status').value;
    if(status=="Complete"){
      window.location.href = 'feedback.php';
    }
  function openNav() {
     document.getElementById("mySidenav").style.width = "250px";
   }

   function closeNav() {
     document.getElementById("mySidenav").style.width = "0";
   }

    </script>

</body>
</html>
