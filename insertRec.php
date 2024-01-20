<?php
$link = mysqli_connect("localhost", "root", "", "products");

if($link === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "INSERT INTO product (product_name, product_color, product_quality , product_material ,product_size , product_price ) VALUES 
('Chair', 'Red', 'High', 'Wood', '50x100', '120'),
('Chair', 'Blue', 'Medium', 'Metal', '50x100', '90'),
('Chair', 'Green', 'Low', 'Plastic', '50x100', '60'),
('Table', 'Brown', 'High', 'Wood', '80x120', '250'),
('Table', 'White', 'Medium', 'Glass', '80x120', '180'),
('Table', 'Black', 'Low', 'Metal', '80x120', '120'),
('Sofa', 'Gray', 'High', 'Fabric', '150x200', '600'),
('Sofa', 'Beige', 'Medium', 'Leather', '150x200', '450'),
('Sofa', 'Brown', 'Low', 'Synthetic Leather', '150x200', '300'),
('Bookshelf', 'Black', 'High', 'Wood', '30x150', '180'),
('Bookshelf', 'White', 'Medium', 'Metal', '30x150', '120'),
('Bookshelf', 'Blue', 'Low', 'Plastic', '30x150', '80'),
('Coffee Table', 'Teal', 'High', 'Wood', '70x120', '150'),
('Coffee Table', 'Orange', 'Medium', 'Glass', '70x120', '110'),
('Coffee Table', 'Pink', 'Low', 'Metal', '70x120', '80'),
('Desk', 'Silver', 'High', 'Wood', '60x120', '300'),
('Desk', 'Turquoise', 'Medium', 'Metal', '60x120', '220'),
('Desk', 'Lime', 'Low', 'Plastic', '60x120', '150'),
('Bookcase', 'Brown', 'Medium', 'Wood', '40x180', '200'),
('Bookcase', 'White', 'High', 'Wood', '45x190', '290'),
('Bookcase', 'pPurple', 'Low', 'Wood', '35x175', '110'),
('Dresser', 'White', 'High', 'MDF', '80x120', '300'),
('Dresser', 'Pink', 'Low', 'MDF', '80x120', '260'),
('Dresser', 'oGld', 'Medium', 'MDF', '80x120', '280'),
('Sideboard', 'Black', 'Low', 'Glass', '50x150', '180'),
('Sideboard', 'White', 'High', 'Glass', '50x150', '280'),
('Sideboard', 'Black', 'Medium', 'Glass', '50x150', '240'),
('Bookcase', 'Brown', 'Medium', 'Wood', '40x180', '200'),
('Bookcase', 'White', 'High', 'Wood', '40x180', '400'),
('Bookcase', 'Black', 'Low', 'Wood', '40x180', '150'),
('Dresser', 'White', 'High', 'MDF', '80x120', '300'),
('Sideboard', 'Black', 'Low', 'Glass', '50x150', '180'),
('Folding Chair', 'Blue', 'Medium', 'Metal', '30x40', '50'),
('Lounge Chair', 'Gray', 'High', 'Leather', '80x90', '250'),
('Nightstand', 'Purple', 'Low', 'Particle Board', '30x40', '80'),
('Corner Desk', 'Green', 'High', 'Bamboo', '60x120', '150'),
('Console Table', 'Red', 'Medium', 'Marble', '30x100', '220'),
('Rocking Chair', 'Teal', 'High', 'Wood', '50x80', '180'),
('Writing Desk', 'Yellow', 'Medium', 'Steel', '40x80', '120'),
('Filing Cabinet', 'Orange', 'Low', 'Metal', '40x60', '100'),
('Bean Bag Chair', 'Pink', 'Low', 'Fabric', '60x80', '80'),
('Standing Desk', 'Silver', 'High', 'Glass', '70x120', '300'),
('Bar Stool', 'Cyan', 'Medium', 'Leather', '30x30', '80'),
('Chest of Drawers', 'Beige', 'High', 'Wood', '60x90', '180'),
('Bunk Bed', 'Turquoise', 'High', 'Metal', '90x200', '400'),
('Accent Chair', 'Lime', 'Medium', 'Velvet', '50x60', '150'),
('Buffet', 'Navy', 'Low', 'Bamboo', '40x120', '120'),
('Gaming Chair', 'Gold', 'High', 'Synthetic Leather', '70x80', '250'),
('Drafting Table', 'Magenta', 'Medium', 'Steel', '60x90', '180')";

if(mysqli_query($link, $sql)){
 echo "Records added successfully.";
} else{
 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if(mysqli_query($link, $sql)){
 echo "Records added successfully.";
} else{
 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>