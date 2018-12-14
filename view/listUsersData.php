

<?php $title = 'Données utilisateurs'; ?>

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
	<div class="row">
		<div class="col-auto mr-auto">
			<legend>Données des Utilisateurs</legend>
		</div>
		<div class="col-auto">
			<form action="index.php?action=addUser" method="post">
				<button class="btn btn-success" type="submit"><span class="fas fa-plus"></span> Ajouter un Utilisateur</button>
			</form>
		</div>
	</div>
</div>
<div class="container"><br>
	<table class="table table-hover table-bordered table-striped table-sm">
		<thead>
			<tr>
				<th class="text-center">ID</th>
				<th class="text-center">Pseudo</th>
				<th class="text-center">Nom</th>
				<th class="text-center">Prenom</th>
				<th class="text-center">E-mail</th>
				<th class="text-center">Mot de Passe</th>
				<th class="text-center">Newsletter</th>
				<th class="text-center">Droits d'Administration</th>

			</tr>
		</thead>
		<?php
		while ($users = $usersData->fetch())
		{
			?>
			<tbody>
				<tr>
					<td class="text-center"> <?php echo htmlspecialchars($users['id']); ?> </td>
					<td class="text-center"> <?php echo htmlspecialchars($users['login']); ?> </td>
					<td class="text-center"> <?php echo htmlspecialchars($users['name']); ?> </td>
					<td class="text-center"> <?php echo htmlspecialchars($users['firstName']); ?> </td>
					<td> <?php echo htmlspecialchars($users['email']); ?> </td>
					<td class="text-center"> <?php echo htmlspecialchars($users['password']); ?> </td>
					<td class="text-center"> <?php echo htmlspecialchars($users['newsletterId']); ?> </td>
					<td class="text-center"> 
						<?php
						if ($users['adminRights'] === 'oui') {
							echo htmlspecialchars("Oui");
						}else{
							echo htmlspecialchars("Non");
						}
						?>
					</td>
					<td><a class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifier" href="index.php?action=modify&amp;id=<?= $users['id'] ?>"><span class="fas fa-pencil-alt"></span></a></td>
					<td><a class="btn btn-danger btn-sm" data-toggle="tooltip" title="Supprimer Définitivement" href="index.php?action=delete&amp;id=<?= $users['id'] ?>"><span class="fas fa-trash-alt"></span></a></td>
				</tr>
			</tbody>
			<?php
		}
		?>
	</table>
</div>


<?php $usersData->closeCursor();?>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>