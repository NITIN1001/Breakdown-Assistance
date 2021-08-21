<html lang="en" dir="ltr">
  <head>
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet'>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

      img{
        width:50%;
        height: 50%;
        padding-left: 5%;
      }
      .quote{
        position: absolute;
        left: 60%;
        top:2%;

      }
      body{
        background-color: white;
      }
    .head{
      color: DodgerBlue;
    }
    .dev{
      width: 60px;
      height: 60px;
    }
    h2{
      color: DarkMagenta;
      font-family: 'Arvo';
    }
.info{
  width: 50%;
  padding-left: 5%;
  font-family: 'Arvo';
  font-size: 110%;
  color: black;
  text-align:justify;
  text-justify:inter-word;
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
  <body>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="admin_home.php">Home</a>
      <a href="mechanics.php">Mechanics</a>
      <a href="customers.php">Customers</a>
      <a href="bookings.php">Bookings</a>
      <a href="admin_about.php">About Us</a>
      <a href="index.php">Logout</a>
    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <br>
    <img src="help.png" alt="">
    <div class="quote">
      <h1 class='head'><q>WE ARE THERE TO FIX IT UP</q></h1>
      <br>
      <h1 style="padding-left:80px;color:gold;">DEVELOPED BY</h1>
      <table cellspacing=10>
        <tr>
          <td><img src="dev.png" alt="" class='dev'></td>
          <td><h2>Nitin Singh</h2></td>
          <td><img src="dev.png" alt="" class='dev'></td>
          <td><h2>Keshav</h2></td>
        </tr>

        <tr>
          <td><img src="dev.png" alt="" class='dev'></td>
          <td><h2>Uday</h2></td>
          <td><img src="dev.png" alt="" class='dev'></td>
          <td><h2>Kederanath</h2></td>
        </tr>
</table>
    </div>
    <div class="info">
      <p>This is a replacement of existing on road vehicle breakdown assistance systems .In the existing systems  there are users who have their own mechanic database which is very minimal. And also they have no idea if their vehicles are brokedown or had any mechanical issue in  any long distant locations from their known mechanic shops. Users with the contacts of people at the particular place may look for help from them only if they are ready to do.It is not possible to find out the suitable mechanic for the desired service at remote locations. The only way they have is to look for any other transportation at the time of issue and then they need to get a mechanic to the particular location at which they have left their vehicle.But the proposed system can overcome these drawbacks .Here the users  of ORVBA system can search for list of mechanic at any location or the nearby locations which will help them in an unexpected situations raised by the mechanical issues of their vehicles. Only the licensed mechanics can get listed here while searching. And there are available mechanics who can come and repair the mechanical issues in the user's vehicle.
      </p>
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
