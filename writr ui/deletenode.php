<?php
session_start();
include 'connect.php';
$id= $_SESSION["node_id"];
$id2= $_SESSION["project_id"];
function removeDirectory($path) {
 	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? removeDirectory($file) : unlink($file);
	}
	rmdir($path);
 	return;
}

function deleteBranch($id,$con,$projectid){
    $query= mysqli_query($con,"SELECT * FROM `nodes` WHERE parent_id=$id");
    if (mysqli_num_rows($query)!=0){
        while ($fetch = mysqli_fetch_assoc($query)){
            $id2= $fetch['node_id'];
            deleteBranch($id2,$con,$projectid);
        }
    }
    $query2= mysqli_query($con,"DELETE FROM `nodes` WHERE node_id=$id");
    removeDirectory("projects/$projectid/$id");
}

$userid= $_SESSION["user_id"];
$query= mysqli_query($con, "SELECT * FROM `access` WHERE project_id=$id2 AND user_id=$userid");
if (mysqli_num_rows($query)!=0){
    deleteBranch($id,$con,$id2);
    header("Location: project.php?$id2");
}
else {
    echo "<p>You do not have permissions to edit this project.</p>";
}
?>