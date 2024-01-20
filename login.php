<?php
$link = mysqli_connect("localhost", "root", "", "users");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['pass']);

$sql = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'";
$result = mysqli_query($link, $sql);

if ($result) {
    
    if (mysqli_num_rows($result) > 0) {
        
        header("Location: main.html");
        exit();
    } else {
        echo "Login failed. Please check your username and email.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
