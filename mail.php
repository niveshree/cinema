<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $location = $_POST['location'];

    // Email information
    $to = "contact@cinemafactory.co.in";
    $subject = "Cinematography";
    $message = "Name: " . $name . "\n";
    $message .= "Phone Number: " . $phone . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Location: " . $location . "\n";

    // Send email using external SMTP server
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong, please try again later.";
    }
}
?>
