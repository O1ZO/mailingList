

<?php $title = 'Menu Administrateur' ?>

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



<div class="container border bg-light rounded shadow"><br>
	<legend>Choisissez le Type de Données à Consulter</legend><br>
	<div class="row">
		<div class="col">
			<form action="index.php?action=listUsersData" method="post">
				<button class="btn btn-primary btn-block shadow" type="submit"><span class="fas fa-users fa-2x"></span><br>Voir les Données Utilisateurs</button>
			</form>
		</div>
		<div class="col">
			<form action="index.php?action=listNewsletters" method="post">
				<button class="btn btn-primary btn-block shadow" type="submit"><span class="fas fa-envelope fa-2x"></span><br>Voir les Newsletters</button><br>
			</form>
		</div>
	</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>