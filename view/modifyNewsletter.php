

<?php $title = 'Modifier une newsletter'; ?>

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
	<a class="btn btn-primary btn-lg" href="index.php?action=listNewsletters">Retour à la liste des newsletter</a>
</div><br>

<div class="row">
	<div class="container">
		<section class="col-lg-12">
			<form class="well" action="index.php?action=updateNl&amp;id=<?= $getNewsletter['id'] ?>" method="post">
				<fieldset>
					<legend>Modifier le contenu d'une newsletter</legend>
					<div class="form-group">
						<label for= "newTitle"><strong>Nouveau titre : </strong></label>
						<input class="form-control" type="text" name="newTitle" value="<?= htmlspecialchars($getNewsletter['title']) ?>">
					</div>
					<div class="form-group">
						<label for= "newSubject"><strong>Nouveau sujet : </strong></label>
						<input class="form-control" type="text" name="newSubject" value="<?= htmlspecialchars($getNewsletter['subject']) ?>">
					</div>
					<div class="form-group">
						<label for= "newContent"><strong>Nouveau contenu : </strong></label>
						<textarea class="form-control" name="newContent" rows="15" cols="80"><?= htmlspecialchars($getNewsletter['content']) ?></textarea>
					</div><br>
					<input class="btn btn-primary" type="submit" value="Confirmer les changements"></input>
				</fieldset>
			</form>
		</section>
	</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>