<?php
session_start();
$id= $_SESSION["Project_ID"];
$userid= $_SESSION["user_id"];
$file = file_get_contents("projects/$id/main.txt");
require 'connect.php';
$query= mysqli_query($con, "SELECT * FROM `projects` WHERE project_id=$id");
$query2= mysqli_query($con, "SELECT * FROM `access` WHERE project_id=$id AND user_id=$userid");
echo "<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-8 col-md-10 mx-auto\">";
if (mysqli_num_rows($query2)!=0){
    while ($fetch = mysqli_fetch_assoc($query)){
        $title = nl2br($fetch['name']);
        echo "<div class=\"post-preview\">
                <a style=\"color:#fed136\" class=\"post-title\">
                    $title
                  </h2>
                  <h3 class=\"post-subtitle\">".$file.
            "</h3>
                </a>
              </div>
              <hr>";
    }

}
else {
    echo "<div class=\"post-preview\">
                <a style=\"color:#fed136\" class=\"post-title\">
                  </h2>
                  <h3 class=\"post-subtitle\">
        You do not have access permission to view this project.</h3>
                </a>
              </div>
              <hr>";
}

echo "</div>
      </div>
    </div>";
?>