<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product details from the database
$sql = "SELECT id, name, price, image1 FROM products"; // Update this with your table and column names
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(53, 59, 72);
            padding: 20px;
            color: white;
        }
        .menu {
            background-color: #2c3e50;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .menu a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .menu a:hover {
            background-color: #1abc9c;
            color: white;
        }
        .menu a.active {
            background-color: #16a085;
            color: white;
        }
        .menu .account{
            float: right;
            background-color: #16a085;
        }
        h1 {
            text-align: center;
        }
        h1:hover{
            transform: scale(1.10);
        }
        .product-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; 
            justify-content: center; 
            align-items: center; 
        }
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            height: 400px; 
            width: 250px; 
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.1); 
            border-radius: 8px; 
            margin: 10px; 
        }
        img {
            width: 150px;
            height: 170px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
        }
        h2 {
            font-size: 1.2rem;
            margin: 10px 0;
        }
        .product input[type="checkbox"],
        .product input[type="number"] {
            margin-top: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 20px auto; 
        }
        button:hover {
            background-color: #45a049; 
        }
        marquee img {
            margin: 0 15px;
            height: 150px;
        }
        .buy {
            position: fixed;
            bottom: 20px;
            left: 45.5%; 
            font-size: 18px;
            padding: 10px 25px;
        }
        .buy:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        // Function to toggle checkbox selection based on image click
        function toggleCheckbox(productId) {
            var checkbox = document.getElementById('checkbox-' + productId);
            var quantityInput = document.getElementById('quantity-' + productId);

            checkbox.checked = !checkbox.checked;

            if (checkbox.checked) {
                quantityInput.value = 1;
            } else {
                quantityInput.value = 0;
            }
        }

        // Function to validate if at least one product is selected
        function validateSelection() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    return true;  // Proceed with form submission
                }
            }
            alert("Please select at least one product.");
            return false;  // Prevent form submission
        }

        function confirmPurchase() {
        if (validateSelection()) {
            return confirm("Are you sure you want to proceed with the purchase?");
        } else {
            return false; // Prevent form submission if no products are selected
        }
    }
    </script>
</head>
<body>
<div class="menu">
    <a href="index.php" class="active">Home</a>
    <a href="admin_login.php">Admin</a>
    <a href="mens.php">Men</a>
    <a href="women.php">Women</a>
    <a href="account.php" class="account">Account</a>
</div>

<h1 style="font-family: Snap ITC, sans-serif;color:#1abc9c" >Hello Everyone, Welocome to Vishnu's Outfit World</h1>

<marquee behavior="scroll" direction="left" scrollamount="10">
    <img src="images/anim1.jpg" alt="Image 1">
    <img src="images/anim2.jpg" alt="Image 2">
    <img src="images/anim3.jpg" alt="Image 3">
    <img src="images/anim4.jpg" alt="Image 4">
    <img src="images/anim5.jpg" alt="Image 5">
</marquee><br>

<form action="checkout.php" method="post" onsubmit="return confirmPurchase()">
    <div class="product-row">
        <?php
        // Check if products exist in the result set
        if ($result->num_rows > 0) {
            // Output each product row
            while($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<img src="images/' . $row['image1'] . '" alt="' . $row['name'] . '" onclick="toggleCheckbox(' . $row['id'] . ')">';
                echo '<h2>' . $row['name'] . '</h2>';
                echo '<p>Price: ' . $row['price'] . '</p>';
                echo '<input type="checkbox" id="checkbox-' . $row['id'] . '" name="products[]" value="' . $row['id'] . '"> Select this item';
                echo '<br><input type="number" id="quantity-' . $row['id'] . '" name="quantity[' . $row['id'] . ']" min="0" value="0" style="width: 50px;"> Quantity';
                echo '<br><a href="product.php?id=' . $row['id'] . '"><button type="button">View Details</button></a>';
                echo '</div>';
            }
        } else {
            echo '<p>No products available.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
    <button type="submit" class="buy">Buy Now</button>
</form>

</body>
</html>




