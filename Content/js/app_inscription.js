document.addEventListener("DOMContentLoaded", function () {
  let Inscription = document.getElementById("signup_main");
  if (Inscription) {
    let form = document.querySelector(".form");
    form.addEventListener("submit", function (event) {
      event.preventDefault(); // Empêche la soumission du formulaire par défaut

      // Récupération des valeurs des champs
      let nom = document.querySelector(".input-nom").value.trim();
      let prenom = document.querySelector(".input-prenom").value.trim();
      let email = document.querySelector(".input-mail").value.trim();
      let password = document.querySelector(".input-pwd").value;
      let confirmPassword = document.querySelector(".input-cpwd").value;
      let checkBox = document.querySelector("#condition_general");

      // Réinitialisation des messages d'erreur
      let errorMessages = document.querySelectorAll(".error-message");
      for (let i = 0; i < errorMessages.length; i++) {
        errorMessages[i].textContent = "";
      }

      // Validation des conditions
      let isValid = true;
      console.log(isValid);

      if (nom === "") {
        document.querySelector(".error-message-nom").textContent = "Ce champ est obligatoire";
        isValid = false;
      } else if (nom.length < 2 || nom.length > 30) {
        document.querySelector(".error-message-nom").textContent =
          "Le nom doit avoir entre 2 et 30 caractères";
        isValid = false;
      }

      if (prenom === "") {
        document.querySelector(".error-message-prenom").textContent = "Ce champ est obligatoire";
        isValid = false;
      } else if (prenom.length < 2 || prenom.length > 30) {
        document.querySelector(".error-message-prenom").textContent =
          "Le prénom doit avoir entre 2 et 30 caractères";
        isValid = false;
      }

      if (email === "") {
        document.querySelector(".error-message-email").textContent = "Ce champ est obligatoire";
        isValid = false;
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.querySelector(".error-message-email").textContent =
          "Le format de l'email est invalide";
        isValid = false;
      }

      if (password === "") {
        document.querySelector(".error-message-password").textContent = "Ce champ est obligatoire";
        isValid = false;
      } else if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}/.test(password)) {
        document.querySelector(".error-message-password").textContent =
          "Le mot de passe doit contenir au moins 12 caractères avec une majuscule, une minuscule, un chiffre et un caractère spécial";
        isValid = false;
      }

      if (confirmPassword === "") {
        document.querySelector(".error-message-cpassword").textContent = "Ce champ est obligatoire";
        isValid = false;
      } else if (confirmPassword !== password) {
        document.querySelector(".error-message-cpassword").textContent =
          "Le mot de passe ne correspond pas";
        isValid = false;
      }

      if (!checkBox.checked) {
        document.querySelector(".error-message-checkbox").textContent =
          "Veuillez accepter les conditions générales d'utilisation";
        isValid = false;
      }

      // Soumission du formulaire si toutes les conditions sont respectées
      if (isValid) {
        form.submit();
      }
    });
  }
});
