<html>
<link rel="stylesheet" type="text/css" href="style.css">

<head>
    <title>Events</title>

    <?php include('header.php'); ?>

</head>

<body>

    <?php
    include_once("dtb.php");


    $limit = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    $sql = "SELECT * FROM video WHERE event_type='sport' LIMIT $limit OFFSET $offset;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2 class='video_populate'> 
        <a class='video_text' href='javascript:void(0);' onclick='window.open(\"videoplayer.php?id=" . $row["id"] . "\", \"_self\", \"width=420,height=315\");'>" . $row["title"] . "</a>
        </h2><br> <p>" . $row["description"] . "</p><br><hr>";
        }
    }


    $sql = "SELECT COUNT(id) as total FROM video WHERE event_type='sport';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_records = $row['total'];
    $total_pages = round($total_records / $limit);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<button><a href='?page=$i'>$i</a> </button>";
    }
    echo "</div>";
    ?>

</body>
<?php include('footer.php'); ?>

</html>