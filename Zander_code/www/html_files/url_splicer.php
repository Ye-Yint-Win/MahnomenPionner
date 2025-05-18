<?php
    $oldURL = "";
    $partURL = "";
    $newURL = "";

    if (isset($_POST['submitMainForm'])) {

        $oldURL = $_POST['url'];
        if (str_contains($oldURL, "=")){
            $partURL = explode("=", $oldURL);
            $newURL = "https://www.youtube.com/embed/".$partURL[1];
            echo $newURL;
        } else {
            $partURL = explode("/", $oldURL);
            $newURL = "https://www.youtube.com/embed/".$partURL[3];
            echo $newURL;
        };
    };
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>

</head>
<hr>

<body></body>
</body>

<form id="mainForm" name="mainForm" method="post" action="" enctype="multipart/form-data" onsubmit="return urlChanger();">

    <label id="urlLabel" name="urlLabel" for="urlName">URL :</label>
    <input type="text" id="url" name="url" class = "urlform" />

    <label id="submitLabel" name="submitLabel" for="submitMainForm">&nbsp;</label>
    <input type="submit" id="submitMainForm" name="submitMainForm" class = "form" /> <br />

</form>


</html>