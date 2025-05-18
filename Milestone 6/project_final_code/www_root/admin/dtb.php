<?php

$cookieName = "loginCookie";
if (isset($_COOKIE[$cookieName])) {
} else {
    header("Location: index.php");
}


$dbServername = "localhost";
$dbUsername = "nathankr_personal";
$dbPassword = "Saxophone2019!";
$dbName = "nathankr_mah_pioneer";

try {
    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>