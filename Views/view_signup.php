<!-- MAUVAIS CODE
     <div class="form_back">
            <div class="form_details_inscription">SignUp</div>
            <input type="text" class="input" placeholder="Firstname">
            <input type="text" class="input" placeholder="Username">
            <input type="text" class="input" placeholder="Password">
            <input type="text" class="input" placeholder="Confirm Password">
            <button class="btn">Signup</button>
            <span class="switch">Already have an account? 
                <label for="signup_toggle" class="signup_tog">
                    Sign In
                </label>
            </span>
        </div>
    </form>
</div> -->
<!-- 
<div class="container_form_inscription">
    <input id="signup_toggle" type="checkbox">
    <form class="form_inscription">
        <div class="form_front_inscription">
            <div class="form_details_inscription">Inscription</div>
            <input type="text" class="input" placeholder="Firstname">
            <input type="text" class="input" placeholder="Username">
            <input type="text" class="input" placeholder="Password">
            <input type="text" class="input" placeholder="Confirm Password">
            <div class="condition_general_utilisation">
            <p class="text_condition_generales">
                <label class="label_checkbox_condition" for="condition_general"></label><sup>*</sup>
                <span id="checkbox_condition_inscription_erreur" class="erreur"></span>
                <input type="checkbox" name="condition_general" id="condition_general">
                En cochant cette case, j'accepte <a href="?controller=condition&action=condition" class="link_condition_generales">les conditions
                    génerales d'utilisation</a>
            </p>
        </div>
            <input type="submit" class="btn_inscirption" value="S'inscrire">
            <span class="switch">Vous avez déja un compter? 
                <label for="signup_toggle" class="signup_tog">
                    <a href="?controller=login_signup&action=login">inscription</a>
                </label>
            </span>
        </div>
    </form> -->
    <div class="content">
         <div class="text">
            Login
         </div>
         <form action="?controller_login_signup&action=signup_validate">
            <div class="field">
                <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"></path></g></svg></span>
                <label class="label"></label>
                <input required="" type="text" class="input" name="input_nom_inscription" placeholder="Nom"><sup class="sup_form_inscription">*</sup>
                <span class="error-message"></span>  
            </div>
            <div class="field">
                <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"></path></g></svg></span>
                <label class="label"> </label>
                <input required="" type="text" class="input" name="input_prenom_inscription" placeholder="Prénom"><sup class="sup_form_inscription">*</sup>
                <span class="error-message"></span> 
            </div>
            <div class="field">
                <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"></path></g></svg></span>
                <label class="label"></label>
                <input required="" type="text" class="input" name="input_mail_inscription" placeholder="Mail"><sup class="sup_form_inscription">*</sup>
                <span class="error-message"></span> 
            </div>
            <div class="field">
                <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0"></path></g></svg></span>
                <label class="label"></label>
                <input required="" type="password" class="input" name="input_password_inscription" placeholder="Mot de Passe"> <sup class="sup_form_inscription">*</sup>
                <div id="password-strength" class="password-strength"></div>
                <span class="error-message"></span> 
            </div>
            <div class="field">
                <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg"><g><path class="" data-original="#000000" fill="#595959" d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0"></path></g></svg></span>
                <label class="label"></label>
                <input required="" type="password" class="input" name="input_cPassword_inscription" placeholder="Confirme Mot de Passe "><sup class="sup_form_inscription">*</sup>
                <span class="error-message"></span> 
            </div>
            <!-- <div class="forgot-pass">
               <a href="#">Mot de Passe oublié?</a>
            </div> -->
            <div class="condition_general_utilisation">
            <p class="text_condition_generales">
                <label class="label_checkbox_condition" for="condition_general"></label><sup>*</sup>
                <span id="checkbox_condition_inscription_erreur" class="erreur"></span>
                <input type="checkbox" name="condition_general" id="condition_general">
                <br>
                <span class="error-message"></span> 
                En cochant cette case, j'accepte <a href="?controller=condition&action=condition" class="link_condition_generales">les conditions
                    génerales d'utilisation</a>
            </p>
        </div>
            <input type="submit" class="button" name="input_submit_inscription">
            <div class="sign-up">
               vous avez déja un compte?
               <a href="?controller=login_signup&action=login">Connectez-vous</a>
            </div>
         </form>
      </div>

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