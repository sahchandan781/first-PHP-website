<?php
$insert = false;
if(isset($_POST['name'])){

// Connection variable
$server = "localhost";
$username = "root";
$password = "";

// make connection with database
$con = mysqli_connect($server, $username, $password);

// check for connection success
if(!$con){
    die("connection to this database failed due to" .
    mysqli_connect_error());
}
//echo "Success connecting to the db"

// Collect data from the user
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$other = $_POST['other'];


$sql = "INSERT INTO `trip`. `trip` (`name`, `age`, `gender`, `email`,`phone`, `other`, `dt`) 
VALUES ('$name', '$age', '$gender', '$email', 
     '$phone', '$other', current_timestamp());";
//echo $sql;


if($con->query($sql) == true){
    // echo "successfully inserted";
    $insert = true;
}
else {
    echo "Error: $sql <br> $con->error";
}
$con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link 
href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,
100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,
900&family=Sriracha&display=swap" 
rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="bgimg">
    <div class="container">
        <h3>Welcome to IIT Kharagpur US Trip form</h3>
        <p>Enter your details and submit this form to 
            confirm your participation in the trip</p>
        <?php
        if($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to 
            see you joining us for the US trip.</p>";
        }
        ?>

            <form action="./index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="age" id="age" placeholder="Enter your age">
                <input type="text" name="gender" id="gender" placeholder="Enter your gender">
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
                <textarea name="other" id="desc" placeholder="Enter any other information" 
                cols="30" rows="10"></textarea>
                <button  class="btn">Submit</button>
                
            </form>
    </div>
    <script src="index.js"></script>
</body>
</html>


