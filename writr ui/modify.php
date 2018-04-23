<?php
require 'connect.php';
$name= $_SESSION['project_name'];
$desc= $_SESSION['project_desc'];
$id= $_SESSION['project_id'];
$sql = "UPDATE projects SET name = '$name', summary= '$desc' WHERE project_id=$id";
mysqli_query($con,$sql) or die(mysqli_error($con));
?>