<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "writr";

$summary = file_get_contents("summary.txt");

$my_file = './treant-js-master/examples/basic-example/basic-example.js';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
$data = 'var config = {
        container: "#basic-example",
        
        connectors: {
            type: "step"
        },
        node: {
            HTMLclass: "nodeExample1"
        }
    },
    ';

$chart_config = 'chart_config = [
		config,
	';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT node_id, parent_id FROM nodes WHERE isroot=1";
$result = $conn->query($sql);

$rows = array();

        // echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data .= 'node_' . $row['node_id'] . ' = {
        text: {
            name: "' . $row['node_id'] .'",
            title: "' . 'root node '. '",
            contact: "' . $summary . '",
        },
    },
    ';

    $chart_config .= '	node_' . $row['node_id'] . ',
    ';

        // echo "id: " . $row["person_id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        // echo $row['node_id'] . "|" . $row['parent_id'] . "|" . $summary ;
        // echo "<br>";
    }
}


$sql = "SELECT node_id, parent_id FROM nodes WHERE isroot!=1";
$result = $conn->query($sql);

$rows = array();

        // echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data .= 'node_' . $row['node_id'] . ' = {
        parent: node_' . $row['parent_id'] .',
        text: {
            name: "' . $row['node_id'] .'",
            title: "' . $row['parent_id'] . '",
            contact: "' . $summary . '",
        },
    },
    ';

    $chart_config .= '	node_' . $row['node_id'] . ',
    ';

        // echo "id: " . $row["person_id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        // echo $row['node_id'] . "|" . $row['parent_id'] . "|" . $summary ;
        // echo "<br>";
    }
}

	$chart_config .= '
	    ];';
$data .= $chart_config;
// print json_encode($rows);
$conn->close();
fwrite($handle, $data);
fclose($handle);
?> 
