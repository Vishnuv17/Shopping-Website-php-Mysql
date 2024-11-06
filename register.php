<?php
include 'config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $password = $_POST['password'];

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM users WHERE name = ? OR email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p style='color: red;'>Username or email already registered. Please try logging in.</p>";
    } else {
        // Register new user
        $insertQuery = "INSERT INTO users (name, email, password, phone, address, pincode) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);

        // Check if prepare statement failed
        if (!$stmt) {
            echo "<p style='color: red;'>Error in prepare statement: " . $conn->error . "</p>";
            exit;
        }

        $stmt->bind_param("ssssss", $name, $email, $password, $phone, $address, $pincode);
        
        // Execute statement and check for errors
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Registration successful!</p>";
        } else {
            echo "<p style='color: red;'>Error during registration: " . $stmt->error . "</p>";
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(53, 59, 72);
            text-align: center;
            padding: 50px;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 5px;
            width: 350px;
            margin: 0 auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            width: 95%;
            padding: 10px;
            background-color: #4CAF50; /* Default for Register button */
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #45a049; /* Hover effect for Register button */
        }
        .login-button {
            background-color: #FF5733; /* Red color for Login button */
        }
        .login-button:hover {
            background-color: #C70039; /* Darker red for hover effect */
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="register.php">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="text" name="pincode" placeholder="Pincode" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <form action="login.php">
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>

</body>
</html>

