<?php
require 'connect.php';
$name= $_SESSION['project_name'];
$desc= $_SESSION['project_desc'];
$text= $_SESSION['project_text'];
$userid= $_SESSION['user_id'];
$t=time();
$timestamp = date("Y-m-d",$t);
$sql = "INSERT INTO projects (`name`,`summary`,`creation_time`, `user_id` ) VALUES ('$name','$desc',$timestamp, $userid)";
mysqli_query($con,$sql) or die(mysqli_error($con));
$id = mysqli_insert_id($con);
$_SESSION['project_id']=$id;
mkdir("projects/$id", 0700);
$myfile = fopen("projects/$id/main.txt","w");
fwrite($myfile, $text);
?>