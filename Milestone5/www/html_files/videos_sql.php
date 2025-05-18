
<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "phplessons";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

$sql  = "SELECT * FROM video:";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo"Title". $row["title"] ."link. $row["link"];
}

?>