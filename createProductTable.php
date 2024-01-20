<?php
$link = mysqli_connect("localhost", "root", "", "products");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "CREATE TABLE product (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_color VARCHAR(50) NOT NULL,
    product_quality VARCHAR(50) NOT NULL,
    product_material VARCHAR(50) NOT NULL,
    product_size VARCHAR(20) NOT NULL,
    product_price DECIMAL(10,2) NOT NULL
)";

if (mysqli_query($link, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
