<?php
session_start();
require 'vendor/autoload.php'; // Include the Twilio SDK
use Twilio\Rest\Client;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(_DIR_);
$dotenv->load();

// Retrieve credentials from .env
$sid = $_ENV['TWILIO_SID'];
$token = $_ENV['TWILIO_TOKEN'];
$twilio_number = $_ENV['TWILIO_NUMBER'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $phone = $_POST["phone"];
    $otp = rand(100000, 999999); // Generate a 6-digit OTP

    // Save the OTP in the session
    $_SESSION['otp'] = $otp;

    // Send OTP via SMS
    $client = new Client($sid, $token);
    $message = $client->messages->create(
        $phone,
        [
            'from' => $twilio_number,
            'body' => "Your OTP is: $otp"
        ]
    );

    echo "OTP sent successfully.";
}
?>