<!DOCTYPE html>
<html lang="en">


<!-- This is continuation from the admin_delete.php, when you get the search data from get method there, we get id from click on the title. 
Then, i used the same thing as videoplayer.php -->


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Video Delete Confirmation</title>

    <?php include('header.php'); ?>
</head>

<body>

    <br><br>
    <div>
        <?php
        include_once("dtb.php");
        echo "<h2>Is this the Video you want to Delete?</h2>";

        if (isset($_GET['id'])) {
            $videoId = $_GET['id'];


            #videoplayer.php
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
                echo "<iframe width='420' height='315' src='{$videoUrl}' title='Video Player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
                echo '<p>' . $des . '</p>';
            } else {
                echo "Video not found.";
            }
        } else {
            echo "Invalid video ID.";
        }
        ?>
        <!-- Just for Delete function-->

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $videoId; ?>">
            <button type="submit" name="delete">Delete</button>
        </form>

        <?php
        if (isset($_POST['delete'])) {
            $videoIdToDelete = $_POST['id'];

            $deleteSql = "DELETE FROM video WHERE id = :videoIdToDelete";
            $stmt = $conn->prepare($deleteSql);
            $stmt->bindParam(":videoIdToDelete", $videoIdToDelete, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Deletion Complete";
                header("Location: admin_delete.php");
                exit(); // Ensure script stops executing after redirect
            } else {
                echo "Error deleting video.";
            }
        }
        ?>
    </div>

</body>

<?php include('footer.php'); ?>

</html>