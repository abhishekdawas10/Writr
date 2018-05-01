<?php
require 'connect.php';
$name= $_SESSION['node_name'];
$text= $_SESSION['node_text'];
$userid= $_SESSION['user_id'];
$projectid= $_SESSION["project_id"];
$parent=$_SESSION["parent_id"];
$t=time();
$timestamp = date('Y-m-d H:i:s',$t);
if ($parent==0){
    $sql = "INSERT INTO nodes (`project_id`,`parent_id`,`isroot`, `version_count`, `creation_date`, `user_id`, `description` ) VALUES ($projectid,$parent,1,1,'$timestamp',$userid,'$name')";
    mysqli_query($con,$sql) or die(mysqli_error($con));
}
else{
    $sql = "INSERT INTO nodes (`project_id`,`parent_id`,`isroot`, `version_count`, `creation_date`, `user_id`, `description` ) VALUES ($projectid,$parent,0,1,'$timestamp',$userid,'$name')";
    mysqli_query($con,$sql) or die(mysqli_error($con));
}
$id = mysqli_insert_id($con);
mkdir("projects/$projectid/$id", 0700);
$myfile = fopen("projects/$projectid/$id/main.txt","w");
$text2= "<p>".$text."</p>";
fwrite($myfile, $text2);
?>