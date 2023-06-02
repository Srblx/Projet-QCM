<style>
    #update-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin: 0 auto;
  max-width: 400px;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
}

#update-form label {
  margin-top: 10px;
  font-weight: bold;
}

#update-form input[type="text"],
#update-form input[type="email"],
#update-form input[type="number"],
#update-form input[type="date"],
#update-form input[type="time"] {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

#update-form input[type="submit"] {
  margin-top: 20px;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#update-form input[type="submit"]:hover {
  background-color: #45a049;
}

#update-form .error-message {
  color: red;
  margin-top: 5px;
}

.aucune_donne {
  text-align: center;
  margin-top: 20px;
}
</style>

<?php if (is_array($update_score) && !empty($update_score)) : ?>
    <form id="update-form" action="?controller=crud&action=update_score_bdd" method="post">
    <input type="hidden" name="hidden" value="<?= $update_score['id'] ?>">
    <label for="name">Nom</label>
    <input type="text" id="name" name="name" class="input_name" value="<?= filter_var($update_score['nom'], FILTER_SANITIZE_STRING) ?>">
    <label for="lastname">Prénom</label>
    <input type="text" id="lastname" name="lastname" class="input_lastname" value="<?= filter_var($update_score['prenom'], FILTER_SANITIZE_STRING) ?>">
    <label for="mail">Mail</label>
    <input type="email" id="mail" name="mail" class="input_mail" value="<?= filter_var($update_score['email'], FILTER_SANITIZE_EMAIL) ?>">
    <label for="score">Score</label> 
    <input type="text" id="score" name="score" class="input_score" value="<?= filter_var($update_score['scores'], FILTER_SANITIZE_STRING) ?>">
    <label for="date">Date</label>
    <input type="date" id="date" name="date" class="input_date" value="<?= filter_var($update_score['date'], FILTER_SANITIZE_STRING) ?>">
    <label for="niveau">Niveau</label>
    <input type="number" id="niveau" name="niveau" class="input_number" value="<?= filter_var($update_score['niveau'], FILTER_SANITIZE_NUMBER_INT) ?>">
    <label for="time">Temps</label>
    <input type="time" id="time" name="time" class="input_time" value="<?= filter_var($update_score['temps'], FILTER_SANITIZE_STRING) ?>">
    <input type="submit" name="submit" value="Mettre à jour">
</form>
<?php else : ?>
    <p class="aucune_donne">Aucune donnée disponible pour la mise à jour du score.</p>
<?php endif; ?>
<?php var_dump($data) ?>