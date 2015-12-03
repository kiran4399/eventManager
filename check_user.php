<?php

$connect=mysql_connect("localhost","root","kiran");
                mysql_select_db("event_manager");
		$username=$_SESSION['username'];
                $queryCheck=mysql_query("
                    SELECT id FROM membersinformationTable where membersinformationTable.uname = '$username'
                ");

//$row = mysql_fetch_array($queryCheck);
$val = mysql_result($queryCheck, 0);
//$val = $row["id"];

$wfile = fopen("/var/www/html/eventManager/test", "w") or die("Unable to open file!");
fwrite($wfile, $val);
fclose($wfile);

if($val!=3){

echo "<script>
alert('You do not have permissions to crate an event');
window.location.href='member.php';
</script>";
}

else
{
header("Location: manage.php");
}
?>
