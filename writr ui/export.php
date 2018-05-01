<?php
// Start the session
session_start();
$projectid= $_SESSION['project_id'];
$fp = fopen("projects/$projectid/full.txt", "w");
$savestring = $_SESSION["fulltext"];
fwrite($fp, $savestring);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Writr Editor</title>
    </head>
    <body>
        <form id="get-data-form" name="get-data-form" method="post" action="save.php">
            <textarea class="tinymce" id="texteditor" name="usertext"></textarea>
            <input type="submit" value="Save Text">
            <button formaction="downloadPDF.php">Download PDF</button>
            <?php
            $id= $_SESSION["project_id"];
            echo "<input type=\"hidden\" name=\"fileName\" id=\"fileName\" value=\"projects/$projectid/full.txt\">";
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