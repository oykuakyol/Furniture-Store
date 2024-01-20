<?php
$link = mysqli_connect("localhost", "root", "", "products");

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "SELECT * FROM product";
$result = mysqli_query($link, $sql);

$recordsPerPage = 12;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

$totalRecords = mysqli_num_rows($result);
$totalPages = ceil($totalRecords / $recordsPerPage);

$startIndex = ($currentPage - 1) * $recordsPerPage;
$limitSql = "LIMIT $startIndex, $recordsPerPage";

$sql = "SELECT * FROM product $limitSql";
$result = mysqli_query($link, $sql);

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product List</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .fas {
            color: black;
            font-size: 20px;
        }

        form {
            display: flex;
            justify-content: space-between;
            max-width: 300px;
            margin: 0 auto;
        }

        input[type="text"] {
            width: 70%;
            padding: 8px;
        }

        input[type="submit"] {
            width: 28%;
            background-color: #acac92;
            color: white;
            padding: 8px;
            border: none;
        }
        .navbar {
            
  background-color: #acac92;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  width: 100%;
  margin-bottom: 10px;
  
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
            <li><a href="create.html">Add Product</a></li>
            <li><a href="list.php">List Product</a></li>
            <li><a href="contact.php">Report Error</a></li>
            <li class="logout"><a href="logout.php"><i class="fas fa-door-open"></i> Log Out</a></li>
          </ul>
        </nav>
    </div>
    
<form action="search.php" method="post">
    <input type="text" name="arama_terimi" placeholder="Ara...">
    <input type="submit" value="Ara">
</form>

<div class="container mt-4">
    <h2>Product List</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Color</th>
                <th>Product Quality</th>
                <th>Product Size</th>
                <th>Product Material</th>
                <th>Product Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_color'] . "</td>";
                echo "<td>" . $row['product_quality'] . "</td>";
                echo "<td>" . $row['product_size'] . "</td>";
                echo "<td>" . $row['product_material'] . "</td>";
                echo "<td>" . $row['product_price'] . "</td>";
                echo "<td>";
                echo "<a href='javascript:void(0);' onclick='confirmDelete(" . $row['id'] . ")'><i class='fas fa-trash-alt'></i></a> | ";
                echo "<a href='update.php?id=" . $row['id'] . "'><i class='fas fa-edit'></i></a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                echo "<li class='page-item'><a class='page-link' href='list.php?page=$i'>$i</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    function confirmDelete(id) {
        var confirmDelete = confirm('Silmek istediğinizden emin misiniz?');

        if (confirmDelete) {
            window.location.href = 'delete.php?delete_id=' + id;
        }
    }
</script>
</body>
</html>