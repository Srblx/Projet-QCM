<main id="contact_main">
    <form id="contact_form" action="?controller=contact&action=action_contact_send_mail" method="post">
        <div id="contact_header_form">
            <h3 id="contact_h3_form">Contactez-nous</h3>
            <div id="contact_h3_underline"></div>
        </div>
        <div class="contact_inputs">
            <input type="text" id="contact_name" name="contact_name" placeholder="Nom">
            <input type="email" id="contact_email" name="contact_email" placeholder="E-mail">
            <input type="text" id="contact_object" name="contact_object" placeholder="Objet">
            <textarea id="contact_message" name="contact_message" rows="8" cols="50" placeholder="Message"></textarea>
            <input type="submit" id="contact_submit" name="contact_submit" value="Envoyer">
        </div>
    </form>
</main>