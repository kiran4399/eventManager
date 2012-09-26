<?php
	session_start();
	include "includes/head.php";
	$connect=mysql_connect("localhost","root","root");
	mysql_select_db("cs251");
	$username=$_SESSION['username'];

	$query=mysql_query("SELECT * FROM users WHERE username='$username'");

	echo "<a href='newBook.php'><h3>Add new tags</h3></a>";
	echo "<a href='remove.php'><h3>Remove tags</h3></a>";
	echo "<center>";
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