<?php

$connect=mysql_connect("localhost","root","kiran");
                mysql_select_db("event_manager");
		$username=$_SESSION['username'];
                $queryCheck=mysql_query("
                    SELECT id FROM membersinformationTable where membersinformationTable.uname = '$username'
                ");

$row = mysql_fetch_array($queryCheck);
$val = 3;

if($val!=3){

echo "<script>
alert('You do not have permissions to crate an event');
window.location.href='member.php';
</script>";
}

else
{
<meta http-equiv="refresh" content="0;URL=manage.php" />
}
?>
