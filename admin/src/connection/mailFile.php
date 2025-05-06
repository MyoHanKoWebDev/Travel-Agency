<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Database connection
include 'dbcon.php';// Function to send an email
function sendEmail($toEmail, $customerName, $packageTitle, $status) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'myohankomdy@gmail.com'; // Replace with your email
        $mail->Password = 'ehfa iemz uaux gpnx'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email content
        $mail->setFrom('myohankomdy@gmail.com', 'Tourist Booking');
        $mail->addAddress($toEmail);
        $mail->isHTML(true);
        $mail->Subject = "Booking $status Notification";

        if ($status == "Confirmed") {
            $mail->Body = "<h2>Dear $customerName,</h2>
                           <p>Your booking for <b>$packageTitle</b> has been <b style='color:green;'>Confirmed</b>. We look forward to providing you with an amazing travel experience.</p>
                           <p>For more details, visit your account.</p>
                           <p>Best Regards, <br> Tourist Team</p>";
        } else {
            $mail->Body = "<h2>Dear $customerName,</h2>
                           <p>We regret to inform you that your booking for <b>$packageTitle</b> has been <b style='color:red;'>Rejected</b>. Please contact our support team for further assistance.</p>
                           <p>We hope to serve you in the future.</p>
                           <p>Best Regards, <br> Tourist Team</p>";
        }

        // Send email
        $mail->send();
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>