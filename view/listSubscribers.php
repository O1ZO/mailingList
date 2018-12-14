

<?php $title = 'Abonnés'; ?>

<?php ob_start();?>


<div class="container ">
	<nav class="navbar">
		<h1><strong>Espace Administrateur</strong> </h1>

		<form action="index.php?log=deconnect" method="post">
			<input class="btn btn-outline-primary text-center" type="submit" value="Déconnexion">
		</form>
	</nav>
</div>

<br>

<div class="container">
	<a class="btn btn-primary btn-lg" href="index.php?action=listNewsletters">Retour à la Liste des Newsletters</a>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-auto mr-auto">
			<legend>Abonnés à la Newsletter n° <?= htmlspecialchars($getNewsletter['id']) ?></legend>
		</div>

		<div class="col-auto">
			<form action="" method="post">
				<button class="btn btn-success btn-sm" type="submit" name="mailForm" ><span style="font-size: 1.5rem;" class="fab fa-telegram-plane"></span><br><strong>Envoyer la Newsletter</strong></button>
			</form>
		</div>
	</div>
</div><br>
<div class="container">
	<table class="table table-bordered table-striped table-hover table-sm">
		<thead>
			<tr>
				<th>ID</th>
				<th>Pseudo</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>E-mail</th>
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
					<td class="text-center"><a class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifier" href="index.php?action=modifyFromNl&amp;id=<?= $users['id'] ?>&amp;nlId=<?= $getNewsletter['id'] ?>"><span class="fas fa-pen"></span></a></td>
					<td class="text-center"><a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Supprimer de la Liste d'Abonnés" href="index.php?action=remove&amp;id=<?= $users['id'] ?>&amp;nlId=<?= $getNewsletter['id'] ?>"><span class="fas fa-trash-alt"></span></a></td>
				</tr>
			</tbody>
			<?php
		}
		if (isset($_POST['mailForm'])) {
			echo "<script>alert ('La Newsletter à été correctement envoyée !');</script>";
		}
		?>
	</table>
</div>

<?php $subscribers->closeCursor();?>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>