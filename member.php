<?php
session_start(); 

if (!empty($_SESSION['username'])) {          
  header("Location: /cs251Assign4/memberLoggedIn.php");            
}
else{
  header("Location: /cs251Assign4/memberError.php");
  exit();
}

?>


