<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';



if(isset($_POST['name']) && $_POST['name'] != ''){
	$name= $_POST['name'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$location= $_POST['location'];
	$to = "contact@cinemafactory.co.in";
    $subject = "Cinematography";
    $message = "Name: " . $name . "\n\n ";
    $message .= "Phone Number: " . $phone . "\n\n";
    $message .= "Email: " . $email . "\n\n";
    $message .= "Location: " . $location . "\n\n";

	}else{
		$status=false;
		$msg="Invalid Details";
	}
	
    // Create a new PHPMailer instance
    $mail = new PHPMailer();
	$from="mohamedazar201199@gmail.com";

    // Set email content type to HTML
    $mail->isHTML(true);

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'safica1822@gmail.com'; // Your Gmail address
    $mail->Password = 'elvy lnrw eeon gthc'; // Your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Loop through each email address and add them as recipients
    $toEmails = ""; // Variable to store recipient emails for CC
    // foreach ($candidate_emails_array as $email) {
    //     // Email content
        $mail->setFrom($from, 'vishnuadds');
        $mail->addAddress(trim($to));
        $toEmails .= $to; // Collecting recipient emails for CC
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = 'Please enable HTML to view this email.';
        
        // Send email
        if ($mail->send()) {
            $alert_message = "Email sent successfully.";
        } else {
            $alert_message = "Failed to send email to $email. Error: " . $mail->ErrorInfo;
        }

    
    // Send CC email
    if (!$mail->send()) {
        echo "Failed to send CC email to $cc. Error: " . $mail->ErrorInfo;
    }
// }
?>