<main id="contact_main">
    <form class="form" action="?controller=contact&action=action_contact_send_mail" method="post">
        <div class="form-title"><span>Contactez-nous</span></div>
        <div class="input-container">
            <input class="input" type="text" id="contact_name" name="contact_name" placeholder="Nom">
            <span> </span>
        </div>
        <div class="input-container">
            <input class="input" type="email" id="contact_email" name="contact_email" placeholder="E-mail">
            <span> </span>
        </div>
        <div class="input-container">
            <input class="input" type="text" id="contact_object" name="contact_object" placeholder="Objet">
            <span> </span>
        </div>
        <section class="bg-stars">
            <span class="star"></span>
            <span class="star"></span>
            <span class="star"></span>
            <span class="star"></span>
        </section>
        <div class="input-container">
            <textarea class="input" id="contact_message" name="contact_message" rows="8" cols="27"
                placeholder="Message"></textarea>
            <span> </span>
        </div>
        <section class="bg-stars">
            <span class="star"></span>
            <span class="star"></span>
            <span class="star"></span>
            <span class="star"></span>
        </section>
        <input type="submit" class="submit_form_connexion" value="Envoyer" name="contact_submit">
    </form>
</main>