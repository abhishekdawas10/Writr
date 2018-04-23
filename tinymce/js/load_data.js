window.onload=function()
{	
	jQuery.get('user_data.txt', function(txt) {
		tinymce.get("texteditor").setContent(txt);
	});
};