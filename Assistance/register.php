<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    body{
      background-image: url("poster.png");
      background-repeat: no-repeat;
      background-size: cover;
    }
      .vehicle{
        border: 2px solid;
        width: 50%;
        background-color: black;
      }

      .details{
        border: 2px solid;
        width: 50%;
        height:60%;
      }
      .owner,.type,.vehicle_name,.vehicle_model{
        position: absolute;
        left: 38%;
        color: Tomato;
      }
     .name{
       position: absolute;
       left: 38%;
       width: 24%;
       margin: 8px 0;
       display: inline-block;
       border: 1px solid DodgerBlue;
       box-sizing: border-box;
       height:5%;
     }
     .vechicle_type{
       position: absolute;
       left: 38%;
       color: green;
       width: 24%;
       height:5%;
       margin: 8px 0;
       display: inline-block;
       border: 1px solid DodgerBlue;
       box-sizing: border-box;
     }
     .na{
       position: absolute;
       left: 38%;
       height:5%;
       width:24%;
       margin: 8px 0;
       display: inline-block;
       border: 1px solid DodgerBlue;
       box-sizing: border-box;
     }

     .model{
       position: absolute;
       left: 38%;
       height:5%;
       width: 24%;
       margin: 8px 0;
       display: inline-block;
       border: 1px solid DodgerBlue;
       box-sizing: border-box;
     }

     .submit{
       background-color: DodgerBlue;
       color: white;
       padding: 14px 20px;
       margin: 8px 0;
       border: none;
       cursor: pointer;
       width: 100%;
       font-family: Arial, Helvetica, sans-serif;
       font-size: 100%;
     }
     .reg{
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
     .ban{

      height:40%;
       width: 100%
       }
    </style>
  </head>
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="search.php">Search</a>
      <a href="logout.php">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <center>
    <div class="vehicle">
      <span style="background-color:white">
  <img src="register_banner.png" alt="" class="ban">
</span>
      <h1 class='reg'>Register Your Vehicle</h1>
      <form class="" action="vehicle_details.php" method="post">
        <div class="details">
          <br>
        <label class="owner">Vehicle Owner</label>
        <br>
        <input type="text" name="owner" class='name' value="" placeholder="Enter vechicle owner name..">
        <br>
        <br>
        <br>
        <label class='type'> Vehicle Type</label>
        <br>
        <select class="vechicle_type" name="vehicle_type">
          <option>Motor cycle</option>
          <option>Car</option>
          <option>Truck</option>
          <option>Other</option>
        </select>
        <br>
        <br>
        <br>
        <label class='vehicle_name'>Vehicle Number</label>
        <br>
        <input type="text" class='na' name="vehicle_number" value="" placeholder="Enter vehicle number..">
        <br>
        <br>
        <br>
        <label class='vehicle_model'>Mobile Number</label>
        <br>
        <input type="text" name="phno" value="" class='model' placeholder="Enter mobile number..">
        <br>
        <br>
        <br>
        <input type="submit" name="" value="Submit" class="submit">

      </div>
<script type="text/javascript">
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
      </form>
    </div>
  </center>
  </body>
</html>
