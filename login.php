<?php

session_start();
ob_start();

//Include the database connection file
include "config.php";

//Check to see if the submit button has been clicked to process data
if(isset($_POST["submitted"]) && $_POST["submitted"] == "yes")
{
	//Variables Assignment
	$user_email = trim(strip_tags($_POST['email']));
	$user_password = trim(strip_tags($_POST['passwd']));
	$encrypted_md5_password = md5($user_password);
	
	$validate_user_information = mysqli_query($connection,"select * from `follow_and_unfollow_users_table` where `email` = '".mysqli_real_escape_string($connection,$user_email)."' and `password` = '".mysqli_real_escape_string($connection,$encrypted_md5_password)."'");
	
	//Validate against empty fields
	if($user_email == "" || $user_password == "")
	{
		$error = '<br><div class="info">Sorry, all fields are required to log into your account. Thanks.</div><br>';
	}
	elseif(mysqli_num_rows($validate_user_information) == 1) //Check if the information of the user are valid or not
	{
		//The submitted info of the user are valid therefore, grant the user access to the system by creating a valid session for this user and redirect this user to the welcome page
		$get_user_information = mysqli_fetch_array($validate_user_information);
		$_SESSION["VALID_USER_ID"] = $user_email;
		$_SESSION["USER_FULLNAME"] = strip_tags($get_user_information["firstname"].'&nbsp;'.$get_user_information["lastname"]);
		header("location: index.php?page_owner=".base64_encode($user_email));
	}
	else
	{
		//The submitted info the user are invalid therefore, display an error message on the screen to the user
		$error = '<br><div class="info">Sorry, you have provided incorrect information. Please enter correct user information to proceed. Thanks.</div><br>';
	}
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WRITR Follow Unfollow System</title>



<!-- Required header file -->
<link href="css/style.css" rel="stylesheet" type="text/css">




</head>
<body>
<center>
<br>
<div style="font-family:Verdana, Geneva, sans-serif; font-size:24px;">Follow and Unfollow Application For WRITR</div><br clear="all" /><br clear="all" /><br clear="all" />











<!-- Code Begins -->
<center>
<div class="vpb_main_wrapper">

<br clear="all">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h2 align="left" style="margin-top:0px;">Users Login</h2><br />

<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; margin-bottom:10px;">Please enter your email address and password below to demo this system.</div><br />

<div style="width:115px; padding-top:10px;float:left;" align="left">Email Address:</div>
<div style="width:300px;float:left;" align="left"><input type="text" name="email" id="email" value="<?php isset($_POST['email']) ? ($_POST["email"]): ''; ?>" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">


<div style="width:115px; padding-top:10px;float:left;" align="left">Your Password:</div>
<div style="width:300px;float:left;" align="left"><input type="password" name="passwd" id="passwd" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">


<div style="width:115px; padding-top:10px;float:left;" align="left">&nbsp;</div>
<div style="width:300px;float:left;" align="left">
<input type="hidden" name="submitted" id="submitted" value="yes">
<input type="submit" name="submit" id="" value="Login" style="margin-right:50px;" class="vpb_general_button">
<a href="signup.php" style="text-decoration:none;" class="vpb_general_button">Register</a>

</div>

</form>
<br clear="all"><br clear="all">
<div style="width:450px;float:left;" align="left"><?php echo $error; ?></div><br clear="all">

</div>
</center>
<!-- Code Ends -->



<br clear="all">



<br /><br /><div style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">Please click on register and fill in some info to really see how the system works if you have not done that.</div><br /><br />











</center>
</body>
</html>