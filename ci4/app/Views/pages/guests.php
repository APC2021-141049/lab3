<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="guest_style.css" /> 
<link rel="icon" href="image/profile_picture_guest.png" />
<title>Guests List</title>
</head>
<body>

<div id="main_guest">
<?php
$servername = "192.168.150.213";
$username = "webprogss211";
$password = "fancyR!ce36";
$dbname = "webprogss211";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, fullname, email, comment, FROM searceo_guestlist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id number: ". $row["id"]. "<br>name: ". $row["fullname"] .$row["comment"]. "<br>comments: ". "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</div>

</body>
</html>