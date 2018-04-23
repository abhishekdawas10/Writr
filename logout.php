<?php
/**************************************************************************************
* Follow and Unfollow Application similar to Twitter using Ajax, Jquery and PHP
* This script has been released with the aim that it will be useful.
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
* All Copy Rights Reserved by Vasplus Programming Blog
***************************************************************************************/
session_start();
ob_start();
session_unset();
session_destroy();
header("location: login.php");
?>
