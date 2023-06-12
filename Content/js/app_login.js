document.addEventListener("DOMContentLoaded", function () {
  var loginMain = document.getElementById("login_main");
  if (loginMain) {
    const loginForm = document.querySelector("#form_login");
    loginForm.addEventListener("submit", function (event) {
      // Récupération des valeurs des champs
      const email = document.querySelector(".input-email").value;
      const password = document.querySelector(".input-password").value;

      // Validation des données
      if (email.trim() === "" || password.trim() === "") {
        // Affichage d'une erreur si les champs sont vides
        event.preventDefault(); // Empêche le formulaire de se soumettre normalement
        const errorSpan = document.querySelector(".error-message");
        errorSpan.textContent = "Veuillez remplir tous les champs.";
        return; // Arrête l'exécution de la fonction
      }

      // Envoi des données au serveur (par exemple avec une requête AJAX)
      // ...

      // Exemple d'affichage d'un message de succès
      const successSpan = document.querySelector(".success-message");
      successSpan.textContent = "Formulaire soumis avec succès.";
    });
  }
});
