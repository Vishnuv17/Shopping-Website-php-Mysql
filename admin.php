<?php
session_start();
require 'config.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}


// Fetch all tables in the database
$tables = [];
$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_array()) {
        $tables[] = $row[0];
    }
}

// Categorize tables based on names
$userTables = [];
$productTables = [];
$otherTables = [];
$tableData = [];

foreach ($tables as $table) {
    if (strpos($table, 'users') !== false) {
        $userTables[] = $table;
    } elseif (strpos($table, 'products') !== false) {
        $productTables[] = $table;
    } else {
        $otherTables[] = $table;
    }
}

// Fetch data for each table
foreach ($tables as $table) {
    $sqlData = "SELECT * FROM `$table`";
    $dataResult = $conn->query($sqlData);
    
    if ($dataResult) {
        $tableData[$table] = $dataResult->fetch_all(MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(53, 59, 72);
            color: white;
            padding: 20px;
        }
        h1, h2 {
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
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            max-width: 600px;
            margin: 0 auto;
        }
        li {
            margin-bottom: 15px;
        }
        .table-link {
            display: block;
            text-decoration: none;
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-size: 25px;
        }
        .table-link:hover {
            background-color: #3b4f63;
            transform: scale(1.03);
        }
        .admin:hover{
            transform: scale(1.10);
        }
        .back-btn {
            display: block;
            width: 200px;
            
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

<h1 class="admin">Admin Page</h1>
<a href="index.php" class="back-btn">Back to Home</a>

<!-- User Tables Section -->
<h2>User Login History</h2>
<?php foreach ($userTables as $table): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Created At</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Pincode</th>
        </tr>
        <?php foreach ($tableData[$table] as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['pincode']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endforeach; ?>
<br>
<!-- Other Tables Section -->
<h2>User Shopping History</h2>
<ul>
    <?php foreach ($otherTables as $table): ?>
        <li><a href="view_table.php?table=<?php echo $table; ?>" class="table-link"><?php echo $table; ?></a></li>
    <?php endforeach; ?>
</ul>
<br>
<!-- Product Tables Section -->
<h2>Products</h2>
<?php foreach ($productTables as $table): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Image 3</th>
            <th>Image 4</th>
            <th>Image 5</th>
            <th>Image 6</th>
        </tr>
        <?php foreach ($tableData[$table] as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><img src="images/<?php echo $row['image1']; ?>" alt="Image 1"></td>
                <td><img src="images/<?php echo $row['image2']; ?>" alt="Image 2"></td>
                <td><img src="images/<?php echo $row['image3']; ?>" alt="Image 3"></td>
                <td><img src="images/<?php echo $row['image4']; ?>" alt="Image 4"></td>
                <td><img src="images/<?php echo $row['image5']; ?>" alt="Image 5"></td>
                <td><img src="images/<?php echo $row['image6']; ?>" alt="Image 6"></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endforeach; ?>

</body>
</html>

<?php
$conn->close();
?>
