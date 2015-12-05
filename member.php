<?php

session_start();
if (empty($_SESSION['username'])||empty($_COOKIE['username'])) 
{    
  include('includes/head.php');
  echo '
      <div id="nav">
            <ul class="nav nav-pills nav-stacked" id="list">
          <li><a href="index.php">Go to start page and login</a></li>
          <li><a href="check_user_create.php">Create new event</a></li>
          <li><a href="check_user_cancel.php">Cancel new event</a></li>
          <li><a href="myBookings.php">My events</a></li>
	  <li><a href="book_event.php">Book an event</a></li>
	  <li><a href="unbook_event.php">UnBook an event</a></li>
	  <li><a href="admin_access.php">Administration</a></li>
<li><a href="member.php">Next 7 days</a></li>
        </ul>
      </div>
    ';  

}

else
{

echo '
  <html>
  <head>
    <title>BookMyEvent</title>
    <link href="bootstrapAssets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <script type="text/javascript" src="bootstrapAssets/js/bootstrap.js"></script>
    <script type="text/javascript" src="includes/jquery.min.js"></script>
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
    
    
    <div id="nav">
                <ul class="nav nav-pills nav-stacked" id="list">
          <li><a href="index.php">Go to start page and login</a></li>
          <li><a href="check_user_create.php">Create new event</a></li>
          <li><a href="check_user_cancel.php">Cancel new event</a></li>
          <li><a href="myBookings.php">My events</a></li>
	  <li><a href="book_event.php">Book an event</a></li>
	  <li><a href="unbook_event.php">UnBook an event</a></li>
	  <li><a href="admin_access.php">Administration</a></li>
<li><a href="member.php">Next 7 days</a></li>
        </ul>
            <div id="nav">
    </div>
    </div>
    ';
} 
      
$currentDate = date("d/m/Y", time()); 
$date=$currentDate;
      //echo $currentDate; 
    

echo '
  <div id="table">
  <!--<center>-->
  <table border="1" width="90%">
  <COLGROUP span="3">
  <tr id="tableHeading">
    <th>Date</th>
    <th>venue</th>
    <th id="eventColumn">Event</th>
    <th>Time</th>
    <th>Created by</th>
    </tr>
    </COLGROUP>
';
  $username=$_SESSION['username'];    
  $connect1=mysql_connect("localhost","root","kiran") or die("Couldn't connect!");
  mysql_select_db("event_manager") or die("Couldn't find db!");
      $username=$_SESSION['username'];  
  for($i=0;$i<=7;$i++)
  {
      $date=date('Y-m-d 00:00:00', strtotime('+'.$i.' days'));
      $result=mysql_query("SELECT * FROM EventinformationTable where schedule='$date'");

      $numrows=mysql_num_rows($result);
      if(1)
      {
        if($numrows)
        $row = mysql_fetch_array($result);
        echo '
          <tr width="30%">
          <td rowspan="'.($numrows).'"><center>'.$date.'</center></td>
          <td><center>
        ';
        if($numrows){ echo $row['venue']; }
          echo '
            </center></td>
            <td><center>
          ';
        if($numrows){ echo $row['eventname']; }
          echo '
            </center></td>
            <td><center>
          ';
        if($numrows){
          echo date("h:i A",strtotime($row["schedule"])).'</td>';
        }
        else echo '</center></td>';
        echo '<td><center>';
        if($numrows){ echo $row['username']; }
        echo '</center></td></tr>';
      
        while($row = mysql_fetch_array($result))
        {
          echo '
            <tr>
              <td><center>'.$row['venue'].'</center></td>
              <td><center>'.$row['eventname'].'</center></td>
              <td><center>';
          if($row['schedule'])
          {
            echo date("h:i A",strtotime($row["schedule"])).
            '
            </center></td>
          ';
            }
            else echo '</center></td>';
          echo '
              <td><center>'.$username.'</center></td>
            </tr>
          ';
        }
      }
  }
  echo '
    </table>
  </div>
  </body>
</html>
';

?>
