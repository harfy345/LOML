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
    'hakam.almotlk345@gmail.com',
    'Example Sender'
);
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
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>






<?php
// require 'vendor/autoload.php'; // If you're using Composer (recommended)
// // Comment out the above line if not using Composer
// // require("<PATH TO>/sendgrid-php.php");
// // If not using Composer, uncomment the above line and
// // download sendgrid-php.zip from the latest release here,
// // replacing <PATH TO> with the path to the sendgrid-php.php file,
// // which is included in the download:
// // https://github.com/sendgrid/sendgrid-php/releases

// $email = new \SendGrid\Mail\Mail(); 
// $email->setFrom("test@example.com", "Example User");
// $email->setSubject("Sending with SendGrid is Fun");
// $email->addTo("test@example.com", "Example User");
// $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
// $email->addContent(
//     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
// );
// $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
// try {
//     $response = $sendgrid->send($email);
//     print $response->statusCode() . "\n";
//     print_r($response->headers());
//     print $response->body() . "\n";
// } catch (Exception $e) {
//     echo 'Caught exception: '. $e->getMessage() ."\n";
// }
?>