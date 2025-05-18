<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">

<head>
    <title>Contact Us</title>

    <?php include('header.php'); ?>


</head>

<body>

    <h1>Contact Us</h1>

    <label id="firstNameLabel" name="firstNameLabel" for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" /><br />

    <label id="lastNameLabel" name="lastNameLabel" for="lastName">Last Name:</label>
    <input type="text" id="LastName" name="lastName" /><br />

    <label id="emailLabel" name="emailLabel" for="email">Email :</label>
    <input type="text" id="email" name="email" /><br />

    <label id="phoneLabel" name="phoneLabel" for="phone">Phone :</label>
    <input type="text" id="phone" name="phone" /><br />

    <label id="reasonLabel" name="reasonLabel" for="reason">Message :</label> <br />
    <textarea id="reason" name="reason"></textarea><br />

    <label id="submitLabel" name="submitLabel" for="submitMainForm">&nbsp;</label>
    <input type="submit" id="submitMainForm" name="submitMainForm" value="Submit" /> <br />


</body>


<?php include('footer.php'); ?>

</html>