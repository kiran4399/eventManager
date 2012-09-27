<?php
	session_start();
	include "includes/head.php";
	$connect=mysql_connect("localhost","root","root");
	mysql_select_db("cs251");
	$username=$_SESSION['username'];

	$query=mysql_query("SELECT * FROM users WHERE username='$username'");

	echo "<a href='newBook.php'>
    <div style='background: #353538; border-top-right-radius:5px; border-bottom-right-radius:5px; width: 15%; padding:1px;'>
    <center><h4>Add new booking</h4></a>
    </center></div>";
	echo "<a href='remove.php'>
    <div style='background: #353538; border-top-right-radius:5px; border-bottom-right-radius:5px; width: 15%; padding:1px; position:relative; top:2px;'><center><h4>Cancel Bookings</h4></a></center></div>";
	//echo "<center>";
	/*while(mysql_fetch_assoc($query))
    {
        $row=mysql_fetch_assoc($query)
    	$dbtags=$row["tags"];
    }
    $arrayTags=(explode('+OR+',$dbtags));
    
    $i=0;
    $length=sizeof($arrayTags);
    echo("<div id='tags'>");
    for ($i=0; $i < $length; $i++) { 
        	echo $arrayTags[$i]."<br>";
    }

    echo("</div></center>");

    echo("<center><a href='member.php'><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;See tweets!</h3></a></center>");
    */


    



?>