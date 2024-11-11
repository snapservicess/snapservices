<?php
// Start session to manage login sessions if needed
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Default password for XAMPP
$dbname = "snapservices";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to find the user
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if a user with the entered email exists
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $user['password'])) {
        // Password is correct
        echo "Login successful! Welcome, " . htmlspecialchars($user['name']) . "!";
        // You can set session variables here, e.g., $_SESSION['user_id'] = $user['id'];
    } else {
        // Password is incorrect
        echo "Invalid password. Please try again.";
    }
} else {
    // No user found with that email
    echo "No account found with that email.";
}

// Close connection
$stmt->close();
$conn->close();
?>
