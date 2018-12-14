

<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>


<div class="container ">
	<nav class="navbar">
		<h1><strong>Connexion à l'Espace d'Administration</strong> </h1>

		<form action="index.php" method="post">
			<input class="btn btn-outline-primary text-center" type="submit" value="Retour">
		</form>
	</nav>
</div>

<br>


<div class="row">
	<div class="container bg-light border rounded shadow"><br>
			<form class="well" action="index.php?log=admin" method="post">
					<legend>Veuillez entrer vos identifiants : </legend>
					<div class="form-group">
						<label for="adminLog"><strong>Pseudo : </strong></label>
						<input class="form-control" type="text" name="adminLog">	
					</div>
					<div class="form-group">
						<label for="adminPass"><strong>Mot de Passe : </strong></label>
						<input class="form-control" type="password" name="adminPass">	
					</div>
					<div class="d-flex justify-content-center">
						<input class="btn btn-success btn-lg shadow" type="submit" name="Connexion">
					</div><br>
			</form>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
