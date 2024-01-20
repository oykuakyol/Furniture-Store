<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<body>

<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'products');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($link === false) {
    die("ERROR: Could not connect" . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $arama_terimi = mysqli_real_escape_string($link, $_POST['arama_terimi']);

    $sql = "SELECT * FROM product WHERE product_name LIKE '%$arama_terimi%' OR
                                        product_color LIKE '%$arama_terimi%'  OR
                                        product_quality LIKE '%$arama_terimi%' OR 
                                        product_material LIKE '%$arama_terimi%' OR 
                                        product_size LIKE '%$arama_terimi%' OR 
                                        product_price LIKE '%$arama_terimi%'";
    $result = $link->query($sql);

    if ($result === false) {
        die("Sorgu hatası: " . $link->error);
    }

    if ($result->num_rows > 0) {
        echo '<table border="1" style="border-collapse: collapse; width: 100%;">';
        echo '<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Color</th>
                <th>Quality</th>
                <th>Material</th>
                <th>Size</th>
                <th>Price</th>
              </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row["id"] . '</td>
                    <td>' . $row["product_name"] . '</td>
                    <td>' . $row["product_color"] . '</td>
                    <td>' . $row["product_quality"] . '</td>
                    <td>' . $row["product_material"] . '</td>
                    <td>' . $row["product_size"] . '</td>
                    <td>' . $row["product_price"] . '</td>
                 </tr>';
        }

        echo '</table>';
    } else {
        echo "<div style='color: red;'>Result not found</div>";
    }
}

mysqli_close($link);
?>

</body>
</html>
