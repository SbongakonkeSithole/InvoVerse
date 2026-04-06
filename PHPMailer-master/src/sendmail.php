<?php



require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP settings (Afrihost / your email)
        $mail->isSMTP();
        $mail->Host = 'mail.fundanathiupgrading.co.za';
        $mail->SMTPAuth = true;
        $mail->Username = 'support@fundanathiupgrading.co.za';
        $mail->Password = 'Sbongakonke02@';
        $mail->SMTPSecure = false;
        $mail->Port = 25;

        // Sender & Receiver
        $mail->setFrom('support@fundanathiupgrading.co.za', 'InvoVerse Holdings Website');
        $mail->addAddress('sbongakonkesihle31@gmail.com');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Message";

        $mail->Body = "
            <h3>New Message from Website</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();

        echo "<script>alert('Message sent successfully'); window.location.href='contact.html';</script>";

    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}