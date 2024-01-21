<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../M/vendor/phpmailer/phpmailer/src/Exception.php';
require '../M/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../M/vendor/phpmailer/phpmailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Adresse e-mail invalide.");
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings for Outlook with STARTTLS
        $mail->isSMTP();
        $mail->Host       = 'smtp.office365.com';
        $mail->SMTPAuth   = true;
        // Load email configuration from external file
        $config = include('../../../config/config.php');
        $mail->Username = $config['email']['username'];
        $mail->Password = $config['email']['password'];
        $mail->Port       = 587;
        $mail->SMTPSecure = 'tls';  // Use STARTTLS
    

        
// $mail->SMTPDebug = 2;

        // Recipients
        $mail->setFrom($email);  // Set the sender's email address
        $mail->addAddress('selim.coulombel@live.fr');  // Recipient's email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "Votre message a été envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message. Mailer Error: {$mail->ErrorInfo}";
    }
}