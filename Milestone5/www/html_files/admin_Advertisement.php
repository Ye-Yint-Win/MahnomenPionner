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

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="admin.css">

<head>
    <title>Home</title>

    <?php include('header.php'); ?>

</head>
<hr>

<nav class="admin_nav">

    <ul class="menu">

        <li class="admin_list" id="add_Page">
            <a class="admin_link" href="admin_add.php">
                <b>Add Page</b>
            </a>
        </li>

        <li class="admin_list" id="del_Page">
            <a class="admin_link" href="admin_delete.php">
                <b>Delete Page</b>
            </a>
        </li>

        <li class="admin_list" id="adverts">
            <a class="admin_link" href="admin_Advertisement.php">
                <b>Advertisements</b>
            </a>
        </li>

    </ul>
</nav>



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

<?php include('footer.php'); ?>


</html>