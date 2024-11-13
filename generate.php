<?php
session_start();
require 'vendor/autoload.php'; // Include the Twilio SDK if using Twilio
use Twilio\Rest\Client;

$sid = 'your_account_sid';
$token = 'your_auth_token';
$twilio_number = 'your_twilio_number';

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