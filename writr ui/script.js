$(document).ready(function(){ 
//to change the text 
$('.following').hover(function(){ 
$(this).text("Unfollow"); 
},function(){ 
$(this).text("Following"); 
}); 
//for toggle the class following/follow When click 
$('.following').click(function(){ 
$(this).toggleClass('following follow').unbind("hover"); 
if($(this).is('.follow')){ 
$(this).text("Follow"); 
} 
else{ 
//binding mouse hover functionality 
$(this).bind({ 
mouseleave:function(){$(this).text("Following");}, 
mouseenter:function(){$(this).text("Unfollow");} 
}); 
} 
}); 
}); 
