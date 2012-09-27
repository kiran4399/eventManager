<?php
  session_start();
  if (empty($_SESSION['username'])) {    
    include('includes/head.php');      
  die('<center><div class="alert" style="width:450px;">
      <strong>Warning!</strong> You must be logged in to see this page. <a href="index.php">Go to start page.</a>
    </div></center>');

}
?>
<html>
<head>
    <title>BookMyEvent</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <style type="text/css">
      #tableHeading{
        padding: 100px;
      }
    </style>
</head>
<body>
    
    <div class="hero-unit" id="header">
      <center>
          <h1>BookMyEvent</h1>
          <p>Event Manager</p>
        </center>
    </div>
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
        <a class="brand" href="/cs251Assign4/index.php">Home</a>
        <ul class="nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        </ul>
        <div id="logout">
        <a href="logout.php"><span class="label label-important">Logout</span></a>
        </div>
        </div>
    </div>
    
    <div id="nav">
            <ul class="nav nav-pills nav-stacked" id="list">
              <li class="active"><a href="manage.php">Add new booking</a></li>
              <li><a href="#">Cancel Bookings</a></li>
              <li><a href="#">My Bookings</a></li>
            </ul>
    </div>

    <div id="table">
      <center>
      <table border="1" width="50%" cellpadding="50px">
      <COLGROUP span="3">
      <tr id="tableHeading">
        <th>Event</th>
        <th>Room No.</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
      </COLGROUP>
      <tr width="30%">
        <td>CS210 Class</td>
        <td>CS101</td>
        <td>date</td>
        <td>time</td>
      </tr>
      <tr>
        <td>CS251</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>CS310</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </center>
</div>

<!--<center><div id="twitter"><?php include "twitter.php"; ?></div></center>

    <?php
    include "aboutButton.html";
    ?>
-->

</body>
</html>
 
          <!--<div id="">
          <center>
            Enter tag: 
            <input type='text' id='userInput' />
            <input type='button' onclick='addElement()' value="Add Element"/>
          </center>
          </div>-->