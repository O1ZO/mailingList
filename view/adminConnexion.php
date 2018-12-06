

<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<h1>Espace Administrateur</h1>

<form action="index.php?log=admin" method="post">
	<fieldset>
		<legend><h2>Connexion à l'espace d'administration :</h2></legend>
		<label for="adminLog"><strong>Identifiant : </strong></label>
		<input type="text" name="adminLog"><br><br>
		<label for="adminPass"><strong>Mot de passe : </strong></label>
		<input type="password" name="adminPass"><br><br><br>
		<input type="submit" name="Connexion">
	</fieldset>
</form>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
