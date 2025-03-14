<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $subject = $_POST['contactSubject'];
    $message = $_POST['contactMessage'];

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        echo 'Please fill all the required fields.';
        exit;
    }

    // Email parameters
    $to = "your-email@example.com";  // Replace with your email address
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // Headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo 'success';  // This will be checked by the JavaScript
    } else {
        echo 'Error sending message. Please try again.';
    }
}
?>
