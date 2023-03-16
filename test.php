<?php

declare(strict_types=1);

require 'mail/vendor/autoload.php'; 
require_once("mail/config.php");

use \SendGrid\Mail\Mail;

$email = new Mail();
// Replace the email address and name with your verified sender
$email->setFrom(
    '201911524@collegeahuntsic.qc.ca',
    'Example Recipient'
);
$email->setSubject('Sending with Twilio SendGrid is Fun');
// Replace the email address and name with your recipient
$email->addTo(
    // remplacer le email du client
    'hakam.almotlk345@gmail.com',
    'Example Sender'
);
// le html que vous voulez envoyer
$email->addContent(
    'text/html',
    '<strong>and fast with the PHP helper library.</strong>'
);

$sendgrid = new \SendGrid(sendgrid_api);
try {
    $response = $sendgrid->send($email);
    printf("Response status: %d\n\n", $response->statusCode());

    $headers = array_filter($response->headers());
    echo "Response Headers\n\n";
    foreach ($headers as $header) {
        echo '- ' . $header . "\n";
    }

    // rediriger vers la bonne page 
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
        // affichier un message d'erreur
}
?>