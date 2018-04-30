<?php
$filename = $_POST['fileName'];
$text = $_POST['usertext'];
$fp = fopen($filename, "w");
$savestring = $text;
fwrite($fp, $savestring);
fclose($fp);
echo "<h1>You data has been saved.</h1>";
?>