<?php

//Database Connection Settings
define ('hostnameorservername','localhost'); //Your server name or host name goes in here
define ('serverusername',''); // Your database username goes in here
define ('serverpassword',''); // Your database password goes in here
define ('databasenamed',''); // Your database name goes in here
$connection = mysqli_connect('localhost', 'root', '', 'project');
