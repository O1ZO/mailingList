<?php $title = 'Abonnement à la newsletter'; ?>

<?php ob_start(); ?>


	<div class="row">
		<div class="container">
			<div class="col col-lg-10">
				<h1><strong>Abonnement à la newsletter</strong></h1>
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
				<form class="well" action="index.php?action=subscribe" method="post">
				<fieldset>
					<legend>Inscription à la newsletter</legend>
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
						<fieldset>
							<legend>Choisissez la newsletter désirée : </legend>
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
						</fieldset><br>
							<input class="btn btn-primary" type="submit" value="Envoyer"></input>
				</fieldset>
			</form>
			</section>
		</div>
	</div>
	

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>