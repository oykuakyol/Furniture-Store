<?php

$link = mysqli_connect("localhost", "root", "", "users");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$createTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    second_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    pass VARCHAR(20) NOT NULL
)";

if (mysqli_query($link, $createTableSql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $createTableSql. " . mysqli_error($link);
}

$insertDataSql = "INSERT INTO users (first_name, second_name, email, username, pass) VALUES
 ('Alparslan', 'Horasan', 'alparslanhorasan@gmail.com', 'ahorasan', 'alparslan2023')";

if (mysqli_query($link, $insertDataSql)) {
    echo "Records inserted successfully.";
} else {
    echo "ERROR: Could not able to execute $insertDataSql. " . mysqli_error($link);
}

mysqli_close($link);
?>



