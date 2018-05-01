<?php
session_start();
$id = $_SESSION['node_id'];
$filename = $_POST['fileName'];
$text = $_POST['usertext'];
$fp = fopen($filename, "w");
$savestring = $text;
fwrite($fp, $savestring);
fclose($fp);
echo "<h1>You data has been saved.</h1>";
header("Location: node.php?id=$id");
?>