

<?php $title = 'Menu Administrateur' ?>

<?php ob_start(); ?>


	<div class="row">
		<div class="container">
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


<div class="row">
	<div class="container well">
		<fieldset>
			<legend>Choisissez le type de données à consulter</legend>
			<div class="col-lg-6">
				<form action="index.php?action=listUsersData" method="post">
					<button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-user"></span><br>Voir les données utilisateurs</button>
				</form>
			</div>
			<div class="col-lg-6">
				<form action="index.php?action=listNewsletters" method="post">
					<button class="btn btn-primary btn-block" type="submit"><span class="glyphicon glyphicon-envelope"></span><br>Voir les newsletters</button>
				</form>
			</div>
		</div>
	</fieldset>
</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>