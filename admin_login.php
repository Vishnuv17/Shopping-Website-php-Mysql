<?php
session_start();

// Define the correct credentials
$correct_username = 'loozer';
$correct_password = '21515139'; // Use your actual password here

// Initialize error message
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password
    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['admin_logged_in'] = true; // Set session variable
        header("Location: admin.php"); // Redirect to admin page
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(53, 59, 72);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #2c3e50;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            width: 300px; /* Set a fixed width for the form */
            text-align: center; /* Center the text in the form */
        }
        input {
            display: block;
            width: 90%; /* Set the width to 90% of the form */
            margin: 10px auto; /* Center the input fields */
            padding: 10px;
            border: none;
            border-radius: 4px;
        }
        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 95%; /* Set the button width */
        }
        button:hover {
            background-color: #c0392b;
        }
        .error {
            color: #ff6b6b;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<form method="post" action="">
    <h2>Admin Login</h2>
    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

</body>
</html>
