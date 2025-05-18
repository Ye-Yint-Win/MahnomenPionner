<?php
error_reporting(0);

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
        <h2><b>Add Advertisement</b></h2>

        <div class="add_advertisement">
            <form id="add_vid" name="add_vid" method="POST" action="">
                <div class="vid_fill_up">
                    Video Title
                    <input required placeholder="Video Name" name="title" id="title"
                        value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>">
                </div>

                <div class="vid_fill_up">
                    Video Link
                    <input required placeholder="Video Link" name="link" id="link" value="
                        <?php echo isset($link) ? htmlspecialchars($link) : ''; ?>">
                </div>

                <div class="vid_fill_up">
                    Video Description
                    <input required placeholder="Description" name="description" id="description"
                        value="<?php echo isset($description) ? htmlspecialchars($description) : ''; ?>">
                </div>

                <div class="vid_fill_up">
                    Event Type
                    <input required placeholder="Event Type" name="event_type" id="event_type"
                        value="<?php echo isset($event_type) ? htmlspecialchars($event_type) : ''; ?>">
                </div>

                <button type="submit">Submit</button>
            </form>
        </div>
    </main>

</body>

</html>