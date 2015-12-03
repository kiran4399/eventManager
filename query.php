<?php


$query=$_POST['query'];
$servername = "localhost";
$username = "root";
$password = "kiran";
$dbname = "event_manager";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//echo $query;
$sql = $query;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["lastname"]. " - Emailid: " . $row["email"]. " - Password: " . $row["pass"]. " - Username:  " . $row["uname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
