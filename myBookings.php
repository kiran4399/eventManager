<?php
  session_start();
  if (empty($_SESSION['username'])||empty($_COOKIE['username'])) {    
    include('includes/head.php');      
  die('
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
    <center><div class="alert" style="width:450px;">
      <strong>Warning!</strong> You must be logged in to see this page. <a href="index.php">Go to start page.</a>
    </div></center>
  ');

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
      
      //$currentDate = date("d/m/Y", time()); 
      //$date=$currentDate;
      //echo $currentDate; 
    

    
      
    $connect1=mysql_connect("localhost","root","kiran") or die("Couldn't connect!");
    mysql_select_db("event_manager") or die("Couldn't find db!");
    $username=$_SESSION['username'];
    $result0=mysql_query("SELECT EventinformationTable.* FROM participantinformationTable,EventinformationTable where participantinformationTable.eventid = EventinformationTable.eventid and participantinformationTable.uname='$username'");  
    //for($i=0;$i<=7;$i++)
    //{
      //echo "hello";
      //$date=date('d-m-Y', strtotime('+'.$i.' days'));
      //echo $date." ";
      //$result=mysql_query("SELECT * FROM events where date='$date'");
        //where date='$date'");
      //$row=mysql_fetch_array($result);
      //echo "hi".$row['date']." ";
      //echo date("d-m-Y",strtotime($row['date']));
      //echo "hi";
      //echo $row['user'];
      $numrows=mysql_num_rows($result0);
      //if(1)
      //{
        //echo "hi";
        //$numrows=mysql_num_rows($result);
        //echo $numrows." ";
        if($numrows)
        {
          echo '
            <div id="table">
            <!--<center>-->
            <table border="1" cellpadding="50px" width="90%">
            <COLGROUP span="3">
            <tr id="tableHeading">
            <th>Date</th>
  <th>Type</th>
            <th>Venue.</th>
            <th id="eventColumn">Event</th>
            <th>Time</th>
            </tr>
            </COLGROUP>
          ';
          //$row = mysql_fetch_array($result0);
          while($row = mysql_fetch_array($result0))
          {
          /*echo $row['name']. " - ". $row['age'];
          echo "<br />";*/
          echo '
            <tr>	
              <td>'.$row['schedule'].'</td>
 <td>'.$row['eventtype'].'</td>
              <td>'.$row['venue'].'</td>
              <td>'.$row['eventname'].'</td>
              <td>'.date("h:i A",strtotime($row["time"])).'
              </td>
            </tr>
          ';
              //if($row['time']){
              //echo date("h:i A",strtotime($row["time"])).'</td>';
              //}
              //else echo '</td>';
              /*echo '
              </tr>
              ';*/
          }
        }
        else
          echo '
            <center><div class="alert" style="width:400px;">
            You have <strong>no bookings!</strong> <a href="manage.php">Make new bookings</a>
            </div></center>
          ';
        //echo $row['date'];
        /*echo '
          <tr width="30%">
          <td rowspan="">'.$row['date'].'</td>
          <td>
        ';
        if($numrows){ echo $row['room']; }
        echo '
          </td>
          <td>
        ';
        if($numrows){ echo $row['event']; }
        echo '
          </td>
          <td>
        ';
        if($numrows){echo date("h:i A",strtotime($row["time"])).'</td>';}
        else echo '</td>';
        echo '</tr>';*/
      

        
          /*.$row['time'].'</td>
            </tr>
          ';*/
        //}
      //}
    //}    
    echo '
      </table>
      <!--</center>-->
      </div>
    


</body>
</html>
';

?>
