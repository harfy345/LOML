<?php

require_once("../DB/databaseRequests.php");
  if (isset($_POST['name']))
    $name = $_POST['name'];
  if (isset($_POST['email']))
    $email = $_POST['email'];
  if (isset($_POST['message']))
    $message = $_POST['message'];
  if (isset($_POST['subject']))
    $subject = $_POST['subject'];
  if ($name === '') {
    echo "Name cannot be empty.";
    die();
  }
  if ($email === '') {
    echo "Email cannot be empty.";
    die();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Email format invalid.";
      die();
    }
  }
  if ($subject === '') {
    echo "Subject cannot be empty.";
    die();
  }
  if ($message === '') {
    echo "Message cannot be empty.";
    die();
  }

 


require '../../mail/vendor/autoload.php'; 
require_once("../../mail/config.php");

$mailer = new \SendGrid\Mail\Mail(); 
$mailer->setFrom("201911524@collegeahuntsic.qc.ca", "Example User");
$mailer->setSubject($subject ? $subject : "unknown");
$mailer->addTo("hakam.almotlk345@gmail.com", "Example User");
$mailer->addContent(
    "text/html",
    "<a href='mailto:$email'>$email</a><br/><strong>$message</strong>"
);

$sendgrid = new \SendGrid(sendgrid_api);
try {
    $response = $sendgrid->send($mailer);
    printf("Response status: %d\n\n", $response->statusCode());

    $headers = array_filter($response->headers());
    echo "Response Headers\n\n";
    foreach ($headers as $header) {
        echo '- ' . $header . "\n";
    }
    $msg = "l'email a été envoyé.";
  echo $msg;
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>