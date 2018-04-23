<?php
/**************************************************************************************
* Follow and Unfollow Application similar to Twitter using Ajax, Jquery and PHP
* This script has been released with the aim that it will be useful.
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
* All Copy Rights Reserved by Vasplus Programming Blog
***************************************************************************************/


//Database Connection Settings
define ('hostnameorservername','localhost'); //Your server name or host name goes in here
define ('serverusername',''); // Your database username goes in here
define ('serverpassword',''); // Your database password goes in here
define ('databasenamed',''); // Your database name goes in here
$connection = mysqli_connect('localhost', 'root', '', 'followSystem');
