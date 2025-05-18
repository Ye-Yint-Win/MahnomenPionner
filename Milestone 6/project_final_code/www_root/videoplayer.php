<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>

    <?php include('header.php'); ?>
</head>

<body>

    <br><br>
    <div>
        <?php

        include_once("admin/dtb.php");


        if (isset($_GET['id'])) {
            $videoId = $_GET['id'];

            $sql = "SELECT * FROM video WHERE id = :videoId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":videoId", $videoId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($result) {
                $des = $result["description"];
                $title = $result["title"];
                $videoUrl = $result['link'];

                echo '<h2>' . $title . '</h2>';
                echo "<iframe  width='420' height='315' src='{$videoUrl}' title='Video Player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
                echo '<p>' . $des . '</p>';
            } else {
                echo "Video not found.";
            }
        } else {
            echo "Invalid video ID.";
        }
        ?>
    </div>
</body>


<?php include('footer.php'); ?>

</html>