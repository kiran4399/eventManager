<?php
	session_start();
	include "includes/head.php";
	$connect=mysql_connect("localhost","root","root");
	mysql_select_db("cs251");
	$username=$_SESSION['username'];

	$query=mysql_query("SELECT * FROM users WHERE username='$username'");

	echo "<h3>Form for adding new bookings</h3>";
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