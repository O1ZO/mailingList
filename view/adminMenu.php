

<?php $title = 'Menu Administrateur' ?>

<?php ob_start(); ?>

<h1>Espace Administrateur</h1>


<fieldset>
	<legend><h2>Choisissez le type de données à consulter</h2></legend>
		<form action="index.php?action=listUsersData" method="post">
			<input type="submit" value="Voir les données utilisateurs">
		</form><br><br>
		<form action="index.php?action=listNewsletters" method="post">
			<input type="submit" value="Voir les newsletters">
		</form><br>
</fieldset>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>