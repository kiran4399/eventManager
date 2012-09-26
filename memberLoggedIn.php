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
            <ul class="nav nav-list" id="list">
              <li class="active"><a href="manage.php">Manage Bookings</a></li>
              <li><a href="#">See tags</a></li>
              <!--<script type="text/javascript">makeList();</script>-->
            </ul>
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