<?php
declare(strict_types=1);

require_once("./../apis/membre.php");
$email = $_POST['courrielc'];
$membreapi = new MembreAPI();
$membreapi->connect();
$idUser = $membreapi->getRecoveryMail($email);
$membreapi->disconnect();

if($idUser) {
// Displaying the original string
 echo "Original String: " . $idUser. "<br/>";

// Storingthe cipher method
$ciphering = "AES-128-CTR";

// Using OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Storing the encryption key
$encryption_key = "W3docs";

// Using openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($idUser, $ciphering, $encryption_key, $options, $encryption_iv);

// Displaying the encrypted string
echo "Encrypted String: " . $encryption . "<br/>";
echo "<a href='../../passwordRecovery.php?id=$encryption'>click</a>"; 

}

// $headers =  'MIME-Version: 1.0' . "\r\n"; 
// $headers .= 'From: Your name <info@address.com>' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
// $headers = "From: localhost" . "\r\n" .
// "CC: hakam.almotlk345@gmail.com";
// mail('hakam.almotlk345@gmail.com', 'My Subject', $encryption , $headers);


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
    $email,
    'Example Sender'
);
// le html que vous voulez envoyer
$email->addContent(
    'text/html',
    `<strong>localhost:80/passwordRecovery.php?id=$encryption.</strong>`
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