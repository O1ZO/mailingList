<?php $title = 'Abonnement à la newsletter'; ?>

<?php ob_start(); ?>

	<h1>Abonnement à la newsletter</h2>
	
	<form action="index.php?action=subscribe" method="post">
		<fieldset>
			<legend><h2>Inscription à la newsletter</h3></legend>
					<label for="name">Nom : </label>
					<input type="text" name="name"><br><br>
					<label for="firstName">Prenom : </label>
					<input type="text" name="firstName"><br><br>
					<label for="email">E-mail : </label>
					<input type="email" name="email"><br><br>
				<fieldset>
					<legend><h3>Choisissez la newsletter désirée : </h3></legend>
					<input type="radio" name="newsletter" value=1>
					<label for="newsletter">Newsletter 1</label><br>
					<input type="radio" name="newsletter" value=2>
					<label for="newsletter">Newsletter 2</label><br>
					<input type="radio" name="newsletter" value=3>
					<label for="newsletter">Newsletter 3</label><br>
				</fieldset><br>
					<input type="submit" value="Envoyer"></input>
		</fieldset>
	</form><br><br>

	<a href="index.php?target=adminConnexion">Espace Administrateur</a>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>