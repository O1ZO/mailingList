

<?php $title = 'Abonnés'; ?>

<?php ob_start();?>


<div class="container">
	<div class="row">
		<div class="col col-lg-10">
			<h1><strong>Espace Administrateur</strong> </h1>
		</div>
		<div class="col-lg-2">
			<br><form action="index.php?log=deconnect" method="post">
				<input class="btn btn-primary" type="submit" value="Déconnexion">
			</form>
		</div>
	</div>
</div>

<br>

<div class="container">
	<a class="btn btn-primary btn-lg" href="index.php?action=listNewsletters">Retour à la liste des newsletters</a>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<legend>Abonnés à la newsletter n° <?= htmlspecialchars($getNewsletter['id']) ?></legend>
		</div>

		<div class="col-lg-3">
			<form action="" method="post">
				<input class="btn btn-danger btn-sm" type="submit" name="mailForm" value="Envoyer la newsletter à tout les abonnés">
			</form>
		</div>
	</div>
	
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Pseudo</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>E-mail</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<?php
		while ($users = $subscribers->fetch())
		{
			if (isset($_POST['mailForm'])) {
				sendMail($users['email'], $getNewsletter['subject'], $getNewsletter['content']);
			}
			?>
			<tbody>
				<tr>
					<td> <?php echo htmlspecialchars($users['id']); ?> </td>
					<td> <?php echo htmlspecialchars($users['login']); ?> </td>
					<td> <?php echo htmlspecialchars($users['name']); ?> </td>
					<td> <?php echo htmlspecialchars($users['firstName']); ?> </td>
					<td> <?php echo htmlspecialchars($users['email']); ?> </td>
					<td><a href="index.php?action=modifyFromNl&amp;id=<?= $users['id'] ?>&amp;nlId=<?= $getNewsletter['id'] ?>">Modifier</a></td>
					<td><a href="index.php?action=remove&amp;id=<?= $users['id'] ?>&amp;nlId=<?= $getNewsletter['id'] ?>">Supprimer</a></td>
				</tr>
			</tbody>
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