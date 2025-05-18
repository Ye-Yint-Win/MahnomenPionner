<!DOCTYPE html>

<html>
<link rel="stylesheet" type="text/css" href="style.css">
<!-- Look at comments in amin_dalete.php -->

<head>
    <title>Local News</title>

    <?php include('header.php'); ?>

</head>

<body>

    <?php
    include_once("admin/dtb.php");


    $limit = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    $sql = "SELECT * FROM video WHERE event_type=2 LIMIT :limit OFFSET :offset;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
    $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
    $stmt->execute();
    $video = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($video) {
        foreach ($video as $row) {
            echo "<h2 class='video_populate'> 
        <a class='video_text' href='javascript:void(0);' onclick='window.open(\"videoplayer.php?id=" . $row["id"] . "\", \"_self\", \"width=420,height=315\");'>" . $row["title"] . "</a>
        </h2><br> <p>" . $row["description"] . "</p><br><hr>";
        }
    }


    $countStmt = $conn->prepare("SELECT COUNT(id) as total FROM video WHERE event_type = 2");
    $countStmt->execute();
    $total_records = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
    $total_pages = ceil($total_records / $limit);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<button><a href='?page=$i'>$i</a> </button>";
    }
    echo "</div>";
    ?>

</body>
<?php include('footer.php'); ?>

</html>