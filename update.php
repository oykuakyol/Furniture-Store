<?php
$link = mysqli_connect("localhost", "root", "", "products");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];
    $sql_select = "SELECT * FROM product WHERE id = $edit_id";
    $result_select = mysqli_query($link, $sql_select);

    if ($result_select) {
        $row = mysqli_fetch_array($result_select);
    } else {
        echo "Error selecting record: " . mysqli_error($link);
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   
    $new_productName = $_POST['new_productName'];
    $new_productColor = $_POST['new_productColor'];
    $new_productQuality = $_POST['new_productQuality'];
    $new_productSize = $_POST['new_productSize'];
    $new_productMaterial = $_POST['new_productMaterial'];
 
    $new_productPrice = $_POST['new_productPrice'];

    $sql_update = "UPDATE product SET  product_name='$new_productName', product_color='$new_productColor',product_quality='$new_productQuality',product_size='$new_productSize', product_material='$new_productMaterial', product_price='$new_productPrice' WHERE id=$edit_id";

    if (mysqli_query($link, $sql_update)) {
header("Location: list.php");

    } else {
        echo "Error updating record: " . mysqli_error($link);
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Record</title>
    <style>
      select{
        display: block;
            margin-top: 10px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: small;
            height: 40px;
            border-radius: 8px;
            width: 385px;
            border-left: 2px solid #000;
            border-top: 2px solid #000;
            color: #9fa59f;
      }

    
        label {
            display: block;
            margin-top: 3px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: medium;
        }
        input {
            width: 100%; 
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius:8px;
            margin-top:10px;
        }
    
        .submit-button {
            background-color: #acac92;

            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 90px;
            margin-left: 290px;
        }
    
        .submit-button:hover {
            background-color: #4caf50;

        }
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            text-align: center;
            padding: 50px;
        }
        
        .add-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-top: 60px;
            display: flex;
            justify-content: space-between; 
        }
    
        .input-container {
            width: 48%; 
            box-sizing: border-box;
            text-align: left;
            margin-top: 15px;
        }
        
        .input-containerr {
            width: 48%; 
            box-sizing: border-box;
            text-align: left;
            margin-top: 79px;
        }
        option{
            font-size: small;
        }
        .navbar {
    margin-top: -58px;
  background-color: #acac92;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  width: 107%;
  margin-left: -58px;
}

.logo-container {
  flex-shrink: 0;
}

.logo-container img {
  max-height: 50px;
}

.navbar ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.navbar li {
  margin: 0;
  padding: 15px;
}

.navbar li a {
  text-decoration: none;
  color: black;
}

.navbar li.logout {
  margin-left: auto;
}
    </style>
</head>
<body>

    <div >
        <nav class="navbar">
          <div class="logo-container">
              Furniture Store
            <img src="logo.png" alt="Logo">
          </div>
          <ul>
            <li><a href="register.html">Add User</a></li>
            <li><a href="create.hmtl">Add Product</a></li>
            <li><a href="list.php">List Product</a></li>
            <li><a href="contact.html">Report Error</a></li>
            <li class="logout"><a href="logout.html"><i class="fas fa-door-open"></i> Log Out</a></li>
          </ul>
        </nav>
    </div>
    <div class="add-container">
        <div class="input-container">
    <h2>Edit Record</h2>
    <form method="post" action="">


        <label for="new_productName">Product Name:</label>
        <input type="text" name="new_productName" value="<?php echo $row['product_name']; ?>"><br>

        <label for="new_productColor">Product Color:</label>
        <input type="text" name="new_productColor" value="<?php echo $row['product_color']; ?>"><br>


 <label for="new_productQuality">Product Quality:</label>
        <input type="text" name="new_productQuality" value="<?php echo $row['product_quality']; ?>"><br>



        </div>

        <div class="input-containerr">

        <label for="new_productSize">Product Size:</label>
        <input type="text" name="new_productSize" value="<?php echo $row['product_size']; ?>"><br>




        <label for="new_productMaterial">Product Material:</label>
        <input type="text" name="new_productMaterial" value="<?php echo $row['product_material']; ?>"><br>






        <label for="new_productPrice">Product Price:</label>
        <input type="text" name="new_productPrice" value="<?php echo $row['product_price']; ?>"><br>

        <input type="submit" value="Update" class="submit-button">
    </form>
    </div>
</div>
</body>
</html>