<?php

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

}else{
    echo "Ce courriel n'existe pas. Vous devez créer un compte pour se connecter.";

    echo "<a href='../../sinscrire.php'>s'inscrire</a>";
    exit;
    
}

// $headers =  'MIME-Version: 1.0' . "\r\n"; 
// $headers .= 'From: Your name <info@address.com>' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
// $headers = "From: localhost" . "\r\n" .
// "CC: hakam.almotlk345@gmail.com";
// mail('hakam.almotlk345@gmail.com', 'My Subject', $encryption , $headers);



?>


<?php
require '../../mail/vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases
require_once("../../mail/config.php");


$mailer = new \SendGrid\Mail\Mail(); 
$mailer->setFrom("201911524@collegeahuntsic.qc.ca", "Example User");
$mailer->setSubject("Sending with SendGrid is Fun");
$mailer->addTo($email, "Example User");
$mailer->addContent("text/plain", "and easy to do anywhere, even with PHP");
$mailer->addContent(
    "text/html",
    "<strong><a href='http://localhost:80/LOML/passwordRecovery.php?id=$encryption'>Réinitialiser votre mot de passe</a></strong>"
);

$sendgrid = new \SendGrid(sendgrid_api);
try {
    $response = $sendgrid->send($mailer);
    $msg = "l'email a été envoyé.";
    header("Location: ../../index.php?msg=$msg");

} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>