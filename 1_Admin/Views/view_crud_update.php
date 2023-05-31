

<?php if (is_array($update_score) && !empty($update_score)) : ?>
<form action="?controller=crud&action=update_score_bdd" method="post">
    <input type="hidden" name="hidden" value="<?= $update_score['id'] ?>">
    <label for="name">Nom</label>
    <input type="text" name="name" class="input_name" value="<?= filter_var($update_score['nom'], FILTER_SANITIZE_STRING) ?>">
    <label for="lastname">Prénom</label>
    <input type="text" name="lastname" class="input_lastname" value="<?= filter_var($update_score['prenom'], FILTER_SANITIZE_STRING) ?>">
    <label for="mail">Mail</label>
    <input type="email" name="mail" class="input_mail" value="<?= filter_var($update_score['email'], FILTER_SANITIZE_EMAIL) ?>">
    <label for="score">Score</label> 
    <input type="text" name="score" class="input_score" value="<?= filter_var($update_score['scores'], FILTER_SANITIZE_STRING) ?>">
    <label for="date">Date</label>
    <input type="date" name="date" class="input_date" value="<?= filter_var($update_score['date'], FILTER_SANITIZE_STRING) ?>">
    <label for="niveau">Niveau</label>
    <input type="number" name="niveau" class="input_number" value="<?= filter_var($update_score['niveau'], FILTER_SANITIZE_NUMBER_INT) ?>">
    <label for="time">Temps</label>
    <input type="time" name="time" class="input_time" value="<?= filter_var($update_score['temps'], FILTER_SANITIZE_STRING) ?>">
    <input type="submit" name="submit" value="Mettre à jour">
</form>
<?php else : ?>
    <p class="aucune_donne">Aucune donnée disponible pour la mise à jour du score.</p>
<?php endif; ?>
<?php var_dump($data) ?>