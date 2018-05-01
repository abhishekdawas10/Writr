<?php
require 'connect.php';
$name= $_SESSION['project_name'];
$desc= $_SESSION['project_desc'];
$id= $_SESSION['project_id'];
$userid= $_SESSION['user_id'];
$query2= mysqli_query($con, "SELECT * FROM `access` WHERE project_id=$id AND user_id=$userid");
$sql = "UPDATE projects SET name = '$name', summary= '$desc' WHERE project_id=$id";
if (mysqli_num_rows($query2)!=0){
    while ($fetch = mysqli_fetch_assoc($query2)){
        $level= $fetch['level'];
        if ($level!=2){
            echo "<p>You do not have permission to edit this project.</p>";
            $_SESSION['check_var']=0;
        }
        else{
            mysqli_query($con,$sql) or die(mysqli_error($con)); 
            $_SESSION['check_var']=1;
        }
    }
}
else{
    echo "<p>You do not have permission to edit this project.</p>";
    $_SESSION['check_var']=0;
}
?>