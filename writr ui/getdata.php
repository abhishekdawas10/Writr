<?php
session_start();
$count= $_SESSION["project_count"];
$_SESSION["project_count"]= $count + 5;
}