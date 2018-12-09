

<?php $title = 'Ajouter un utilisateur'; ?>

<?php ob_start();?>


<div class="container">
	<div class="row">
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

<div class="container">
	<a class="btn btn-primary btn-lg" href="index.php?action=listUsersData">Retour à la liste des utilisateurs</a>
</div><br>

<div class="row">
	<div class="container">
		<section class="col-lg-12">
			<form class="well" action="index.php?action=add" method="post">
				<fieldset>
					<h3><strong>ID : Pas encore attribué</strong></h3><br>
					<legend>Ajouter un utilisateur</legend>
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
						<label for= "password"><strong>Mot de passe : </strong></label>
						<input class="form-control" type="text" name="password">
					</div>
					<fieldset>
						<legend>Choix de la newsletter : </legend>
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
						</div>
					</fieldset>
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
					</div><br>
					<input class="btn btn-primary" type="submit" value="Ajouter un utilisateur"></input>
				</fieldset>
			</form>
		</section>
	</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>