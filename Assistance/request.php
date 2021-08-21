<?php
include 'config.php';
session_start();
 ?>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <style media="screen">
      table{
        width: 20%;
        height: 15%;
        border-top: 2px solid;
      }
      tr{
        padding-left: 2%;
      }
     img{
       width: 100%;
       }
       .sub{
         width: 100%;
         background-color: DodgerBlue;
         font-size: 110%;
         color: white;
         border: none;
         cursor: pointer;
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
       .mech_wal{
         height: 100%;
         width: 60%;
         float: right;
       }
       #na{
         visibility: hidden;
       }
     </style>
   </head>
   <body>
      <div id="mySidenav" class="sidenav">
       <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
       <a href="login.php">Login</a>
       <a href="register.php">Register</a>
       <a href="">About Us</a>
       <a href="mech_logout.php">Logout</a>
     </div>
     <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
     <img src="mech_wal.png" alt="" class="mech_wal">
     <h2>YOUR BOOKINGS</h2>
     <?php
     $req=$conn->query("select * from booked where mech_uname='$_SESSION[user]' and Status='Pending'");

       while($row = $req->fetch_assoc()){
         $req1=$conn->query("select * from vehicle_details where uname='$row[uname]'");
              while($row1 = $req1->fetch_assoc()){
         echo "<form action='mech_route.php' method='post'><table >
         <tr >
         <th class='im'rowspan=3><img src='user1.png'></th>
         <th>Name</th>
         <th>Mobile No.</th>
         </tr>
         <tr>
         <td>$row[customer_name]</td>
         <td>$row1[phno]</td>
         </tr>
         <tr>
         <td colspan=2><input type='submit' value='Accept' class='sub'></td>
         </tr>
         </table></form>";
       }
       }
      ?>
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
