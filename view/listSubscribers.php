

<?php $title = 'Abonnés'; ?>

<?php ob_start();?>

<h1>Espace Administrateur</h1>


<a href="index.php?action=listNewsletters">Retour à la liste des newsletters</a>

	<h2>Abonnés à la newsletter n° <?= htmlspecialchars($getNewsletter['id']) ?></h2>


	<form action="" method="post">
		<input type="submit" name="mailForm" value="Envoyer la newsletter à tout les abonnés">
	</form><br><br>

	<div>
		<table>
			<tr>
				<th>ID</th>
				<th>Pseudo</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>E-mail</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
			while ($users = $subscribers->fetch())
			{
				if (isset($_POST['mailForm'])) {
					sendMail($users['email'], $getNewsletter['subject'], $getNewsletter['content']);
				}
			?>
			<tr>
				<td> <?php echo htmlspecialchars($users['id']); ?> </td>
				<td> <?php echo htmlspecialchars($users['login']); ?> </td>
				<td> <?php echo htmlspecialchars($users['name']); ?> </td>
				<td> <?php echo htmlspecialchars($users['firstName']); ?> </td>
				<td> <?php echo htmlspecialchars($users['email']); ?> </td>
				<td><a href="index.php?action=modifyFromNl&amp;id=<?= $users['id'] ?>&amp;nlId=<?= $getNewsletter['id'] ?>">Modifier</a></td>
				<td><a href="index.php?action=remove&amp;id=<?= $users['id'] ?>&amp;nlId=<?= $getNewsletter['id'] ?>">Supprimer</a></td>
			</tr>
			<?php
			}
			if (isset($_POST['mailForm'])) {
				echo "<script>alert ('La newsletter à été correctement envoyée !');</script>";
			}
			?>
		</table>
	</div>

<?php $subscribers->closeCursor();?>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>