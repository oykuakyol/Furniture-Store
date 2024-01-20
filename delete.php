<?php
$link = mysqli_connect("localhost", "root", "", "products");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $deleteSql = "DELETE FROM product WHERE id = $delete_id";

    if (mysqli_query($link, $deleteSql)) {
        echo "Record deleted successfully.";
    } else {
        echo "ERROR: Could not able to execute $deleteSql. " . mysqli_error($link);
    }
}

mysqli_close($link);

header("Location: list.php");
exit;
?>