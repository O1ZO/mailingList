

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
		<div class="col-lg-10">
			<legend>Abonnés à la newsletter n° <?= htmlspecialchars($getNewsletter['id']) ?></legend>
		</div>

		<div class="col-lg-2">
			<form action="" method="post">
				<button class="btn btn-success btn-sm" type="submit" name="mailForm" ><span class="glyphicon glyphicon-send"></span><br><strong>Envoyer la newsletter</strong></button>
			</form>
		</div>
	</div><br>
	
	<table class="table table-bordered table-striped">
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
					<td class="text-center"><a class="btn btn-warning btn-xs" href="index.php?action=modifyFromNl&amp;id=<?= $users['id'] ?>&amp;nlId=<?= $getNewsletter['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
					<td class="text-center"><a class="btn btn-danger btn-xs" href="index.php?action=remove&amp;id=<?= $users['id'] ?>&amp;nlId=<?= $getNewsletter['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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