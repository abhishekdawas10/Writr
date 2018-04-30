<?php

session_start();
ob_start();

//Include the database connection file
include "config.php"; 

//Check to be sure that a valid session has been created
if(isset($_SESSION["VALID_USER_ID"]))
{
	//This identifies the owners of pages for Follow and Unfollow activities
	if(isset($_GET["page_owner"]) && !empty($_GET["page_owner"]))
	{
		$page_owner = strip_tags(base64_decode($_GET["page_owner"]));
	}
	else
	{
		$page_owner = strip_tags($_SESSION["VALID_USER_ID"]);
	}
	
	//Check the database table for the logged in user information
	$check_user_details = mysqli_query($connection,"select * from `users` where `username` = '".mysqli_real_escape_string($connection,$page_owner)."'");
	
	//Get all the logged in user information from the database users table
	$get_user_details = mysqli_fetch_array($check_user_details);
	
	$user_id = strip_tags($get_user_details['id']);
	$username = strip_tags($get_user_details['username']);
	$firstname = strip_tags($get_user_details['firstname']);
	$lastname = strip_tags($get_user_details['lastname']);
	$email = strip_tags($get_user_details['email']);
	
	
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WRITR Follow Unfolllow System</title>





<!-- Required header files -->
<script type="text/javascript" src="js/jquery_1.5.2.js"></script>
<script type="text/javascript" src="js/vpb_script.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">               
       
</head>
<body>
<center>
<div align="center" style="padding-right:20px;"><a href="logout.php" style="text-decoration:none;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:15px; color:blue;">Logout</font></a></div>


<center>
<div style="width:1070px;">
<div style="width:700px; float:left;" align="left">

<div class="vpb_profile_photo_wrapper">
<div style=" font-family:Verdana, Geneva, sans-serif;font-size:18px;"><?php echo $firstname.'&nbsp;'.$lastname; ?>'s page</div><br />
<img src="images/big_avatar.jpg" width="190" style="min-height:100px; height:auto;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;" border="0" /><br clear="all" />
</div><br clear="all" />


<div class="vpb_follow_and_unfollow_wrapper">
<!-- Follow and Unfollow Activities Starts Here -->
<?php
 //If the logged in user is not on his or her page then show him or her the follow and unfollow button otherwise show him or her the Edit Profile button
if($page_owner != strip_tags($_SESSION["VALID_USER_ID"]))
{
	$check_following_or_not = mysqli_query($connection,"select * from `follow_and_unfollow_activity` where `page_owners_emails` = '".mysqli_real_escape_string($connection,$page_owner)."' and `followers_username` = '".mysqli_real_escape_string($connection,$_SESSION["VALID_USER_ID"])."'");
	
	if(mysqli_num_rows($check_following_or_not) > 0)
	{
		?>
		<span id="loading"></span>
		<span class="button following" id="following" onClick="follow_or_unfollow('<?php echo $page_owner; ?>','<?php echo $_SESSION["VALID_USER_ID"]; ?>','following');">Following</span>
		
		<span style="display:none;" class="button follow" id="follow" onClick="follow_or_unfollow('<?php echo $page_owner; ?>','<?php echo $_SESSION["VALID_USER_ID"]; ?>','follow');">Follow</span>
		<?php
	}
	else
	{
		?>
		<span id="loading"></span>
		<span class="button follow" id="follow" onClick="follow_or_unfollow('<?php echo $page_owner; ?>','<?php echo $_SESSION["VALID_USER_ID"]; ?>','follow');">Follow</span>
		
		<span style="display:none;" class="button following" id="following" onClick="follow_or_unfollow('<?php echo $page_owner; ?>','<?php echo $_SESSION["VALID_USER_ID"]; ?>','following');">Following</span>
		<?php
	}
}
else
{
	//Show the Edit Profile Button only when the logged in user is on his or her page
	?>
    <a href="javascript:void(0);" style="float:left; margin-left:25%;" class="vpb_general_button" onclick="alert('Hello <?php echo $firstname.'&nbsp;'.$lastname; ?>, there\'s no functionality associated with the button you have just clicked\n\nPlease click on any name of the people you may want to follow at the right side of this page.\n\nThanks...');">Edit Profile</a>
    <?php
}
?>
<!-- Follow and Unfollow Activities Ends Here -->       
</div>

<br clear="all" />
<div style="float:left; font-family:Verdana, Geneva, sans-serif; font-size:11px; width:300px; margin-top:80px; line-height:20px;">
To demo the system, please click on any name of the people you may want to follow and/or unfollow at the right side of this page.<br />
<br />
When the page of that user opens, click on the Follow and/or Unfollow button that you will see above.
</div><br clear="all" />


</div>


<div style="width:370px; float:right;" align="right">
<div style=" font-family:Verdana, Geneva, sans-serif;font-size:18px;">People you may want to follow</div><br />
<div style="overflow-x:hidden;overflow-y:auto;height:510px; width:300px; float:right;">

<?php  
//Check for all the users in the users table as people a logged in user may want to follow
$check_users_in_the_system = mysqli_query($connection,"select * from `users` order by `id` desc limit 100");

if(mysqli_num_rows($check_users_in_the_system) > 0 )
{
	//Get for all the users in the users table and display on the screen as people a logged in user may want to follow
	while ($get_users_in_the_system = mysqli_fetch_array($check_users_in_the_system))
	{
		//Do not show the logged in user his or her info among the people he or she may want to follow
		if($get_users_in_the_system["email"] == $_SESSION["VALID_USER_ID"]) {} 
		else {
		?>
		<a href="index.php?page_owner=<?php echo base64_encode(strip_tags($get_users_in_the_system["email"])); ?>"><div class="vpb_people_you_may_want_to_follow_wrapper">
		<div style="float:left; width:90px;"><img src="images/big_avatar.jpg" class="vpb_people_you_may_want_to_follow_photos" border="0" align="absmiddle" /></div>
		<div style="float:left; width:140px;"><?php echo strip_tags($get_users_in_the_system["firstname"]).'&nbsp;'.strip_tags($get_users_in_the_system["lastname"]); ?></div>
		</div></a><br clear="all" />
		<?php
		}
	}
}
else
{
	echo '<div class="info">There is no user in this system at the moment.</div>';
}
?>

</div>
 
</div>


</div>





<br clear="all">
</center>
<p style="padding-bottom:100px;">&nbsp;</p>
</center>
</body>
</html>
<?php
}
else
{
	//Redirect user back to login page if there is no valid session created
	header("location: login.php");
}
?>