<?php
$servername = "sql203.epizy.com";
$username = "epiz_23268893";
$password = "3jPxqyByfei";
$dbname = "epiz_23268893_history";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
} 

$lat = mysqli_real_escape_string($conn, $_POST['lat']);
$lon = mysqli_real_escape_string($conn, $_POST['lon']);
$loc = mysqli_real_escape_string($conn, $_POST['displayname']);
$ip = mysqli_real_escape_string($conn, $_POST['ip']);

if (strlen($times) > 200000) {  $times = "";    }

$sql = "INSERT INTO track (ip,lat,long,location)
VALUES ('$ip', '$lat' , '$lon', '$loc')";

if ($conn->query($sql) === TRUE) {
    echo "Page saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
