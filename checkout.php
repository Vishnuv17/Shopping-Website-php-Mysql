<?php
session_start();
require 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['username']; // Assuming this holds the table name for the user

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_products = $_POST['products']; 
    $quantities = $_POST['quantity']; 

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shopping"; // Update with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the table for this user exists, if not create it
    $createTableQuery = "CREATE TABLE IF NOT EXISTS `$name` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Product_name VARCHAR(255),
        Price DECIMAL(10,2),
        Quantity INT,
        Total DECIMAL(10,2),
        Image_Path VARCHAR(255),
        Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if (!$conn->query($createTableQuery)) {
        die("Error creating table: " . $conn->error);
    }

    $cart = [];
    $total = 0;

    // Retrieve product details for selected products
    foreach ($selected_products as $product_id) {
        $sql = "SELECT id, name, price, image1 FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param('i', $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (isset($quantities[$product_id]) && $quantities[$product_id] > 0) {
                $cart[] = [
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "image" => $row['image1'],
                    "quantity" => $quantities[$product_id],
                    "price" => $row['price']
                ];
                $total += $quantities[$product_id] * $row['price'];
            }
        }

        $stmt->close();
    }

    // Insert cart details into the user's table (upon loading the checkout page)
    foreach ($cart as $item) {
        $sql = "INSERT INTO `$name` (Product_name, Price, Quantity, Total, Image_Path, Date) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error preparing insert statement: " . $conn->error);
        }
        $total_price = $item['quantity'] * $item['price'];
        $stmt->bind_param('sdiis', $item['name'], $item['price'], $item['quantity'], $total_price, $item['image']);

        if (!$stmt->execute()) {
            die("Error executing insert statement: " . $stmt->error);
        }
    }

    $conn->close();
} else {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(53, 59, 72);
            color: white;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: center; 
            border: 1px solid #ccc;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        td {
            background-color: rgba(255, 255, 255, 0.2); 
        }
        img {
            width: 50px; 
            height: auto;
            border-radius: 5px;
        }
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
        button:hover {
            background-color: #45a049;
        }
        .total-row {
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.3);
        }
        .payment-method {
            text-align: center;
            font-size: 20px;
            margin-top: 20px;
            color: #FFD700;
        }
    </style>
</head>
<body>
    <h1>Checkout</h1>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cart as $item) {
                $item_total = $item['quantity'] * $item['price'];
                echo '<tr>';
                echo '<td><img src="images/' . $item['image'] . '" alt="' . $item['name'] . '"> ' . $item['name'] . '</td>';
                echo '<td>' . $item['quantity'] . '</td>';
                echo '<td>' . number_format($item['price'], 2) . '</td>';
                echo '<td>' . number_format($item_total, 2) . '</td>';
                echo '</tr>';
            }
            ?>
            <tr class="total-row">
                <td colspan="3">Total</td>
                <td>$<?php echo number_format($total, 2); ?></td>
            </tr>
        </tbody>
    </table>
    <div class="payment-method">
        <p>Thanks for Purchasing!</p>
        <p>Payment Method: Cash on Delivery</p>
        <p>Your order has been successfully placed</p>
    </div>

    <form method="POST" action="index.php">
        <button type="submit">Back to Home</button>
    </form>
</body>
</html>
