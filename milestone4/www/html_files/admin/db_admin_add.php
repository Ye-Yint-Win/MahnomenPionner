<?php


$title = $link = $description = $event_type = "";
$title_error = $link_error = $description_error = $event_type_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $title_error = "Title Missing";
    } else {
        $title = trim($_POST["title"]);
    }

    if (empty($_POST["link"])) {
        $link_error = "Link Missing";
    } else if (!(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST["link"]))) {
        $link_error = $_POST["link"] . " is not a valid link";
    } else {
        $org_link = trim($_POST["link"]);
        $part_link = explode("=", $org_link);
        $link = "https://www.youtube.com/embed/" . $part_link[1];
    }

    if (empty($_POST["description"])) {
        $description_error = "Description Missing";
    } else {
        $description = trim($_POST["description"]);
    }

    if (empty($_POST["event_type"])) {
        $event_type_error = "Event Type Missing";
    } else {
        $event_type = trim($_POST["event_type"]);
    }

    header("Location: db_admin_add.php");
    exit();

}

function url_splice($data)
{
    $org_link = trim($data);
    $part_link = explode("=", $org_link);
    return "https://www.youtube.com/embed/" . $part_link[1];
}
$not_empty = ($title != "" && $link != "" && $description != "" && $event_type != "");

if ($not_empty) {
    $conn = new mysqli('localhost', 'root', '', 'phplessons');
    if ($conn->connect_error) {
        echo ". $conn->connect_error";
        die("SQL Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO video(title, link, description, event_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $link, $description, $event_type);

        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}

?>