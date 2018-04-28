/**************************************************************************************
* Follow and Unfollow Application similar to Twitter using Ajax, Jquery and PHP
* This script has been released with the aim that it will be useful.
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
* All Copy Rights Reserved by Vasplus Programming Blog
***************************************************************************************/


//Changes the Following text to Unfollow when mouseover the button 
$(document).ready(function()
{
    $('.following').hover(function()
    {
        $(this).text("Unfollow");
    },function()
    {
        $(this).text("Following");
    });
 });
 
 //Perform the Following and Unfollowing work
function follow_or_unfollow(page_owner,follower,action)
{
    var dataString = "page_owner=" + page_owner + "&follower=" + follower;
    $.ajax({  
        type: "POST",  
        url: "follow_or_unfollow.php",  
        data: dataString,
		cache: false,
        beforeSend: function() 
        {
            if ( action == "following" )
            {
                $("#following").hide();
                $("#loading").html('<img src="images/loading.gif" align="absmiddle" alt="Loading...">');
            }
            else if ( action == "follow" )
            {
                $("#follow").hide();
                $("#loading").html('<img src="images/loading.gif" align="absmiddle" alt="Loading...">');
            }
            else { }
        },  
        success: function(response)
        {
            if ( action == "following" )
			{
                $("#loading").html('');
                $("#follow").show();
                
            }
            else if ( action == "follow" )
			{
                $("#loading").html('');
                $("#following").show();
            }
            else { }
        }
    }); 
}