<?php
require 'connect.php';
session_start();
$user_id=$_SESSION["user_id"];
$query= mysqli_query($con, "SELECT * FROM `registration` WHERE UserID= $user_id");
$check=0;
if (mysqli_num_rows($query)!=0){
    while ($fetch = mysqli_fetch_assoc($query)){
        $name = nl2br($fetch['Name']);
        $email= $fetch['Email'];
        $username= $fetch['Username'];
        $desc = nl2br($fetch['description']);
        echo "<div class=\"col-md-20 col-md-offset-10\">
                    <div class=\"team-member\">
                        <img class=\"mx-auto rounded-circle\" src=\"img/team/2.jpg\" alt=\"\">
                        <h4>$username</h4>
                        <p class=\"text-muted\">$name<br/>$email<br/><br/>$desc</p>
                    </div>
                </div>
                ";
    }
}


?>