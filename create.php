<?php
$link = mysqli_connect("localhost", "root", "", "products");
if($link === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}

$product_name = mysqli_real_escape_string($link, $_REQUEST['product_name']);
$product_color = mysqli_real_escape_string($link, $_REQUEST['product_color']);
$product_quality = mysqli_real_escape_string($link, $_REQUEST['product_quality']);
$product_material = mysqli_real_escape_string($link, $_REQUEST['product_material']);
$product_size = mysqli_real_escape_string($link, $_REQUEST['product_size']);
$product_price = mysqli_real_escape_string($link, $_REQUEST['product_price']);

$sql = "INSERT INTO product (product_name, product_color, product_quality, product_material, product_size, product_price) 
        VALUES ('$product_name', '$product_color', '$product_quality', '$product_material', '$product_size', '$product_price')";

if(mysqli_query($link, $sql)){
        header("Location: main.html");
        exit();
   } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   }
   // Close connection
   mysqli_close($link);
?>
