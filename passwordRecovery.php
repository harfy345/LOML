<?php

$_SESSION['active_page'] = 'home';
$pagetitre = "index";
require_once("public/util/header.php");
//loml.com/passwordRecovery?id=FASf2fAFSSAF2rt2@@fsa

$encryption = $_GET['id'];

// Storingthe cipher method
$ciphering = "AES-128-CTR";

// Using OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;


// Non-NULL Initialization Vector for decryption
$decryption_iv = '1234567891011121';

// Storing the decryption key
$decryption_key = "W3docs";

// Using openssl_decrypt() function to decrypt the data
$id = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

// Displaying the decrypted string
?><link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<div class="row">
<div class="col-sm-12">
<h1 class="text-center">Changer le mot de passe</h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<p class="text-center">Utilisez le formulaire ci-dessous pour changer votre mot de passe.</p>

<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="Nouveau mot de passe" autocomplete="off">
</br>
<input type="password" class="input-lg form-control" name="password1" id="password2" placeholder="Confirmer le mot de passe" autocomplete="off">
</br>
<button type="button" id="btnEdit" class="col-xs-12 btn btn-primary btn-load btn-lg"  onclick="editPass(<?php echo ($id)?>);">Changer le mot de passe</button>

</div>
</div>
</div>
<?php

require_once("./public/util/footer.php");

?>