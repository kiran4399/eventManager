<?php
header("Location: /webdev/manage.php"); 
session_start();

$username=$_SESSION['username'];
$connect=mysql_connect("localhost","root","kiran");
mysql_select_db("event_manager");
$query=mysql_query("SELECT * FROM membersinformationTable WHERE uname='$username'");
while($row=mysql_fetch_assoc($query))
{
    	$dbtags=$row["tags"];
    	$dbuserid=$row["user_id"];
}
echo $dbtags;
if(!$dbtags)
	$dbtags=$dbtags.$_POST['userInput'];
else
	$dbtags=$dbtags."+OR+".$_POST['userInput'];

 
mysql_query("UPDATE lr.users SET tags = '$dbtags' WHERE users.user_id='$dbuserid'");
//mysql_query("UPDATE users SET tags=$dbtags WHERE username=$username");



?>
