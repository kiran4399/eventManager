<?php

session_start();
if (empty($_SESSION['username'])||empty($_COOKIE['username'])) 
{
echo "<script>
alert('Please go to the index page and login');
window.location.href='index.php';
</script>";
}

else{
$connect=mysql_connect("localhost","root","kiran");
                mysql_select_db("event_manager");
		$username=$_SESSION['username'];
                $queryCheck=mysql_query("
                    SELECT id FROM membersinformationTable where membersinformationTable.uname = '$username'
                ");

//$row = mysql_fetch_array($queryCheck);
$val = mysql_result($queryCheck, 0);
//$val = $row["id"];


if($val!=3){

echo "<script>
alert('You do not have permissions to create an event');
window.location.href='create_event.php';
</script>";
}

else
{
header("Location: cancel_event.php");
}
}
?>
