<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "phplessons";

<<<<<<< Updated upstream
try {
    $conn = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsername, $dbPassword);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
=======
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

?>d
>>>>>>> Stashed changes
