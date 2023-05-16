    <form class="form">
     <div class="form-title"><span>Inscription</span></div>
      <div class="title-2">ByteMaster</div>
      <div class="input-container">
        <input class="input-nom" type="email" placeholder="Entrer Nom"><sup class="sup_form_inscription"> *</sup>
        <span> </span>
      </div>
      <div class="input-container">
        <input class="input-prenom" type="email" placeholder="Entrer Prenom"><sup class="sup_form_inscription"> *</sup>
        <span> </span>
      </div>
      <div class="input-container">
        <input class="input-mail" type="email" placeholder="Entrer email"><sup class="sup_form_inscription"> *</sup>
        <span> </span>
      </div>

      <section class="bg-stars">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
      </section>

      <div class="input-container">
        <input class="input-pwd" type="password" placeholder="Entrer Mot de Passe"><sup class="sup_form_inscription"> *</sup>
      </div>
      <div class="input-container">
        <input class="input-cpwd" type="password" placeholder="Confirmer Mot de Passe"><sup class="sup_form_inscription"> *</sup>
      </div>
      <div class="condition_general_utilisation">
            <p class="text_condition_generales">
                <label class="label_checkbox_condition" for="condition_general"></label><sup class="sup_form_inscription"> *</sup>
                <span id="checkbox_condition_inscription_erreur" class="erreur"></span>
                <input type="checkbox" name="condition_general" id="condition_general">
                <br>
                <span class="error-message"></span> 
                En cochant cette case, j'accepte <a href="?controller=condition&action=condition" class="link_condition_generales">les conditions
                    génerales d'utilisation</a>
            </p>
        </div>
      <input type="submit" class="submit_form_inscription" value="Inscription">
  
      </input>

      <p class="signup-link">
        Vous avez deja un compte?
        <a href="?controller=login_signup&action=login" class="up">Connexion</a>
      </p>
       
   </form>




      <script>
      // Sélection des éléments du formulaire
const form = document.querySelector('form');
const nomInput = document.querySelector('input[name="input_nom_inscription"]');
const prenomInput = document.querySelector('input[name="input_prenom_inscription"]');
const mailInput = document.querySelector('input[name="input_mail_inscription"]');
const passwordInput = document.querySelector('input[name="input_password_inscription"]');
const cPasswordInput = document.querySelector('input[name="input_cPassword_inscription"]');
const checkboxInput = document.querySelector('input[name="condition_general"]');

// Fonction de validation du formulaire
function validateForm(event) {
  event.preventDefault(); // Empêche l'envoi du formulaire par défaut

  // Validation du nom
  const nomValue = nomInput.value.trim();
  if (nomValue === '' || nomValue.length < 2 || nomValue.length > 25) {
    displayErrorMessage(nomInput, 'Le nom doit comporter entre 2 et 25 caractères.');
    return;
  }

  // Validation du prénom
  const prenomValue = prenomInput.value.trim();
  if (prenomValue === '' || prenomValue.length > 40) {
    displayErrorMessage(prenomInput, 'Le prénom ne peut pas être vide et doit comporter moins de 40 caractères.');
    return;
  }

  // Validation de l'adresse mail
  const mailValue = mailInput.value.trim();
  const mailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
  if (mailValue === '' || !mailRegex.test(mailValue)) {
    displayErrorMessage(mailInput, 'Veuillez entrer une adresse mail valide.');
    return;
  }

  // Validation du mot de passe
  const passwordValue = passwordInput.value;
  const cPasswordValue = cPasswordInput.value;
  const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/;
  if (passwordValue === '' || passwordValue.length < 12 || !passwordRegex.test(passwordValue)) {
    displayErrorMessage(passwordInput, 'Le mot de passe doit contenir au moins 12 caractères avec au moins une minuscule, une majuscule, un chiffre et un caractère spécial.');
    return;
  }

  // Validation de la confirmation du mot de passe
  if (cPasswordValue === '' || cPasswordValue !== passwordValue) {
    displayErrorMessage(cPasswordInput, 'La confirmation du mot de passe ne correspond pas au mot de passe saisi.');
    return;
  }

  // Validation de la checkbox
  if (!checkboxInput.checked) {
    displayErrorMessage(checkboxInput, 'Veuillez accepter les conditions générales d\'utilisation.');
    return;
  }

  // Si toutes les conditions sont respectées, le formulaire est valide
  // Vous pouvez ajouter ici le code pour envoyer le formulaire ou effectuer d'autres actions
  form.submit();
}

// Affichage du message d'erreur sous le champ de saisie
function displayErrorMessage(input, message) {
  const errorSpan = input.parentNode.querySelector('.error-message');
  errorSpan.textContent = message;
}

// Écouteur d'événement sur la soumission du formulaire
form.addEventListener('submit', validateForm);

const passwordInput = document.querySelector('input[name="input_password_inscription"]');
const passwordStrengthDiv = document.getElementById('password-strength');

passwordInput.addEventListener('input', updatePasswordStrength);

function updatePasswordStrength() {
  const password = passwordInput.value;
  const strength = calculatePasswordStrength(password);
  passwordStrengthDiv.style.backgroundColor = getColorByStrength(strength);
}

function calculatePasswordStrength(password) {
  // Logique pour calculer la robustesse du mot de passe
  // Retourne un nombre entre 0 et 2, où 0 est faible, 1 est moyen et 2 est fort
  // Vous pouvez personnaliser cette logique en fonction de vos critères de robustesse du mot de passe

  if (password.length < 8) {
    return 0; // Faible
  } else if (password.length < 12) {
    return 1; // Moyen
  } else {
    return 2; // Fort
  }
}

function getColorByStrength(strength) {
  // Retourne la couleur en fonction de la robustesse du mot de passe
  // Vous pouvez personnaliser les couleurs en fonction de vos préférences

  switch (strength) {
    case 0:
      return 'red'; // Faible
    case 1:
      return 'orange'; // Moyen
    case 2:
      return 'green'; // Fort
    default:
      return 'transparent'; // Par défaut, aucune couleur
  }
}

      </script>