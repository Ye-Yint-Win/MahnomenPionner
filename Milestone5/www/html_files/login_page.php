<?php

$username = "";
$password = "";
$isValid = false;

if (isset($_POST['submitMainForm'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin") {
        $isValid = true;
    } else {
        echo ("Incorrect Username or Password");
    }

    if ($isValid == true) {
        $data = array("Logged In:" => $isValid);
        setcookie("loginCookie", json_encode($data), 0, "/");
        header("Location: admin_add.php");
        exit;
    }
}


?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="admin.css">
<style>
    .center {
        padding: 70px 0;
        border: 3px solid green;
        text-align: center;
        position: center;
        position: absolute;
    }
</style>

<head>

    <title>Login</title>

</head>

<body>
    <div class="center">
        <h1>Login</h1>

        <form id="mainForm" name="mainForm" method="post" action="" enctype="multipart/form-data" onsubmit=""
            position="">

            <label id="usernameLabel" name="usernameLabel" for="username">Username :</label>
            <input type="text" id="username" name="username" class="form" /><br />

            <label id="passwordLabel" name="passwordLabel" for="password">Password :</label>
            <input type="password" id="password" name="password" class="form" /><br />

            <label id="submitLabel" name="submitLabel" for="submitMainForm">&nbsp;</label>
            <input type="submit" id="submitMainForm" name="submitMainForm" class="form" value="Submit" /> <br />

        </form>
    </div>

</body>


</html>