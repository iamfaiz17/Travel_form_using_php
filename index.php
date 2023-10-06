<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "success connecting to the database";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `rd trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
    // echo $sql;

    if($con->query($sql) == true){
        $insert = true;
        // echo "successfully Inserted";
    }
    else{
        echo "Error : $sql <br> $con->error";
    }
    $con->close();
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <img class="bg" src="rd1.png" alt="RD Collage" >
    <div class="container">
        <h3>Welcom To RD Engneering Delhi Trip Form</h3>
        <p>Please Mention Your Details</p>
        <?php
        if($insert == true){
        echo "<p class='submitting'>Thanks for submitting your form</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any Other Information Here "></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>


    
</body>
</html>
