<?php
$text = $_GET['usertext'];
$fp = fopen("user_data.txt", "w");
$savestring = $text;
fwrite($fp, $savestring);
fclose($fp);
echo "<h1>You data has been saved.</h1>";
?>