<?php
session_start();
ob_start();
//Include the database connection file
include "config.php";
//Check to see if the submit button has been clicked to process data
if(isset($_POST["submitted"]) && $_POST["submitted"] == "yes")
{
	//Variables Assignment
	$user_name = trim(strip_tags($_POST['username']));
	$firstname = trim(strip_tags($_POST['firstname']));
	$lastname = trim(strip_tags($_POST['lastname']));
	$user_email = trim(strip_tags($_POST['email']));
	$user_password = trim(strip_tags($_POST['passwd']));
	$encrypted_md5_password = md5($user_password);
	
	$check_for_duplicates = mysqli_query($connection,"select * from `users` where `username` = '".mysqli_real_escape_string($connection,$user_name)."'");
	
	//Validate against empty fields
	if($user_name == "" || $firstname == "" || $lastname == "" || $user_email == "" || $user_password == "")
	{
		$error = '<br><div class="info">Sorry, all fields are required to create a new account. Thanks.</div><br>';
	}
	
	else if(mysqli_num_rows($check_for_duplicates) > 0) //Email address is unique within this system and must not be more than one
	{
		$error = '<br><div class="info">Sorry,this username already exist in our database and duplicate email addresses are not allowed for security reasons.<br>Please enter a different email address to proceed or login with your existing account. Thanks.</div><br>';
	}
	else
	{
		if(mysqli_query($connection,"insert into `users` values('', '".mysqli_real_escape_string($connection,$user_namename)."','".mysqli_real_escape_string($connection,$firstname)."', '".mysqli_real_escape_string($connection,$lastname)."', '".mysqli_real_escape_string($connection,$user_email)."', '".mysqli_real_escape_string($connection,$encrypted_md5_password)."', '".mysqli_real_escape_string($connection,date('d-m-Y'))."')"))
		{
			$_SESSION["VALID_USER_ID"] = $user_name;
			$_SESSION["USER_FULLNAME"] = strip_tags($firstname.'&nbsp;'.$lastname);
			header("location: index.php?page_owner=".base64_encode($user_namme));
		}
		else
		{
			$error = '<br><div class="info">Sorry, your account could not be created at the moment. Please try again or contact the site admin to report this error if the problem persist. Thanks.</div><br>';
		}
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
<div style="font-family:Verdana, Geneva, sans-serif; font-size:24px;">REGISTRATION</div><br clear="all" /><br clear="all" /><br clear="all" />





<!-- Code Begins -->
<center>
<div class="vpb_main_wrapper">

<br clear="all">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h2 align="left" style="margin-top:0px;">Users Registration</h2><br />

<div align="left" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; margin-bottom:10px;">Please complete the form provided below to demonstrate this system.</div><br />

<div style="width:115px; padding-top:10px;float:left;" align="left">Your Username:</div>
<div style="width:300px;float:left;" align="left"><input type="text" name="username" id="username" value="<?php  isset($_POST['username']) ? ($_POST["username"]): ''; ?>" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">


<div style="width:115px; padding-top:10px;float:left;" align="left">Your Firstname:</div>
<div style="width:300px;float:left;" align="left"><input type="text" name="firstname" id="firstname" value="<?php  isset($_POST['firstname']) ? ($_POST["firstname"]): ''; ?>" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">


<div style="width:115px; padding-top:10px;float:left;" align="left">Your Lastname:</div>
<div style="width:300px;float:left;" align="left"><input type="text" name="lastname" id="lastname" value="<?php  isset($_POST['lastname']) ? ($_POST["lastname"]): ''; ?>" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">


<div style="width:115px; padding-top:10px;float:left;" align="left">Email Address:</div>
<div style="width:300px;float:left;" align="left"><input type="text" name="email" id="email" value="<?php  isset($_POST['email']) ? ($_POST["email"]): ''; ?>" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">


<div style="width:115px; padding-top:10px;float:left;" align="left">Desired Password:</div>
<div style="width:300px;float:left;" align="left"><input type="password" name="passwd" id="passwd" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">


<div style="width:115px; padding-top:10px;float:left;" align="left">&nbsp;</div>
<div style="width:300px;float:left;" align="left">
<input type="hidden" name="submitted" id="submitted" value="yes">
<input type="submit" name="submit" id="" value="Submit" style="margin-right:50px;" class="vpb_general_button">
<a href="login.php" style="text-decoration:none;" class="vpb_general_button">Back to Login</a>

</div>

</form>
<br clear="all"><br clear="all">

</center>
<!-- Code Ends -->














</center>
</body>
</html>
