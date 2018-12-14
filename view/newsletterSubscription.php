<?php $title = 'Abonnement à la newsletter'; ?>

<?php ob_start(); ?>

<div class="container ">
	<nav class="navbar">
		<h1><strong>Abonnement à une Newsletter</strong> </h1>

		<form action="index.php?target=adminConnexion" method="post">
			<input class="btn btn-outline-primary text-center" type="submit" value="Espace Administrateur">
		</form>
	</nav>
</div>

<br>



<div class="container bg-light border rounded shadow"><br>
	<form class="" action="index.php?action=subscribe" method="post">
		<div class="row">
			<div class="col">
				<legend>Inscription à la Newsletter</legend>
				<div class="form-group">
					<label for="name">Nom : </label>
					<input class="form-control" type="text" name="name">
				</div>
				<div class="form-group">
					<label for="firstName">Prenom : </label>
					<input class="form-control" type="text" name="firstName">
				</div>
				<div class="form-group">
					<label for="email">E-mail : </label>
					<input class="form-control" type="email" name="email">
				</div>
			</div>
			<div class="col"><br><br><br>
				<legend>Choisissez la Newsletter désirée : </legend>
				<div class="radio">
					<label for="newsletter1" class="radio">
						<input type="radio" name="newsletter" value=1 id="newsletter1">
						Newsletter 1
					</label>
				</div>
				<div class="radio">
					<label for="newsletter2" class="radio">
						<input type="radio" name="newsletter" value=2 id="newsletter2">	
						Newsletter 2
					</label>
				</div>
				<div class="radio">
					<label for="newsletter3" class="radio">
						<input type="radio" name="newsletter" value=3 id="newsletter3">
						Newsletter 3
					</label>				
				</div>
			</div>
		</div>	
	</form><br>
	<div class="container d-flex justify-content-center">
		<input class="btn btn-success btn-lg shadow" type="submit" value="Envoyer"></input>
	</div><br>
</div>


<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>