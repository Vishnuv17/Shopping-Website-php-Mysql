<?php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$userName = $_SESSION['username'];

// Fetch user details
$sqlUser = "SELECT * FROM users WHERE name = ?";
$stmtUser = $conn->prepare($sqlUser);
$stmtUser->bind_param("s", $userName);
$stmtUser->execute();
$userResult = $stmtUser->get_result();
$user = $userResult->fetch_assoc();

// Fetch shopping details (assuming an orders table)
$sqlOrders = "SELECT * FROM `$userName`"; // Use backticks for table name
$ordersResult = $conn->query($sqlOrders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(53, 59, 72);
            color: white;
            padding: 20px;
        }
        .account-info, .order-history {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        img {
            width: 50px; /* Set width of the images */
            height: auto; /* Keep the aspect ratio */
            border-radius: 5px; /* Optional: for rounded corners */
        }
        .logout-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #FF5733;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .logout-btn:hover {
            background-color: #C70039;
        }
        .back-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .back-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="account-info">
    <h2>User Details</h2>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
    <p><strong>Pincode:</strong> <?php echo htmlspecialchars($user['pincode']); ?></p>
</div>

<div class="order-history">
    <h2>Shopping History</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Image</th>
        </tr>
        <?php if ($ordersResult->num_rows > 0): ?>
            <?php while ($order = $ordersResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['id']); ?></td>
                    <td><?php echo htmlspecialchars($order['Product_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['Quantity']); ?></td>
                    <td><?php echo htmlspecialchars($order['Price']); ?></td>
                    <td><?php echo htmlspecialchars($order['Date']); ?></td>
                    <td>
                        <?php if (!empty($order['Image_Path'])): ?>
                            <img src="images/<?php echo htmlspecialchars($order['Image_Path']); ?>" alt="Product Image">
                        <?php else: ?>
                            No Image Available
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No orders found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<a href="index.php" class="back-btn">Back to Home</a>
<!-- Logout Button -->
<a href="logout.php" class="logout-btn">Logout</a>


</body>
</html>

<?php
$conn->close();
?>
