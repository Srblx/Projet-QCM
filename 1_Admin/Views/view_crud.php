<style>

/* Ajoutez des animations supplémentaires pour les effets hover, focus, etc. selon vos préférences */
</style>
<section class="body_crud">
<div class="dropdown">
  <button class="dropbtn">Utilisateur</button>
  <div class="dropdown-content">
    <a href="?controller=crud&action=crud_utilisateur_name">Par Nom</a>
    <a href="?controller=crud&action=crud_utilisateur_pseudo">Par Pseudo</a>
    <a href="?controller=crud&action=crud_utilisateur_mail">Par E-mail</a>
    <a href="?controller=crud&action=crud_utilisateur_all">Tous les Utilisateurs</a>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn">Questions/Réponses</button>
  <div class="dropdown-content">
    <a href="?controller=crud&action=crud_question_reponse_theme">Par Thèmes</a>
    <a href="?controller=crud&action=crud_question_reponse_difficulty">Par Difficulté</a>
    <a href="?controller=crud&action=crud_question_reponse_time">Par Temps</a>
    <a href="?controller=crud&action=crud_question_reponse_all">Toutes les questions</a>
  </div>
</div>

<div class="dropdown">
  <button class="dropbtn">Résultat</button>
  <div class="dropdown-content">
    <a href="?controller=crud&action=crud_result_score">Par score</a>
    <a href="?controller=crud&action=crud_result_time">Par temps</a>
    <a href="?controller=crud&action=crud_result_date">Par Date</a>
    <a href="?controller=crud&action=crud_result_all">Toutes les résultats</a>
  </div>
</div>
</section>
<section class="tableau-donnees">
<?php if ($position !== 1) : ?>
    <table class="tableau-donnees-afficher">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Pseudo</th>
                <th>Mail</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($utilisateur_name_list as $unl) : ?>
                <tr>
                    <td class="td"> <?= $unl->nom ?> </td>
                    <td class="td"> <?= $unl->prenom ?> </td>
                    <td class="td"> <?= $unl->pseudo ?> </td>
                    <td class="td"> <?= $unl->mail ?> </td>
                    <td class="td"> <?= $unl->admin ?> </td>
                    <td class="td"><a href="?controller=utilisateur&action=update_utilisateur&id=<?= $unl->id ?>"><i class="fa-solid fa-pen"></i></a></td>
                    <td class="trash td">
                    <a href="?controller=utilisateur&action=delete_utilisateur&id=<?= $unl->id ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                    <i class="fa fa-trash"></i>
                    </a></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="information_boolean">Roles utilisateurs : 1 => Administrateur | 0 => Utilisateur</p>
<?php endif; ?>
</section>