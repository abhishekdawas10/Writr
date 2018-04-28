<?php
require 'connect.php';
session_start();
$count= $_SESSION["project_count"];
$user_id=$_SESSION["user_id"];
$query= mysqli_query($con, "SELECT * FROM `projects` WHERE user_id= $user_id LIMIT 0,$count");
$check=0;
while ($fetch = mysqli_fetch_assoc($query)){
    $check=1;
    $title = nl2br($fetch['name']);
    $desc = nl2br($fetch['summary']);
    $id= $fetch['project_id'];
    echo "<div class=\"post-preview\">
            <a target=\"_blank\" href=\"project.php?$id\" class=\"post-title\">
                $title
              </h2>
              <h3 class=\"post-subtitle\">
                $desc....
              </h3>
            </a>
          </div>
          <hr>";
}
if ($check==0){
    echo "<div class=\"post-preview\">You do not have any projects! <br/><a class=\"btn btn-primary float-center\" href=\"create.php\">Create a new project now!</a></div>";
}


?>