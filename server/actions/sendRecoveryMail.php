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

?>


<?php
require '../../mail/vendor/autoload.php';
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