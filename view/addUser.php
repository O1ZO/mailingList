

<?php $title = 'Ajouter un utilisateur'; ?>

<?php ob_start();?>
<h1>Espace Administrateur</h1><br>

<a href="index.php?action=listUsersData">Retour à la liste des utilisateurs</a>

	<div>
		<form action="index.php?action=add" method="post">
			<fieldset>
				<h3>ID : Pas encore attribué</h3>
				<legend><h2>Ajouter un utilisateur</h2></legend>
				<label for= "login"><strong>Pseudo : </strong></label>
				<input type="text" name="login"><br><br>
				<label for= "name"><strong>Nom : </strong></label>
				<input type="text" name="name"><br><br>
				<label for= "firstName"><strong>Prenom : </strong></label>
				<input type="text" name="firstName"><br><br>
				<label for= "email"><strong>Email : </strong></label>
				<input type="text" name="email"><br><br>
				<label for= "password"><strong>Mot de passe : </strong></label>
				<input type="text" name="password"><br><br>
				<fieldset>
					<legend><h3>Choix de la newsletter : </h3></legend>
					<input type="radio" name="newsletter" value=1>
					<label for="newsletter">Newsletter 1</label><br>
					<input type="radio" name="newsletter" value=2>
					<label for="newsletter">Newsletter 2</label><br>
					<input type="radio" name="newsletter" value=3>
					<label for="newsletter">Newsletter 3</label><br>
				</fieldset><br>
				<label for= "adminRights"><strong>Administrateur : </strong></label>
				<input type="radio" name="adminRights" value="oui">Oui</input>
				<input type="radio" name="adminRights" value="non" checked>Non</input><br><br>
				<input type="submit" value="Confirmer les changements"></input>
			</fieldset>
		</form>
	</div>

	
<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>