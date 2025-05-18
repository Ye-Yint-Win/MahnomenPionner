<?php
echo '

<html>
<link rel="stylesheet" type="text/css" href="style.css">

<nav class="navbar"></nav>
    <div>
        <a class="navbar" href="home.php" id="mahnomen_logo"><img src="Mahnomenpioneer_banner.jpg" alt="Mahnomen Pioneer"class="mahnomen_logo" />
        </a>
    </div>
    <div class= "navbar_head">
        <a id="home_button" href="home.php">
            <button class="dropbtn" id="home_button_button"name="header">Home</button>
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
                    <li><a href="https://1795.newstogo.us/editionviewer/default.aspx?view=subscribe&Edition=5ab8cce6-f173-43ba-9b11-91a638ad89ef">Subscription</a></li>
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
                    <li><a href="privacy.php">Privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="dropdown" name="header" >
            <input type="search" placeholder="search">
        </div>
        </div>


</nav>

</html>'

    ?>