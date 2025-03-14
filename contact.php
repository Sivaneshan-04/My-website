<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form fields
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $subject = $_POST['contactSubject'];
    $message = $_POST['contactMessage'];

    // Email settings
    $to = "sivaneshankg12@gmail.com"; // Replace with your email address
    $from = $email;
    $headers = "From: $from" . "\r\n" . "Reply-To: $from" . "\r\n" . "Content-Type: text/html; charset=UTF-8";

    // Email content
    $email_subject = "New Message from: $name";
    $email_body = "<html><body>";
    $email_body .= "<h2>Contact Form Submission</h2>";
    $email_body .= "<p><strong>Name:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    $email_body .= "<p><strong>Subject:</strong> $subject</p>";
    $email_body .= "<p><strong>Message:</strong></p>";
    $email_body .= "<p>$message</p>";
    $email_body .= "</body></html>";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<div id='message-success' style='display:block;'>Your message was sent, thank you!</div>";
    } else {
        echo "<div id='message-warning' style='display:block;'>Error sending message</div>";
    }
}
?>
