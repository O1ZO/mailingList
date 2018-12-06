

<?php $title = 'Modifier une newsletter'; ?>

<?php ob_start();?>
<h1>Espace Administrateur</h1><br>

<a href="index.php?action=listNewsletters">Retour à la liste des newsletter</a>

	<div>
		<form action="index.php?action=updateNl&amp;id=<?= $getNewsletter['id'] ?>" method="post">
			<fieldset>
				<legend><h2>Modifier le contenu d'une newsletter</h2></legend>
				<label for= "newTitle"><strong>Nouveau titre : </strong></label>
				<input type="text" name="newTitle" value="<?= htmlspecialchars($getNewsletter['title']) ?>"><br><br>
				<label for= "newSubject"><strong>Nouveau sujet : </strong></label>
				<input type="text" name="newSubject" value="<?= htmlspecialchars($getNewsletter['subject']) ?>"><br><br>
				<label for= "newContent"><strong>Nouveau contenu : </strong></label>
				<textarea name="newContent" rows="15" cols="80"><?= htmlspecialchars($getNewsletter['content']) ?></textarea><br><br>
				<input type="submit" value="Confirmer les changements"></input>
			</fieldset>
		</form>
	</div>

	
<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>