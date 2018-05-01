<?php
session_start();
include 'connect.php';
$id = $_SESSION['node_id'];
$filename = $_POST['fileName'];
$text = $_POST['usertext'];
$query2= mysqli_query($con,"SELECT * FROM `nodes` WHERE node_id=$id");
while ($fetch = mysqli_fetch_assoc($query2)){
    $version= $fetch['version_count'];
}
if ($version!=1){
    $new= $version + 1;
    if (strpos($filename, '_') !== false){
        $temp = explode('_', $filename);
        $ext  = array_pop($temp);
        $name = implode('_', $temp);
        $filename= $name.'.txt';
    }
    else{
        $temp = explode('.', $filename);
        $ext  = array_pop($temp);
        $name = implode('.', $temp);
    }
    $filename2= $name."_".$new.".txt";
    copy($filename,$filename2);
    $query= mysqli_query($con,"UPDATE `nodes` SET version_count= version_count + 1 WHERE node_id=$id");
}
else{
    $query= mysqli_query($con,"UPDATE `nodes` SET version_count= version_count + 1 WHERE node_id=$id");
    $temp = explode('.', $filename);
    $ext  = array_pop($temp);
    $name = implode('.', $temp);
    $filename2= $name."_2.txt";
    copy($filename,$filename2);
}

$fp = fopen($filename, "w");
$savestring = $text;
fwrite($fp, $savestring);
fclose($fp);
echo "<h1>You data has been saved.</h1>";
header("Location: node.php?id=$id");
?>