<?php
$name = $_GET['name'];
$email = $_GET['email'];
$fp = fopen("formdata.txt", "a");
$savestring = $name . "," . $email . "n";
fwrite($fp, $savestring);
fclose($fp);
echo "<h1>You data has been saved in a text file!</h1>";
?>