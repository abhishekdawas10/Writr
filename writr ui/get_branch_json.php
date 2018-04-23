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

$sql = "SELECT project_id, parent_id, summary FROM projects";
$result = $conn->query($sql);

$rows = array();

        // echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["person_id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        echo $row['project_id'] . "|" . $row['parent_id'] . "|" . $row['summary'] ;
        echo "<br>";
    }
}

// print json_encode($rows);
$conn->close();
?> 

