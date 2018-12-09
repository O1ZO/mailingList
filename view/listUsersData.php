

<?php $title = 'Données utilisateurs'; ?>

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
	<div class="row">
		<div class="col-lg-10">
			<legend>Données des utilisateurs</legend>
		</div>
		<div class="col-lg-2">
			<form action="index.php?action=addUser" method="post">
				<input class="btn btn-warning" type="submit" value="Ajouter un utilisateur">
			</form>
		</div>

		<div>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Pseudo</th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>E-mail</th>
						<th>Mot de Passe</th>
						<th>Abonné à la newsletter</th>
						<th>Droits d'Administration</th>
						<th>Modifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<?php
				while ($users = $usersData->fetch())
				{
					?>
					<tbody>
						<tr>
							<td> <?php echo htmlspecialchars($users['id']); ?> </td>
							<td> <?php echo htmlspecialchars($users['login']); ?> </td>
							<td> <?php echo htmlspecialchars($users['name']); ?> </td>
							<td> <?php echo htmlspecialchars($users['firstName']); ?> </td>
							<td> <?php echo htmlspecialchars($users['email']); ?> </td>
							<td> <?php echo htmlspecialchars($users['password']); ?> </td>
							<td> <?php echo htmlspecialchars($users['newsletterId']); ?> </td>
							<td> 
								<?php
								if ($users['adminRights'] === 'oui') {
									echo htmlspecialchars("Oui");
								}else{
									echo htmlspecialchars("Non");
								}
								?>
							</td>
							<td><a href="index.php?action=modify&amp;id=<?= $users['id'] ?>">Modifier</a></td>
							<td><a href="index.php?action=delete&amp;id=<?= $users['id'] ?>">Supprimer</a></td>
						</tr>
					</tbody>
					<?php
				}
				?>
			</table>
		</div>
	</div>
</div>

<?php $usersData->closeCursor();?>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>