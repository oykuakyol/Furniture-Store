<?php
$link = mysqli_connect("localhost", "root", "", "users");

if($link === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}

$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$second_name = mysqli_real_escape_string($link, $_REQUEST['second_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$pass = mysqli_real_escape_string($link, $_REQUEST['pass']);

$sql = "INSERT INTO users (first_name,second_name,email,username,pass) VALUES
('$first_name', '$second_name', '$email','$username','$pass')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    header("Location: login.html");
    exit();
   
} else{
 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>