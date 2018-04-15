<?php
session_start();
$id= $_SESSION["Project_ID"];
$con= mysqli_connect("localhost","root","", "writr");
$query= mysqli_query($con, "SELECT * FROM `projects` WHERE project_id=$id");
echo "<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-8 col-md-10 mx-auto\">";
while ($fetch = mysqli_fetch_assoc($query)){
    $title = nl2br($fetch['name']);
    $desc = nl2br($fetch['main_branch']);
    echo "<div class=\"post-preview\">
            <a target=\"_blank\" href=\"1.php\" class=\"post-title\">
                $title
              </h2>
              <h3 class=\"post-subtitle\">".$desc.
        "</h3>
            </a>
          </div>
          <hr>";
}

echo "<div class=\"clearfix\">
          </div>
        </div>
      </div>
    </div>";
?>