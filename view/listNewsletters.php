

<?php $title = 'Données newsletters'; ?>

<?php ob_start(); ?>

<h1>Espace Administrateur</h1>

<a href="index.php?log=admin">Retour au menu administrateur</a>

	<h2>Contenu des newsletters</h2>

	<div>
		<table>
			
			<tr>
				<th>ID</th>
				<th>Sujet</th>
				<th>Titre</th>
				<th>Contenu</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
			while ($getNewsletter = $listNewsletters->fetch())
			{
			?>
			<tr>
				<td> <?php echo htmlspecialchars($getNewsletter['id']); ?> </td>
				<td> <?php echo htmlspecialchars($getNewsletter['title']); ?> </td>
				<td> <?php echo htmlspecialchars($getNewsletter['subject']); ?> </td>
				<td> <?php echo htmlspecialchars($getNewsletter['content']); ?> </td>
				<td><a href="index.php?action=modifyNl&amp;nlId=<?= $getNewsletter['id'] ?>">Modifier</a></td>
				<td><a href="index.php?action=listSubscribers&amp;nlId=<?= $getNewsletter['id'] ?>">Voir les abonnés</a></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>

<?php $listNewsletters->closeCursor();?>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>