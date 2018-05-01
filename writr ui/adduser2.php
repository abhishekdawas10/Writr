<?php
require 'connect.php';
$username= $_SESSION['c_username'];
$id= $_SESSION['project_id'];
$userid= $_SESSION['user_id'];
$query2= mysqli_query($con, "SELECT * FROM `access` WHERE project_id=$id AND user_id=$userid");
$query = mysqli_query($con,"SELECT * FROM `users` WHERE username='$username'");
if (mysqli_num_rows($query2)!=0){
    if (mysqli_num_rows($query)!=0){
        $fetch = mysqli_fetch_assoc($query);
        $c_id= $fetch['id'];
        $query3= mysqli_query($con,"SELECT * FROM `access` WHERE project_id=$id AND user_id=$c_id");
        if (mysqli_num_rows($query3)!=0){
            echo "<p>The provided user already has access to this project</p>";
            $_SESSION['check_var']=0;
        }
        else{
            $query4= mysqli_query($con,"INSERT INTO access (`project_id`,`user_id`,`level`) VALUES ($id,$c_id,'2')");
            $_SESSION['check_var']=1;
        }

    }
    else{
            echo "<p>No user found with the given username.</p>";
            $_SESSION['check_var']=0;
    }
}
else{
    echo "<p>You do not have permission to edit this project.</p>";
    $_SESSION['check_var']=0;
}
?>