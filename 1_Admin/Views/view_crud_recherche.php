<?php if ($position == 1 ) : ?>

<table class='table'>
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Pseudo</th>
			<th>Mail</th>
			<th>Roles</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php //var_dump($livres[0]);
		?>
		<?php foreach ($all_users as $al) : ?>
			<tr>
				<td class="td"> <?= $al->nom ?> </td>
				<td class="td"> <?= $al->prenom ?> </td>
				<td class="td"> <?= $al->pseudo ?> </td>
				<td class="td"> <?= $al->email ?> </td>
				<td class="td"> <?= $al->admin ?> </td>
				
				<td><a href="?controller=crud&action=update_user&id=<?= $al->id ?>"><i class="fa-solid fa-pen"></i></a></td>
				<td class='trash'><a href='?controller=user&action=delete_user&id=<?= $al->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')"><i class='fa fa-trash'></i></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table> 
<?php endif; ?>

<?php if ($position == 2 ) : ?>
	
	<table class='table'>
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Pseudo</th>
				<th>Mail</th>
				<th>Roles</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php //var_dump($livres[0]);
			?>
			<?php foreach ($all_users as $al) : ?>
				<tr>
					<td class="td"> <?= $al->nom ?> </td>
					<td class="td"> <?= $al->prenom ?> </td>
					<td class="td"> <?= $al->pseudo ?> </td>
					<td class="td"> <?= $al->email ?> </td>
					<td class="td"> <?= $al->admin ?> </td>
					
					<td><a href="?controller=crud&action=update_user&id=<?= $al->id ?>"><i class="fa-solid fa-pen"></i></a></td>
					<td class='trash'><a href='?controller=user&action=delete_user&id=<?= $al->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')"><i class='fa fa-trash'></i></a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table> 
	<?php endif; ?>

<?php if ($position == 5) : ?>
<table class='table'>
	<thead>
		<tr>
			<th>Question</th>
			<th>Reponse</th>
			<th>Nombre de Points</th>
			<th>Temps de reponse</th>
			<th>Themes</th>
			<th>Difficulté</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $previousQuestion = null; ?>
		<?php foreach ($all_question_reponse as $aqr) : ?>
			<tr>
				<?php if ($aqr->question !== $previousQuestion) : ?>
					<td class="td" rowspan="<?= count(getReponsesForQuestion($all_question_reponse, $aqr->question)) ?>">
						<?= $aqr->question ?>
					</td>
				<?php endif; ?>
				<td class="td"> <?= $aqr->reponse ?> </td>
				<td class="td"> <?= $aqr->nb_points ?> </td>
				<td class="td"> <?= $aqr->tps_question ?> </td>
				<td class="td"> <?= $aqr->theme_id ?> </td>
				<td class="td"> <?= $aqr->niveau ?> </td>
				
				<td><a href="?controller=crud&action=update_user&id=<?= $aqr->id ?>"><i class="fa-solid fa-pen"></i></a></td>
				<td class='trash'><a href='?controller=user&action=delete_user&id=<?= $aqr->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')"><i class='fa fa-trash'></i></a></td>
			</tr>
			<?php $previousQuestion = $aqr->question; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>

<?php
function getReponsesForQuestion($all_question_reponse, $question)
{
    $reponses = []; // Initialise un tableau vide pour stocker les réponses correspondantes à la question
    foreach ($all_question_reponse as $aqr) {
        if ($aqr->question === $question) { // Vérifie si la question de l'itération actuelle correspond à la question recherchée
            $reponses[] = $aqr->reponse; // Ajoute la réponse à la liste des réponses correspondantes
        }
    }
    return $reponses; // Retourne le tableau de réponses correspondantes
}
?>