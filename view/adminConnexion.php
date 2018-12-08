

<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>



<div class="row">
	<div class="container">
		<div class="col col-lg-10">
			<h1>Espace Administrateur</h1>
		</div>
		<div class="col-lg-2">
			<br><form action="index.php?target=adminConnexion" method="post">
				<input class="btn btn-primary" type="submit" value="Espace Administrateur">
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
					<legend><h2>Connexion à l'espace d'administration :</h2></legend>
					<div class="form-group">
						<label for="adminLog"><strong>Identifiant : </strong></label>
						<input class="form-control" type="text" name="adminLog">	
					</div>
					<div class="form-group">
						<label for="adminPass"><strong>Mot de passe : </strong></label>
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
