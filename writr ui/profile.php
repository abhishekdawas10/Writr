<?php
require 'connect.php';
session_start();
$user_id=$_SESSION["user_id"];
$query= mysqli_query($con, "SELECT * FROM `users` WHERE id= '$user_id'");
$check=0;
if (mysqli_num_rows($query)!=0){
    while ($fetch = mysqli_fetch_assoc($query)){
        $name = $fetch['firstname']." ".$fetch['lastname'];
        $email= $fetch['email'];
        $username= $fetch['username'];
        $desc = nl2br($fetch['description']);
        echo "<div class=\"col-md-20 col-md-offset-10\">
                    <div class=\"team-member\">
                        <h4>$username</h4>
                        <p class=\"text-muted\">$name<br/>$email<br/><br/>$desc</p>
                    </div>
                </div>
                ";
    }
}


?>