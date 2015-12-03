<?php

session_start();
if (empty($_SESSION['username'])||empty($_COOKIE['username'])) 
{    
  include('includes/head.php');
echo "<script>
alert('Please go to the index page and login');
window.location.href='create_event.php';
</script>";
}

else{
$val = 1;
if($val != 1)
{
echo "<script>
alert('You do not have administrative permissions to add or drop tables in databases');
window.location.href='create_event.php';
</script>";
}

else{

header("Location: admin_access.html");
}
}
?>


