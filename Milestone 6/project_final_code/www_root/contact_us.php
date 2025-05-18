<?php
$firstName = "";
$lastName = "";
$email = "";
$phone = "";
$reason = "";

if (isset($_POST['submitMainForm'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $reason = $_POST['reason'];

    $arrayData = array("firstName", "lastName", "email", "phone", "reason");
    $isValid = true;
    for ($x = 0; $x < count($arrayData); $x++){
        ${$arrayData[$x] . "Err"} = "";
        if(empty($_POST[$arrayData[$x]])){
            ${$arrayData[$x] . "Err"} = "Required";
            $isValid = false;
        }
    } 
    
    if($isValid == true){
        header("Location: contact_us.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">

<head>
    <title>Contact Us</title>

    <?php include('header.php'); ?>


</head>

<body>
    <div class = "center">
        <h1>Contact Us</h1>
    </div>
    <div class = "form-container">
        <form id="mainForm" name="mainForm" method="post" action="" enctype="multipart/form-data">
            <label id="firstNameLabel" name="firstNameLabel" for="firstName">First Name:</label><br />
            <input type="text" id="firstName" name="firstName" class = "form" value="<?php echo $_POST["firstName"]; ?>" />
            <span class = "error"><?php echo $firstNameErr;?></span><br />

            <label id="lastNameLabel" name="lastNameLabel" for="lastName">Last Name:</label><br />
            <input type="text" id="LastName" name="lastName" class = "form" value="<?php echo $_POST["lastName"]; ?>"/>
            <span class = "error"><?php echo $lastNameErr;?></span><br />
            
            <label id="emailLabel" name="emailLabel" for="email">Email :</label><br />
            <input type="text" id="email" name="email" class = "form" value="<?php echo $_POST["email"]; ?>"/>
            <span class = "error"><?php echo $emailErr;?></span><br />
            
            <label id="phoneLabel" name="phoneLabel" for="phone">Phone :</label><br />
            <input type="text" id="phone" name="phone" class = "form" value="<?php echo $_POST["phone"]; ?>"/>
            <span class = "error"><?php echo $phoneErr;?></span><br />

            <label id="reasonLabel" name="reasonLabel" for="reason">Message :</label> <br />
            <textarea id="reason" name="reason" class = "form" ><?php echo $_POST["reason"]; ?></textarea>
            <span class = "error"><?php echo $reasonErr;?></span><br />

            <label id="submitLabel" name="submitLabel" for="submitMainForm">&nbsp;</label><br />
            <input type="submit" id="submitMainForm" name="submitMainForm" value="Submit" /> <br />
        </form>
    </div>

</body>


<?php include('footer.php'); ?>

</html>