<main id="contact_main">
    <div class="contact-form">
        <span class="heading">Nous contacter</span>
        <form id="contact-form" action="#" method="post">
            <label for="nom_contact">Nom:</label>
            <input type="text" id="nom_contact" name="nom_contact" required minlength="2">
            <label for="prenom_contact">Prenom:</label>
            <input type="text" id="prenom_contact" name="prenom_contact" required minlength="2">
            <label for="email_contact">Email:</label>
            <input type="email" id="email_contact" name="email_contact" required minlength="4" maxlength="50">
            <label for="message">Message:</label>
            <textarea id="message_contact" required name="message" maxlength="500"></textarea>
            <p id="contact_message"></p>
            <button type="submit" name="submit_contact">Envoyer</button>
        </form>
    </div>
</main>