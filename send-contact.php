<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If installed via Composer

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = new PHPMailer(true);
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // For Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'muzainalisiddiqui@gmail.com'; // Your email
        $mail->Password = 'umfg nnip rnxm fhgb'; // Gmail app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender & recipient
        $mail->setFrom('muzainalisiddiqui@gmail.com', 'Seahawk Law Website');
        $mail->addAddress('muzainalisiddiqui@gmail.com'); // Where you want to receive messages

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "
            Name: {$_POST['name']}<br>
            Phone: {$_POST['phone']}<br>
            Email: {$_POST['email']}<br>
            Court Date: {$_POST['court-date']}<br>
            Message: {$_POST['message']}
        ";

        $mail->send();
        echo "Message sent!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>