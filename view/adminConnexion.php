

<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>



<div class="row">
	<div class="container">
		<div class="col col-lg-11">
			<h1><strong>Connexion à l'Espace d'Administration</strong> </h1>
		</div>
		<div class="col-lg-1">
			<br><form action="index.php" method="post">
				<input class="btn btn-primary" type="submit" value="Retour">
			</form>
		</div>
	</div>
</div>

<br>

<div class="row">
	<div class="container">
		<section class="col-lg-12">
			<form class="well" action="index.php?log=admin" method="post">
				<fieldset>
					<legend>Veuillez entrer vos identifiants : </legend>
					<div class="form-group">
						<label for="adminLog"><strong>Pseudo : </strong></label>
						<input class="form-control" type="text" name="adminLog">	
					</div>
					<div class="form-group">
						<label for="adminPass"><strong>Mot de Passe : </strong></label>
						<input class="form-control" type="password" name="adminPass">	
					</div>
				</fieldset><br>
				<input class="btn btn-primary" type="submit" name="Connexion">
			</form>
		</section>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
