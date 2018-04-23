<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "writr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT project_id, parent_id FROM projects";
$result = $conn->query($sql);

$rows = array();

echo "{ \"cols\": [ {\"id\":\"\",\"label\":\"project_id\",\"pattern\":\"\",\"type\":\"string\"}, {\"id\":\"\",\"label\":\"parent_id\",\"pattern\":\"\",\"type\":\"string\"} ], \"rows\": [ ";
        // echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["person_id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        echo "{\"c\":[{\"v\":\"" . $row['project_id'] . "\",\"f\":null},{\"v\":\"" . $row['parent_id'] . "\",\"f\":null}]},";
        // echo "<br>";
    }
}
  echo " ] }";
// print json_encode($rows);
$conn->close();
?> 

