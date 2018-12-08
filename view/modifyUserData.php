
<?php $title = 'Modifier un utilisateur'; ?>

<?php ob_start();?>

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

<?php
if (isset($_GET['action']) && $_GET['action'] == 'modify' || $_GET['action'] == 'update') {
	echo '<a href="index.php?action=listUsersData">Retour à la liste des utilisateurs</a>';
}
elseif (isset($_GET['nlId']) &&  $_GET['nlId'] > 0 && isset($_GET['action']) && $_GET['action'] == 'modifyFromNl' || $_GET['action'] == 'updateFromNl') {?>
	<a href="index.php?action=listSubscribers&amp;nlId=<?= $_GET['nlId'] ?>">Retour à la liste des abonnés</a>
<?php
}
?>

	<div>
		<form action="<?php if(isset($_GET['action']) && $_GET['action'] == 'modify'){?>index.php?action=update&amp;id=<?= $user_data['id'];}elseif(isset($_GET['action']) && $_GET['action'] == 'modifyFromNl'){?>index.php?action=updateFromNl&amp;id=<?= $user_data['id']?><?php if(isset($_GET['nlId']) && $_GET['nlId'] > 0){?>&amp;nlId=<?= $_GET['nlId']	;};}?>" method="post">
			<fieldset>
				<h3>ID : <?= $user_data['id'] ?></h3>
				<legend><h2>Modifier les données des utilisateurs</h2></legend>
				<label for= "newLogin"><strong>Nouveau pseudo : </strong></label>
				<input type="text" name="newLogin" value="<?= htmlspecialchars($user_data['login']) ?>"><br><br>
				<label for= "newName"><strong>Nouveau nom : </strong></label>
				<input type="text" name="newName" value="<?= htmlspecialchars($user_data['name']) ?>"><br><br>
				<label for= "newFirstName"><strong>Nouveau prenom : </strong></label>
				<input type="text" name="newFirstName" value="<?= htmlspecialchars($user_data['firstName']) ?>"><br><br>
				<label for= "newEmail"><strong>Nouvel email : </strong></label>
				<input type="text" name="newEmail" value="<?= htmlspecialchars($user_data['email']) ?>"><br><br>
				<label for= "newPassword"><strong>Nouveau mot de passe : </strong></label>
				<input type="text" name="newPassword" value="<?= htmlspecialchars($user_data['password']) ?>"><br><br>
				<fieldset>
					<legend><h3>Abonné à : </h3></legend>
					<input type="radio" name="newNewsletterId" value=1 <?php if($user_data['newsletterId'] == 1){echo 'checked';} ?> >
					<label for="newNewsletterId">Newsletter 1</label><br>
					<input type="radio" name="newNewsletterId" value=2 <?php if($user_data['newsletterId'] == 2){echo 'checked';} ?> >
					<label for="newNewsletterId">Newsletter 2</label><br>
					<input type="radio" name="newNewsletterId" value=3 <?php if($user_data['newsletterId'] == 3){echo 'checked';} ?> >
					<label for="newNewsletterId">Newsletter 3</label><br>
				</fieldset><br><br>
				<label for= "adminRights"><strong>Administrateur : </strong></label>
				<input type="radio" name="adminRights" value="oui" <?php if($user_data['adminRights'] == 'oui'){echo 'checked';} ?> >Oui</input>
				<input type="radio" name="adminRights" value="non" <?php if($user_data['adminRights'] == 'non'){echo 'checked';} ?> >Non</input><br><br>
				<input type="submit" value="Confirmer les changements"></input>
			</fieldset>
		</form>
	</div>

	
<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>