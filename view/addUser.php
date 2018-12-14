

<?php $title = 'Ajouter un utilisateur'; ?>

<?php ob_start();?>


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
	<a class="btn btn-primary btn-lg" href="index.php?action=listUsersData">Retour à la Liste des Utilisateurs</a>
</div><br>


<div class="container bg-light border rounded shadow"><br>
	<h3><strong>ID : non attribué</strong></h3><br>
	<div class="row">
		<div class="col">
			<form action="index.php?action=add" method="post">
				<legend>Ajouter un Utilisateur</legend>
				<div class="form-group">
					<label for= "login"><strong>Pseudo : </strong></label>
					<input class="form-control" type="text" name="login">
				</div>
				<div class="form-group">
					<label for= "name"><strong>Nom : </strong></label>
					<input class="form-control" type="text" name="name">
				</div>
				<div class="form-group">
					<label for= "firstName"><strong>Prenom : </strong></label>
					<input class="form-control" type="text" name="firstName">
				</div>
				<div class="form-group">
					<label for= "email"><strong>Email : </strong></label>
					<input class="form-control" type="text" name="email">
				</div>
				<div class="form-group">
					<label for= "password"><strong>Mot de Passe : </strong></label>
					<input class="form-control" type="text" name="password">
				</div>
			</div>
			<div class="col-auto mr-auto"><br><br><br>
				<legend>Choix de la Newsletter : </legend>
				<div class="radio">
					<label for="newsletter">
						<input type="radio" name="newsletter" value=1>
						Newsletter 1
					</label>
				</div>
				<div class="radio">
					<label for="newsletter">
						<input type="radio" name="newsletter" value=2>
						Newsletter 2
					</label>
				</div>
				<div class="radio">
					<label for="newsletter">
						<input type="radio" name="newsletter" value=3>
						Newsletter 3
					</label>
				</div><br><br>
				<legend>Administrateur : </legend>
				<div class="radio">
					<label for="adminRights">
						<input type="radio" name="adminRights" value="oui">
						Oui
					</label>
				</div>
				<div class="radio">
					<label for="adminRights">
						<input type="radio" name="adminRights" value="non" checked>
						Non
					</label>
				</div><br><br>
				<input class="btn btn-success btn-lg" type="submit" value="Ajouter un Utilisateur"></input>
			</div>
		</form>
	</div><br>
</div>


<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>