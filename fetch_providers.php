<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "snapservices";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$serviceType = $_POST['service_type'];

// Query to fetch providers
$query = "SELECT * FROM service_providers WHERE service_type = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $serviceType);
$stmt->execute();
$result = $stmt->get_result();

$output = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= '
            <div class="provider-card">
                <h3>' . htmlspecialchars($row['name']) . '</h3>
                <p>Phone: ' . htmlspecialchars($row['phone']) . '</p>
                <p>Email: ' . htmlspecialchars($row['email']) . '</p>
                <p>Experience: ' . htmlspecialchars($row['experience']) . ' years</p>
                <button onclick="bookProvider(' . $row['id'] . ')">Book</button>
            </div>
        ';
    }
} else {
    $output = '<p>No providers available for this service.</p>';
}

echo $output;

$stmt->close();
$conn->close();
?>
