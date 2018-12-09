

<?php $title = 'Données newsletters'; ?>

<?php ob_start(); ?>


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
	<a class="btn btn-primary btn-lg" href="index.php?log=admin">Retour au menu administrateur</a>
</div><br>

<div class="container">
	<legend>Contenu des newsletters</legend>

	<div>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Sujet</th>
					<th>Titre</th>
					<th>Contenu</th>
					<th>Modifier</th>
					<th>Supprimer</th>
				</tr>
			</thead>
			<?php
			while ($getNewsletter = $listNewsletters->fetch())
			{
				?>
				<tbody>
					<tr>
						<td> <?php echo htmlspecialchars($getNewsletter['id']); ?> </td>
						<td> <?php echo htmlspecialchars($getNewsletter['title']); ?> </td>
						<td> <?php echo htmlspecialchars($getNewsletter['subject']); ?> </td>
						<td> <?php echo htmlspecialchars($getNewsletter['content']); ?> </td>
						<td><a href="index.php?action=modifyNl&amp;nlId=<?= $getNewsletter['id'] ?>">Modifier</a></td>
						<td><a href="index.php?action=listSubscribers&amp;nlId=<?= $getNewsletter['id'] ?>">Voir les abonnés</a></td>
					</tr>
				</tbody>
				<?php
			}
			?>
		</table>
	</div>
</div>

<?php $listNewsletters->closeCursor();?>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>