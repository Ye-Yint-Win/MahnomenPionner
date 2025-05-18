<!DOCTYPE html>
<html lang="en">
<style>
    form {
        display: inline;
        margin: 0;
        padding: 0;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <nav class="navbar">
        <div>
            <a class="navbar" href="index.php" id="mahnomen_logo"><img src="Mahnomenpioneer_banner.jpg"
                    alt="Mahnomen Pioneer" class="mahnomen_logo" /></a>
        </div>

        <div class="navbar_head">
            <a id="home_button" href="index.php">
                <button class="dropbtn" id="home_button_button" name="header">Home</button>
            </a>

            <div class="dropdown">
                <button class="dropbtn">Videos</button>
                <div class="dropdown-content">
                    <ul>
                        <li><a href="localnews.php">Local News</a></li>
                        <li><a href="sports.php">Sports</a></li>
                        <li><a href="events_videos.php">Events</a></li>
                    </ul>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Account</button>
                <div class="dropdown-content">
                    <ul>
                        <li><a
                                href="https://1795.newstogo.us/editionviewer/default.aspx?view=subscribe&Edition=5ab8cce6-f173-43ba-9b11-91a638ad89ef">Subscription</a>
                        </li>
                        <li><a href="payment.php">Payment</a></li>
                    </ul>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">About</button>
                <div class="dropdown-content">
                    <ul>
                        <li><a href="contact_us.php">Contact Us</a></li>
                        <li><a href="about_us.php">About Us</a></li>
                        <li><a href="privacy.php">Policies</a></li>
                    </ul>
                </div>
            </div>


            <form method="GET" action="searchedvideos.php" for="query">
                <input type="text" name="query" placeholder="Search events" class = "searchBar"
                    value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
            </form>

        </div>

    </nav>


</body>

</html>