<table class='table'>
	<thead>
		<tr>
			<th>ISBN</th>
			<th>Titre</th>
			<th>Thème</th>
			<th>Nombre de page</th>
			<th>Format</th>
			<th>Auteur</th>
			<th>Editeur</th>
			<th>Année d'édition</th>
			<th>Prix</th>
			<th>Langue</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<!-- <tbody>
		<?php //var_dump($livres[0]);
		?>
		<?php foreach ($livres as $l) : ?>
			<tr>
				<td class="td"> <?= $l->isbn ?> </td>
				<td class="td"> <?= $l->titre ?> </td>
				<td class="td"> <?= $l->theme ?> </td>
				<td class="td"> <?= $l->nombreDePage ?> </td>
				<td class="td"> <?= $l->format ?> </td>
				<td class="td"> <?= $l->nomAuteur ?> <?= $l->prenomAuteur ?></td>
				<td class="td"> <?= $l->editeur ?> </td>
				<td class="td"> <?= $l->anneeEdition ?> </td>
				<td class="td"> <?= $l->prix ?> </td>
				<td class="td"> <?= $l->langue ?> </td>
				<td><a href="?controller=livre&action=update_livre&id=<?= $l->id ?>"><i class="fa-solid fa-pen"></i></a></td>
				<td class='trash'><a href='?controller=livre&action=delete_livre&id=<?= $l->id ?>' style='color: red;' onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')"><i class='fa fa-trash'></i></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table> -->