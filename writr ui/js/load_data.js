window.onload=function()
{
	var fileName = $('#fileName').val();
	jQuery.get(fileName, function(txt) {
		tinymce.get("texteditor").setContent(txt);
	});
};