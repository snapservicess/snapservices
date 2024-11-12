<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database_name";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$providerId = $_POST['provider_id'];
$userId = $_SESSION['user_id']; // Assuming user is logged in and user_id is stored in session

// Get service type from provider's info
$query = "SELECT service_type FROM service_providers WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $providerId);
$stmt->execute();
$stmt->bind_result($serviceType);
$stmt->fetch();
$stmt->close();

// Insert booking
$query = "INSERT INTO bookings (user_id, provider_id, service_type, booking_date, status) VALUES (?, ?, ?, NOW(), 'Pending')";
$stmt = $conn->prepare($query);
$stmt->bind_param("iis", $userId, $providerId, $serviceType);

if ($stmt->execute()) {
    echo "Booking successful!";
} else {
    echo "Error booking service.";
}

$stmt->close();
$conn->close();
?>
