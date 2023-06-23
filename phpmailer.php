<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/PHPMailer/src/PHPMailer.php';
require './PHPMailer/PHPMailer/src/SMTP.php';
require './PHPMailer/PHPMailer/src/Exception.php';

if (isset($_POST['btnSubmit'])) {
  $email = $_POST['email'];
  $feedback = $_POST['feedback'];

  $mail = new PHPMailer(true);

  try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = '	smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom('', 'Your Name');

    // Recipient
    $mail->addAddress($email, 'Recipient Name');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = "Email: $email\nFeedback: $feedback";

    // Send the email
    $mail->send();
    echo "<script> 
      alert('Sent Successfully')
      document.location.href = 'index.html';
    </script>";
  } catch (Exception $e) {
    echo "Error sending email: {$mail->ErrorInfo}";
  }
}
