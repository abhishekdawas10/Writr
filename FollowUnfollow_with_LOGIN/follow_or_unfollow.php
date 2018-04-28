<?php

include "config.php"; //Include the database connection settings file

if(isset($_POST["page_owner"]) && isset($_POST["follower"]) && !empty($_POST["page_owner"]) && !empty($_POST["follower"]))
{
	$page_owner = trim(strip_tags($_POST["page_owner"]));
	$follower = trim(strip_tags($_POST["follower"]));
    
	$check_if_following_or_not = mysqli_query($connection,"select * from `follow_and_unfollow_activity` where `page_owners_emails` = '".mysqli_real_escape_string($connection,$page_owner)."' and `followers_username` = '".mysqli_real_escape_string($connection,$follower)."'");
	
	
	if(mysqli_num_rows($check_if_following_or_not) > 0)
	{
		@mysqli_query($connection,"delete from `follow_and_unfollow_activity`  where `page_owners_emails` = '".mysqli_real_escape_string($connecion,$page_owner)."' and `followers_username` = '".mysqli_real_escape_string($connection,$follower)."'");
	}	
	else
	{
		@mysqli_query($connection,"insert into `follow_and_unfollow_activity` values('', '".mysqli_real_escape_string($connection,$page_owner)."', '".mysqli_real_escape_string($connection,$follower)."', '".mysqli_real_escape_string($connection,date('d-m-Y'))."')");
	}			
}
?>