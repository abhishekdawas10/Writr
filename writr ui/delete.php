<?php
session_start();
include 'connect.php';
$id= $_SESSION["Project_ID"];
function removeDirectory($path) {
 	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? removeDirectory($file) : unlink($file);
	}
	rmdir($path);
 	return;
}
$userid= $_SESSION["user_id"];
$query= mysqli_query($con, "SELECT * FROM `access` WHERE project_id=$id AND user_id=$userid");
if (mysqli_num_rows($query)!=0){
    $query1= mysqli_query($con,"DELETE FROM `projects` WHERE project_id=$id");
    $query2= mysqli_query($con,"DELETE FROM `access` WHERE project_id=$id");
    $query3= mysqli_query($con,"DELETE FROM `nodes` WHERE project_id=$id");
    removeDirectory("/projects/$id");
    header("Location: index.php");
}
else {
    echo "<p>You do not have permissions to edit this project.</p>";
}
?>