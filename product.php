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

// Get the product ID from the URL
$product_id = $_GET['id'];

// Fetch the specific product details from the database
$sql = "SELECT id, name, price, image1, image2, image3, image4, image5, image6 FROM products WHERE id = $product_id";
$result = $conn->query($sql);

// Check if the product exists
if ($result->num_rows > 0) {
    // Fetch the product data
    $product = $result->fetch_assoc();
} else {
    echo "Product not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Product Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(53, 59, 72);
            padding: 20px;
            color: white;
        }
        .product { text-align: center; }
        img { max-width: 100%; height: auto; }
        button {
            padding: 10px 20px;
            background-color: #4CAF50; 
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 20px auto; 
        }
        .product {
            max-width: 800px;
            margin: 0 auto;
            background-color: #2d3436;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .product img {
            width: 45%;
            margin: 10px;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }
        .product img:hover {
            transform: scale(1.05);
        }
        .product p {
            font-size: 18px;
            margin-top: 15px;
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
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        .product p {
            font-size: 30px;
            color: #d1d8e0; 
            text-align: center; 
        }
    </style>
</head>
<body>
    <h1><?php echo $product['name']; ?></h1>
    <div class="product">
        <img src="images/<?php echo $product['image1']; ?>" alt="<?php echo $product['name']; ?>">
        <img src="images/<?php echo $product['image2']; ?>" alt="<?php echo $product['name']; ?>">
        <img src="images/<?php echo $product['image3']; ?>" alt="<?php echo $product['name']; ?>">
        <img src="images/<?php echo $product['image4']; ?>" alt="<?php echo $product['name']; ?>">
        <img src="images/<?php echo $product['image5']; ?>" alt="<?php echo $product['name']; ?>">
        <img src="images/<?php echo $product['image6']; ?>" alt="<?php echo $product['name']; ?>">
        <p>Price: <?php echo $product['price']; ?></p>
        <a href="index.php"><button>Back</button></a>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
