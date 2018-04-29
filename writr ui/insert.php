<?php
require 'connect.php';
$name= $_SESSION['project_name'];
$desc= $_SESSION['project_desc'];
$text= $_SESSION['project_text'];
$userid= $_SESSION['user_id'];
$t=time();
$timestamp = date('Y-m-d H:i:s',$t);
$sql = "INSERT INTO projects (`name`,`summary`,`creation_time`, `user_id` ) VALUES ('$name','$desc','$timestamp', $userid)";
mysqli_query($con,$sql) or die(mysqli_error($con));
$id = mysqli_insert_id($con);
$sql2= "INSERT INTO access (`project_id`,`user_id`,`level`) VALUES ($id,$userid,'2')";
mysqli_query($con,$sql2) or die(mysqli_error($con));
$_SESSION['project_id']=$id;
mkdir("projects/$id", 0700);
$myfile = fopen("projects/$id/main.txt","w");
fwrite($myfile, $text);
?>