<?php
$simple_string = "2"; // remplacer 2 par id de user

// Displaying the original string
echo "Original String: " . $simple_string. "<br/>";

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
$encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);

// Displaying the encrypted string
echo "Encrypted String: " . $encryption . "<br/>";
echo "<a href='./../../passwordRecovery.php?id=$encryption'>click</a>";


// $headers =  'MIME-Version: 1.0' . "\r\n"; 
// $headers .= 'From: Your name <info@address.com>' . "\r\n";
// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
// $headers = "From: localhost" . "\r\n" .
// "CC: hakam.almotlk345@gmail.com";
// mail('hakam.almotlk345@gmail.com', 'My Subject', $encryption , $headers);
?>