<?php
    $con= mysqli_connect("localhost","root","", "writr");
    $query= mysqli_query($con, "SELECT * FROM `projects` LIMIT 20");
    echo "<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-8 col-md-10 mx-auto\">";
    while ($fetch = mysqli_fetch_assoc($query)){
        $title = nl2br($fetch['name']);
        $desc = nl2br($fetch['summary']);
        $id= $fetch['project_id'];
        echo "<div class=\"post-preview\">
            <a target=\"_blank\" href=\"$id.php\" class=\"post-title\">
                $title
              </h2>
              <h3 class=\"post-subtitle\">
                $desc....
              </h3>
            </a>
          </div>
          <hr>";
    }

    echo "<div class=\"clearfix\">
            <button class=\"btn btn-primary float-right\" id= \"old\">Older Projects &rarr;</a>
          </div>
        </div>
      </div>
    </div>";
?>