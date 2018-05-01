<?php
// Start the session
session_start();
$id = ( isset($_GET["project"])) ? trim ($_GET["project"]) : 0;
$id2= ( isset($_GET["node"])) ? trim ($_GET["node"]) : 0;
$_SESSION["project_id"]= $id;
$_SESSION["node_id"]= $id2;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Writr Editor</title>
	</head>
	<body>
		<iframe name="myiframe" style="display: none;"></iframe>
		<form id="get-data-form" name="get-data-form" method="post" action="save.php" target="myiframe">
			<textarea class="tinymce" id="texteditor" name="usertext"></textarea>
			<input type="submit" value="Save Text">
			<button formaction="downloadPDF.php">Download PDF</button>
            <?php
                $id2=$_SESSION["node_id"];
                $id= $_SESSION["project_id"];
                echo "<input type=\"hidden\" name=\"fileName\" id=\"fileName\" value=\"projects/$id/$id2/main.txt\">"
            ?>
			
		</form>
		<br/>
		<button onclick="saveTextAsFile()">Download Data Dump</button>
		<script type="text/javascript">
			function saveTextAsFile()
			{
				var textToSave = tinymce.get("texteditor").getContent();
				var textToSaveAsBlob = new Blob([textToSave], {type:"text/plain"});
				var textToSaveAsURL = window.URL.createObjectURL(textToSaveAsBlob);
				//var fileNameToSaveAs = document.getElementById("inputFileNameToSaveAs").value;
				var fileNameToSaveAs = "data_dump.txt";
				var downloadLink = document.createElement("a");
				downloadLink.download = fileNameToSaveAs;
				downloadLink.innerHTML = "Download File";
				downloadLink.href = textToSaveAsURL;
				downloadLink.onclick = destroyClickedElement;
				downloadLink.style.display = "none";
				document.body.appendChild(downloadLink);
 
				downloadLink.click();
				document.getElementById("inputTextToSave").value = "deafult text";
			}
			
			function destroyClickedElement(event)
			{
				document.body.removeChild(event.target);
			}
		</script>
		<br/>
		<br/>
		<div id="data-container">
		</div>

		<!-- javascript -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/load_data.js"></script>
		<script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>
			
	</body>
</html>