<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, lastname FROM account_holder";
$result = $conn->query($sql);

$rows = array();

echo "{ \"cols\": [ {\"id\":\"\",\"label\":\"firstname\",\"pattern\":\"\",\"type\":\"string\"}, {\"id\":\"\",\"label\":\"lastname\",\"pattern\":\"\",\"type\":\"string\"} ], \"rows\": [ ";
        // echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["person_id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        echo "{\"c\":[{\"v\":\"" . $row['firstname'] . "\",\"f\":null},{\"v\":\"" . $row['lastname'] . "\",\"f\":null}]},";
        // echo "<br>";
    }
}
  echo " ] }";
// print json_encode($rows);
$conn->close();
?> 

