<?php

try {
    $cookieName = "loginCookie";
    if (isset($_COOKIE[$cookieName])) {
    } else {
        header("Location: login_page.php");
    }
} catch (Exception $e) {
    echo ("ERROR: " . $e . "<br />");
}

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="stylesheet" type="text/css" href="style.css">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

    <div class="sidenav">
        <a href="home.php">Contact</a>
        <a href="admin_add.php">Add Video</a>
        <a href="admin_delete.php">Delete Video</a>
        <a href="admin_Advertisement.php">Add Advertisements</a>
    </div>

    <main class="admin_main">
        <h2 position="center"><b>Add Advertisement</b>
            <h2>

                <div class="add_advertisemetn">
                    <form>
                        Upload Ads
                        <input type="file" id="myFile" name="filename">

                        <input type="submit" value="Submit">

                    </form>
                </div>

    </main>
</body>




<?php include('footer.php'); ?>

</html>