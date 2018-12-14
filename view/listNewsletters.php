

<?php $title = 'Données newsletters'; ?>

<?php ob_start(); ?>


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
	<a class="btn btn-primary btn-lg" href="index.php?log=admin">Retour au Menu Administrateur</a>
</div><br>

<div class="container">
	<legend>Contenu des Newsletters</legend>

	<div>
		<table class="table table-bordered table-striped text-justify table-hover table-sm">
			<thead>
				<tr>
					<th>ID</th>
					<th>Sujet</th>
					<th>Titre</th>
					<th>Contenu</th>

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
						<td><a class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifier" href="index.php?action=modifyNl&amp;nlId=<?= $getNewsletter['id'] ?>"><span class="fas fa-pen"></span></a></td>
						<td><a class="btn btn-success btn-sm" href="index.php?action=listSubscribers&amp;nlId=<?= $getNewsletter['id'] ?>"><span class="fas fa-user"></span> VOIR LES ABONNES</a></td>
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