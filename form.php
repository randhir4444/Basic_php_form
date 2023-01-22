<?php
$insert = false;
if (isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
$con=mysqli_connect($server, $username, $password);   //connection variable
if (!$con){
    die("Could not connect to database due to " . mysqli_connect_error());
}
// echo "Sucess Connecting to " ;
$name=$_POST['name'];
$number=$_POST['number'];
$sql="INSERT INTO `manali_trip`.`trip` ( `Name`, `Number`) VALUES ('$name', '$number')";
// echo "$sql";
if($con->query($sql)==true)
{
    // echo "Succesfully inserted";
    $insert=true;
}
else{
    echo   "Failed to insert: $sql <br> $con->error";
}
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPU</title>
</head>
<body>
    <div class="container">
        <h2>Welcome to LPU Manali Trip Form</h2>
        <p>Fill Below form to confirm your participation</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="formindex.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <label for="number">Number</label>
        <input type="number" name="number" id="phone" placeholder="Enter your phone">
        <br>
        <button>Submit</button> 
        </form>
    </div>
</body>
</html>
