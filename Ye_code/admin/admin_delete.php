<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>

    <div class="sidenav">
        <a href="home.php">Contact</a>
        <a href="admin_add.php">Add Video</a>
        <a href="admin_delete.php">Delete Video</a>
        <a href="admin_Advertisement.php">Add Advertisements</a>
    </div>

    <main class="admin_main">
        <form method="GET" action="">
            <input type="text" name="query" placeholder="Search events"
                value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
            <button type="submit">Search</button>
        </form>

        <?php

        $showResults = isset($_GET['query']);
        if ($showResults) {

            try {
                include_once("dtb.php");

                $limit = 5;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                $search_query = isset($_GET['query']) ? $_GET['query'] : "";

                $where_condition = empty($search_query) ? "1" : "(title LIKE :search_query OR description LIKE :search_query)";
                $sql = "SELECT * FROM video WHERE $where_condition LIMIT :limit OFFSET :offset";
                $stmt = $conn->prepare($sql);

                if (!empty($search_query)) {
                    $stmt->bindValue(':search_query', '%' . $search_query . '%', PDO::PARAM_STR);
                }

                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

                $stmt->execute();
                $result = $stmt->fetchAll();

                if ($stmt->rowCount() > 0) {
                    foreach ($result as $row) {
                        echo "<h2 class='video_populate'> 
                <a class='video_text' href='javascript:void(0);' onclick='window.open(\"videodelete.php?id=" . $row["id"] . "\", \"_self\", \"width=420,height=315\");'>" . $row["title"] . "</a>
                </h2><br> <p>" . $row["description"] . "</p><br><hr>";
                    }
                } else {
                    echo "No results";
                }



                $sql = "SELECT COUNT(id) as total FROM video WHERE $where_condition";
                $stmt = $conn->prepare($sql);

                if (!empty($search_query)) {
                    $stmt->bindValue(':search_query', '%' . $search_query . '%', PDO::PARAM_STR);
                }

                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_records = $row['total'];
                $total_pages = ceil($total_records / $limit);

                echo "<div class='pagination'>";
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<button><a href='?page=$i&query=$search_query'>$i</a> </button>";
                }
                echo "</div>";
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        ?>

    </main>

</body>

</html>