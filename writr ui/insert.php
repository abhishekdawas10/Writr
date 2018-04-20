<?php
require 'connect.php';
$name= $_SESSION['project_name'];
$desc= $_SESSION['project_desc'];
$text= $_SESSION['project_text'];
$sql = "INSERT INTO projects (`name`,`summary`,`main_branch`) VALUES ('$name','$desc','placeholder')";
mysqli_query($con,$sql) or die(mysqli_error($con));
$id = mysqli_insert_id($con);
$_SESSION['project_id']=$id;
mkdir("projects/$id", 0700);
$myfile = fopen("projects/$id/main.txt","w");
fwrite($myfile, $text);
?>