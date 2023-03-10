<?php
$_SESSION['active_page'] = 'home';
$pagetitre = "Contact Us";
require_once("./public/util/header.php");
?>


<!--Section: Contact v.2-->
<section class="mb-4">

 
    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez-nous</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Vous avez des questions ? N'hésitez pas à nous contacter directement. Notre équipe vous répondra dans les
        quelques heures pour vous aider.</p>

    <div class="row">

        <div class="col-lg-5">
            <div style="width: 100%">
                <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=9155%20Rue%20St-Hubert,%20Montr%C3%A9al,%20QC%20H2M%201Y8+(Loml)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">area maps</a></iframe>
            </div>
        </div>

        <div class="col-lg-7">
            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="server/actions/mail.php" method="POST">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Votre Nom</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="email" name="email" class="form-control">
                                <label for="email" class="">Courriel</label>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" id="subject" name="subject" class="form-control">
                                <label for="subject" class="">Sujet</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                <label for="message">Votre Message</label>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->
                </form>

                <div class="text-center text-md-left">
                    <a class="btn btn-dark" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
                </div>
                <div class="status"></div>
            </div>
            
            <!--Grid column-->
        </div>

       
    </div>

</section>
<!--Section: Contact v.2-->


<?php

require_once("./public/util/footer.php");

?>