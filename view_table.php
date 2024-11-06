<?php
session_start();
require 'config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
// Get the table name from the URL
$table = $_GET['table'];

// Fetch data from the specified table
$sql = "SELECT * FROM `$table`";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table: <?php echo htmlspecialchars($table); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(53, 59, 72);
            color: white;
            padding: 20px;
        }
        h1 {
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
            width: 50px;
            height: auto;
            border-radius: 5px;
        }
        .back-button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h1>Details for Table: <?php echo htmlspecialchars($table); ?></h1>

<!-- Back Button -->
<a href="admin.php" class="back-button">Back to Admin Page</a>

<table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Image</th>
        <th>Date</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['Product_name']); ?></td>
            <td><?php echo htmlspecialchars($row['Price']); ?></td>
            <td><?php echo htmlspecialchars($row['Quantity']); ?></td>
            <td><?php echo htmlspecialchars($row['Total']); ?></td>
            <td><img src="images/<?php echo htmlspecialchars($row['Image_Path']); ?>" alt="Image"></td>
            <td><?php echo htmlspecialchars($row['Date']); ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
