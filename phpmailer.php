<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//initialize phpmailer location
require './PHPMailer/PHPMailer/src/PHPMailer.php';
require './PHPMailer/PHPMailer/src/SMTP.php';
require './PHPMailer/PHPMailer/src/Exception.php';

//phpmailer condition
if (isset($_POST['btnSubmit'])) { //which button work as submit button, initialize button name
  $email = $_POST['email']; //initialize variable with input name in html
  $feedback = $_POST['feedback']; //initialize variable with input name in html

  $mail = new PHPMailer(true); //define  mail

  try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = '	smtp.gmail.com';//dont change anything here
    $mail->SMTPAuth = true;
    $mail->Username = '';//insert sender email (real email!!)
    $mail->Password = '';//insert sender password (real email!!)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; //dont change port
    $mail->setFrom('', 'Your Name');//you can use dummy email here

    // Recipient
    $mail->addAddress($email, 'Recipient Name');//receiver

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';//email title
    $mail->Body = "Email: $email\nFeedback: $feedback";//email content

    // Send the email
    $mail->send();
    //echo below will give an alert to show that the email has been send
    echo "<script> 
      alert('Sent Successfully')
      document.location.href = 'index.html';
    </script>";
  } catch (Exception $e) {
    //will display error
    echo "Error sending email: {$mail->ErrorInfo}";
  }
}
