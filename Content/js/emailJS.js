document.addEventListener("DOMContentLoaded", function () {
  let contactMain = document.getElementById("contact_main");
  if (contactMain) {
    const contactForm = document.querySelector("#contact-form");
    const contactMessage = document.querySelector("#contact_message");
    const emailInput = document.querySelector("#email_contact");

    function sendEmail(e) {
      e.preventDefault();

      // Validation de l'email
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(emailInput.value)) {
        // Affichage d'un message d'erreur si le format de l'email n'est pas correct
        alert("Veuillez entrer une adresse email valide.");
        return;
      }

      emailjs
        .sendForm("service_gnbgjyh", "template_2xoqaeb", "#contact-form", "yajZ8tEzhIen5Cfv1")
        .then(
          () => {
            // Message de succès
            contactMessage.textContent = "Message envoyé avec succès ✅";
            // Suppression du message après 5 secondes
            setTimeout(() => {
              contactMessage.textContent = "";
            }, 5000);
            // Réinitialisation des champs du formulaire
            contactForm.reset();
          },
          () => {
            // Message d'erreur
            contactMessage.textContent = "Erreur lors de l'envoi du message ❌";
          }
        );
    }

    contactForm.addEventListener("submit", sendEmail);
  }
});
