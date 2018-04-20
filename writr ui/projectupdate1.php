<?php
session_start();
$id= $_SESSION["Project_ID"];
$file = file_get_contents("projects/$id/main.txt");
require 'connect.php';
$query= mysqli_query($con, "SELECT * FROM `projects` WHERE project_id=$id");
echo "<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-8 col-md-10 mx-auto\">";
while ($fetch = mysqli_fetch_assoc($query)){
    $title = nl2br($fetch['name']);
    $desc = nl2br($fetch['main_branch']);
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

echo "</div>
      </div>
    </div>";
?>