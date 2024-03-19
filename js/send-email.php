<?php

// Access form data from JSON payload
$data = json_decode(file_get_contents('php://input'));

$name = $data->name;
$email = $data->email;
$subject = $data->subject;
$body = $data->body;

// **IMPORTANT: Replace with your actual email address**
$recipientEmail = 'akhiranandha624@gmail.com';

// Use a secure email sending library (highly recommended)
// For example, using PHPMailer:

require 'vendor/autoload.php';

$mail = new PHPMailer(true); // Set to true to enable exceptions

try {
    // Server settings (configure based on your email provider)
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // For debugging (optional)
    $mail->isSMTP();
    $mail->Host = 'your_smtp_host'; // Replace with your SMTP server address
    $mail->Port = 587; // Replace with your SMTP port (may vary)
    $mail->SMTPAuth = true;
    $mail->Username = 'akhiranandha624@gmail.com'; // Replace with your SMTP username
    $mail->Password = 'why624forgetpassword'; // Replace with your SMTP password (securely store)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Optional, set encryption

    // Sender details
    $mail->setFrom($email, $name); // Sender name and email

    // Recipient
    $mail->addAddress($recipientEmail); // Replace
} catch (Exception $e) {
    echo "An error occurred: {$e->getMessage()}";
}
