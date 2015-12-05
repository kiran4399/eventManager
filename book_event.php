<?php
	session_start();
	include "includes/head.php";
    echo '
        <script language="javascript" type="text/javascript" src="dateTimePick/datetimepicker.js">
        </script>
    ';
    if (empty($_SESSION['username'])||empty($_COOKIE['username'])) {         
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
        <center><div class="alert" style="width:500px;">
        <strong>Warning!</strong> You must be logged in to see this page. <a href="index.php">Go to start page and login</a>
        </div></center>
        ');
    }
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
    $connect=mysql_connect("localhost","root","kiran");
	mysql_select_db("event_manager");
	$username=$_SESSION['username'];
    
	if (isset($_POST['submit']))
    {
    
        if($_POST['eventname']&&$_POST['dateTime']&&$_POST['venue'])
        {  
            $eventname=strip_tags($_POST['eventname']);
            $dateTime=strip_tags($_POST['dateTime']);
            $venue=strip_tags($_POST['venue']);
	    		
            if(strlen($event)>100)
            {
                echo "Max limit for event description is 100";
            }
            else
            {
                $array=explode(' ',$dateTime);
                $date=$array[0];
                $time=$array[1];

                $dateArray=explode('-',$date);

                switch ($dateArray[1]) 
                {
                    case 'Jan':
                        $date=$dateArray[0]."-01-".$dateArray[2];
                        break;
                    
                    case 'Feb':
                        $date=$dateArray[0]."-02-".$dateArray[2];
                        break;

                    case 'Mar':
                        $date=$dateArray[0]."-03-".$dateArray[2];
                        break;

                    case 'Apr':
                        $date=$dateArray[0]."-04-".$dateArray[2];
                        break;
                    
                    case 'May':
                        $date=$dateArray[0]."-05-".$dateArray[2];
                        break;

                    case 'Jun':
                        $date=$dateArray[0]."-06-".$dateArray[2];
                        break;

                    case 'Jul':
                        $date=$dateArray[0]."-07-".$dateArray[2];
                        break;

                    case 'Aug':
                        $date=$dateArray[0]."-08-".$dateArray[2];
                        break;

                    case 'Sep':
                        $date=$dateArray[0]."-09-".$dateArray[2];
                        break;

                    case 'Oct':
                        $date=$dateArray[0]."-10-".$dateArray[2];
                        break;

                    case 'Nov':
                        $date=$dateArray[0]."-11-".$dateArray[2];
                        break;

                    case 'Dec':
                        $date=$dateArray[0]."-12-".$dateArray[2];
                        break;
                }

                $date=date("d-m-Y",strtotime($date));
                $connect=mysql_connect("localhost","root","kanv");
                mysql_select_db("event_manager");

                $queryCheck=mysql_query("
                    SELECT * FROM EventinformationTable'
                ");
                $num=mysql_num_rows($queryCheck);
                if($queryCheck)
                {
                    while($row = mysql_fetch_array($queryCheck))
                    {
                        $time0=$row['time'];
                        //$time0=date("h:i:s A",strtotime($time0));
                        $time1=strtotime('+1 hour',strtotime($time0));
                        if(strtotime($time)>=strtotime($time0) && strtotime($time)<=$time1 && $row['eventtype']==$venue)
                        {
                            //echo "3";
                            die("
                            <center>
                                <div class='alert' style='width:450px;'>
                                    An event already exists from ".date('h:i A',strtotime($time0))." to ".date('h:i A',$time1)."!<a href='manage.php'> Book again</a>
                                </div>
                            </center>
                            ");
                        }
                
                    }
                }
                
                //$queryBook=mysql_query("INSERT INTO EventinformationTable(eventname,eventtype,schedule,cost) VALUES ('$event','$room',20120618,5000)"); 
	
		//echo '$event'.'';
		//$query_ins=mysql_query("INSERT INTO EventinformationTable(eventname,eventtype,schedule,cost) VALUES('$event','$venue',20120618,5000)");
		$query_id=mysql_query("select eventid from EventinformationTable where eventname='$eventname' and venue = '$venue'");
		$id=mysql_result($query_id,0);
		$querypart = mysql_query("INSERT INTO participantinformationTable(uname,eventid,feedback) VALUES ('$username',$id,'hello it was a nice one')");
		
		//$query_event=mysql_query("select * from EventinformationTable");                
		$query_participant=mysql_query("select * from participantinformationTable");		
		die('<center><div class="alert alert-success" style="width:250px;">
                    <strong>Booking successful!</strong>
                    </div></center>');
            }      
        }
        else
        {
        //echo "<center><h1> Register </h1></center><br>";
        echo "Please fill in <b>all</b> values!";
        }
    }

?>

<div id="bookForm">
<center>
    <h3>Form for adding new bookings</h3> <br>
    <form action="book_event.php" method='POST' id="addBooking">
    <table>
        <tr>
            <td>Event Description:  </td>
            <td><input type ='text' name='eventname' placeholder="Event Details"></td>
        </tr>

            <td>Pick date and time: </td>
            <td>
                <input type="text" name="dateTime" id="dateTime" maxlength="25" size="25" placeholder="Date and time of your event">
                    <a href="javascript:NewCal('dateTime','ddmmmyyyy',true,24)">
                    <img src="dateTimePick/cal.gif" width="16" height="16" border="0" alt="Pick a date">
                    </a>
            </td>
        </tr>
      <tr>
            <td>
                Select Venue: 
            </td>
            <td>
                <select name="venue">
                    <option>Select venue</option>
                    <option value="hyderabad">hyderabad</option>
                    <option value="mumbai">mumbai</option>
<option value="delhi">delhi</option>
                    <option value="kolkata">kolkata</option>
<option value="chenai">chennai</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <center><button type="submit" class="btn" name="submit">Book</button></center>
        </td>
            <!--<input type='submit' value='Register' name='submit'>-->
        </tr>
    </table>
    </form>
</center>
</div>
</body>
</html>
