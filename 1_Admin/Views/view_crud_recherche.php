
<?php if ($position == 1 ) : 
	echo "Position :" . $position; ?>

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
<?php var_dump($data); ?>
<?php endif; ?>

<?php if ($position == 2 ) : 
	echo "Position :" . $position; ?>
	
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
			<?php foreach ($all_user_name as $aun) : ?>
				<tr>
					<td class="td"> <?= $aun->nom ?> </td>
					<td class="td"> <?= $aun->prenom ?> </td>
					<td class="td"> <?= $aun->pseudo ?> </td>
					<td class="td"> <?= $aun->email ?> </td>
					<td class="td"> <?= $aun->admin ?> </td>
					
					<td><a href="?controller=crud&action=update_user&id=<?= $aun->id ?>"><i class="fa-solid fa-pen"></i></a></td>
					<td class='trash'><a href='?controller=user&action=delete_user&id=<?= $aun->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')"><i class='fa fa-trash'></i></a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table> 
	<?php var_dump($data); ?>
	<?php endif; ?>

	
<?php if ($position == 3) : 
	echo "Position :" . $position; ?>

	<table class='table'>
		<thead>
			<tr>
				<th>Thème</th>
				<th>Description</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($all_user_pseudo as $aup) : ?>
				<tr>
				<td class="td"> <?= $aup->nom ?> </td>
				<td class="td"> <?= $aup->prenom ?> </td>
				<td class="td"> <?= $aup->pseudo ?> </td>
				<td class="td"> <?= $aup->email ?> </td>
				<td class="td"> <?= $aup->admin ?> </td>
					
					<td><a href="?controller=crud&action=update_theme&id=<?= $aup->id ?>"><i class="fa-solid fa-pen"></i></a></td>
					<td class='trash'><a href='?controller=crud&action=delete_theme&id=<?= $aup->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce thème ?')"><i class='fa fa-trash'></i></a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php var_dump($data); ?>
	<?php endif; ?>
	
	<?php if ($position == 4) :
		echo "Position :" . $position;  ?>
	
	<table class='table'>
		<thead>
			<tr>
				<th>Niveau</th>
				<th>Description</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($all_user_mail as $aum) : ?>
				<tr>
				<td class="td"> <?= $aum->nom ?> </td>
				<td class="td"> <?= $aum->prenom ?> </td>
				<td class="td"> <?= $aum->pseudo ?> </td>
				<td class="td"> <?= $aum->email ?> </td>
				<td class="td"> <?= $aum->admin ?> </td>
					
					<td><a href="?controller=crud&action=update_niveau&id=<?= $aum->id ?>"><i class="fa-solid fa-pen"></i></a></td>
					<td class='trash'><a href='?controller=crud&action=delete_niveau&id=<?= $aum->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce niveau ?')"><i class='fa fa-trash'></i></a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php var_dump($data); ?>
	<?php endif; ?>

<?php if ($position == 5) : 
	echo "Position :" . $position; ?>
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
		<?php foreach ($all_question_reponse as $aqrt) : ?>
			<tr>
				<?php if ($aqrt->question !== $previousQuestion) : ?>
					<td class="td" rowspan="<?= count(getReponsesForQuestion($all_question_reponse, $aqrt->question)) ?>">
						<?= $aqrt->question ?>
					</td>
				<?php endif; ?>
				<td class="td"> <?= $aqrt->reponse ?> </td>
				<td class="td"> <?= $aqrt->nb_points ?> </td>
				<td class="td"> <?= $aqrt->tps_question ?> </td>
				<td class="td"> <?= $aqrt->theme_id ?> </td>
				<td class="td"> <?= $aqrt->niveau ?> </td>
				
				<td><a href="?controller=crud&action=update_user&id=<?= $aqrt->id ?>"><i class="fa-solid fa-pen"></i></a></td>
				<td class='trash'><a href='?controller=user&action=delete_user&id=<?= $aqrt->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')"><i class='fa fa-trash'></i></a></td>
			</tr>
			<?php $previousQuestion = $aqrt->question; ?>
		<?php endforeach; ?>
	</tbody>
</table>
<?php var_dump($data); ?>
<?php endif; ?>

<?php
function getReponsesForQuestion($all_question_reponse, $question)
{
    $reponses = []; // Initialise un tableau vide pour stocker les réponses correspondantes à la question
    foreach ($all_question_reponse as $aqrt) {
        if ($aqrt->question === $question) { // Vérifie si la question de l'itération actuelle correspond à la question recherchée
            $reponses[] = $aqrt->reponse; // Ajoute la réponse à la liste des réponses correspondantes
        }
    }
    return $reponses; // Retourne le tableau de réponses correspondantes
}
?>



	
	<?php if ($position == 6) :  
		echo "Position :" . $position; ?>
	
	<table class='table'>
		<thead>
			<tr>
				<th>Temps</th>
				<th>Description</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($all_question_reponse_theme as $aqrt) : ?>
				<tr>
				<td class="td"> <?= $aqrt->question ?> </td>
				<td class="td"> <?= htmlspecialchars($aqrt->reponse) ?> </td>
				<td class="td"> <?= $aqrt->nb_points ?> </td>
				<td class="td"> <?= $aqrt->tps_question ?> </td>
				<td class="td"> <?= $aqrt->theme_id ?> </td>
				<td class="td"> <?= $aqrt->niveau ?> </td>
					
					<td><a href="?controller=crud&action=update_temps&id=<?= $aqrt->id ?>"><i class="fa-solid fa-pen"></i></a></td>
					<td class='trash'><a href='?controller=crud&action=delete_temps&id=<?= $aqrt->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce temps ?')"><i class='fa fa-trash'></i></a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php var_dump($data); ?>
	<?php endif; ?>
	
	<?php if ($position == 7) : 
		echo "Position :" . $position; ?>
	
	<table class='table'>
		<thead>
			<tr>
				<th>Score</th>
				<th>Description</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($all_question_reponse_difficulte as $aqrd) : ?>
				<tr>
				<td class="td"> <?= $aqrd->question ?> </td>
				<td class="td"> <?= htmlspecialchars($aqrd->reponse) ?> </td>
				<td class="td"> <?= $aqrd->nb_points ?> </td>
				<td class="td"> <?= $aqrd->tps_question ?> </td>
				<td class="td"> <?= $aqrd->theme_id ?> </td>
				<td class="td"> <?= $aqrd->niveau ?> </td>
					
					<td><a href="?controller=crud&action=update_score&id=<?= $aqrd->id ?>"><i class="fa-solid fa-pen"></i></a></td>
					<td class='trash'><a href='?controller=crud&action=delete_score&id=<?= $aqrd->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce score ?')"><i class='fa fa-trash'></i></a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php var_dump($data); ?>
	<?php endif; ?>
	
	<?php if ($position == 8) : 
		echo "Position :" . $position; ?>
	
	<table class='table'>
		<thead>
			<tr>
				<th>Theme</th>
				<th>Niveau</th>
				<th>Temps</th>
				<th>Score</th>
				<th>Question</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($all_score_resultat as $asr) : ?>
				<tr>
					<td class="td"><?= $asr->theme_id ?></td>
					<td class="td"><?= $asr->niveau_id ?></td>
					<td class="td"><?= $asr->temps_id ?></td>
					<td class="td"><?= $asr->score_id ?></td>
					<td class="td"><?= $asr->question ?></td>
					
					<td><a href="?controller=crud&action=update_quizz&id=<?= $asr->id ?>"><i class="fa-solid fa-pen"></i></a></td>
					<td class='trash'><a href='?controller=crud&action=delete_quizz&id=<?= $asr->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce quizz ?')"><i class='fa fa-trash'></i></a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php var_dump($data); ?>
	<?php endif; ?>
	
	<?php // if ($position == 9) : ?>
<!-- 	
	<table class='table'>
		<thead>
			<tr>
				<th>Utilisateur</th>
				<th>Quizz</th>
				<th>Date</th>
				<th>Score</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody> -->
			<?php // foreach ($all_scores as $score) : ?>
				<!-- <tr>
					<td class="td"><?= $score->utilisateur_id ?></td>
					<td class="td"><?= $score->quizz_id ?></td>
					<td class="td"><?= $score->date ?></td>
					<td class="td"><?= $score->score ?></td>
					
					<td><a href="?controller=crud&action=update_score&id=<?= $score->id ?>"><i class="fa-solid fa-pen"></i></a></td>
					<td class='trash'><a href='?controller=crud&action=delete_score&id=<?= $score->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce quizz ?')"><i class='fa fa-trash'></i></a></td>
				</tr> -->
			<?php//endforeach; ?>
		<!-- </tbody>
	</table> -->
	<?php // endif; ?>

