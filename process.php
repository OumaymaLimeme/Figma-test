<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);
   $mail = new PHPMailer(true);
       // $mail->SMTPDebug = PHPMailer::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'oumayma2000limeme@gmail.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        $mail->setFrom('oumayma2000limeme@gmail.com', 'Oumayma');
        $mail->addAddress('recipient@example.com', 'Recipient Name');
        
        $mail->isHTML(true);
        $mail->Subject = 'Test Email';
        $mail->Body = '<h1>Hello World</h1><p>This is a test email sent from PHPMailer</p>';
        $mail->AltBody = 'This is the plain text version of the email content';
        
        try {
            $mail->send();
            echo 'Message has been sent successfully';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

}
?>
