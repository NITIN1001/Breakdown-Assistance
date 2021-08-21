<?php include 'config.php'; ?>

<html>
<head>
<script>

var map, searchManager;

   function GetMap() {
       map = new Microsoft.Maps.Map('#myMap', {
           credentials: 'AqRw2EfAXR6GHshZOgyRDwjUQt31WJJDCzQCGEqQCaTzOGUX9iDzDHjVZWa5FAmC'
       });
 var address=document.getElementById('address').value;

       geocodeQuery(address);
   }

   function geocodeQuery(query) {
       //If search manager is not defined, load the search module.
       if (!searchManager) {
           //Create an instance of the search manager and call the geocodeQuery function again.
           Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
               searchManager = new Microsoft.Maps.Search.SearchManager(map);
               geocodeQuery(query);
           });
       } else {
           var searchRequest = {
               where: query,
               callback: function (r) {
                   //Add the first result to the map and zoom into it.
                   if (r && r.results && r.results.length > 0) {
                       var pin = new Microsoft.Maps.Pushpin(r.results[0].location);
                       document.getElementById('lat').value=r.results[0].location.latitude;
                         document.getElementById('long').value=r.results[0].location.longitude;
                       map.entities.push(pin);

                       map.setView({ bounds: r.results[0].bestView });
                   }
               },
               errorCallback: function (e) {
                   //If there is an error, alert the user about it.
                   alert("No results found.");
               }
           };

           //Make the geocode request.
           searchManager.geocode(searchRequest);
       }
   }

   </script>
<script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
</head>
<body>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="mech_login.php">Login</a>
    <a href="mech_register.php">Register</a>
    <a href="#">About Us</a>
    <a href="logout.php">Logout</a>
  </div>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
  <form  action="register_success.php" method="post">

  <div id="myMap" style="position:relative;width:100%;height:40%;"></div>
  <input type='text' id='lat' name='lat'>
  <input type='text' id='long' name='long'>
    <div class='cdetails'>
      <h1>Confirm Details</h1>

      <label>Mechanic Name</label>
      <br>
  <input type="text" name="na" value="<?php echo "$_POST[na]" ?>">
  <br>
  <label>Mobile Number</label>
  <br>
    <input type="text" name="phno" value="<?php echo "$_POST[phno]" ?>">
    <br>
    <label>Address</label>
    <br>
  <input type="text" name="add" value="<?php echo "$_POST[add]"?>" id='address'>
  <br>
  <br>
  <input type="submit"  value="Confirm Location and Details" class="sub">
  <br>
  <div>
    <br>
</form>
<style media="screen">
  #lat{
    visibility: hidden;
    }
    #long{
      visibility: hidden;
    }
    .cdetails{
      width: 40%;
      border: 2px solid;
      padding-left: 2%;
      font-size: 110%;
      background-image: url('pink.png');
      background-repeat: no-repeat;
      background-size: cover;
      color: white;
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
    .sub{
      background-color: DodgerBlue;
      color: white;
      cursor: pointer;
    }
    h1{
      color:orange;
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
