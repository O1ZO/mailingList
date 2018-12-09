
<?php $title = 'Modifier un utilisateur'; ?>

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
	<?php
	if (isset($_GET['action']) && $_GET['action'] == 'modify' || $_GET['action'] == 'update') {
		echo '<a class=" btn btn-primary btn-lg" href="index.php?action=listUsersData">Retour à la liste des utilisateurs</a>';
	}
	elseif (isset($_GET['nlId']) &&  $_GET['nlId'] > 0 && isset($_GET['action']) && $_GET['action'] == 'modifyFromNl' || $_GET['action'] == 'updateFromNl') {?>
		<a class=" btn btn-primary btn-lg" href="index.php?action=listSubscribers&amp;nlId=<?= $_GET['nlId'] ?>">Retour à la liste des abonnés</a>
		<?php
	}
	?>
</div><br>

<div class="row">
	<div class="container">
		<form class= "well" action="<?php if(isset($_GET['action']) && $_GET['action'] == 'modify'){?>index.php?action=update&amp;id=<?= $user_data['id'];}elseif(isset($_GET['action']) && $_GET['action'] == 'modifyFromNl'){?>index.php?action=updateFromNl&amp;id=<?= $user_data['id']?><?php if(isset($_GET['nlId']) && $_GET['nlId'] > 0){?>&amp;nlId=<?= $_GET['nlId']	;};}?>" method="post">
			<fieldset class="col-lg-8">
				<h3><strong>ID : #<?= $user_data['id'] ?></strong></h3><br>
				<legend>Modifier les données des utilisateurs</legend>
				<div class="form-group">
					<label for= "newLogin">Nouveau pseudo : </label>
					<input class="form-control" type="text" name="newLogin" value="<?= htmlspecialchars($user_data['login']) ?>">
				</div>
				<div class="form-group">
					<label for= "newName">Nouveau nom : </label>
					<input class="form-control" type="text" name="newName" value="<?= htmlspecialchars($user_data['name']) ?>">
				</div>
				<div class="form-group">
					<label for= "newFirstName">Nouveau prenom : </label>
					<input class="form-control" type="text" name="newFirstName" value="<?= htmlspecialchars($user_data['firstName']) ?>">
				</div>
				<div class="form-group">
					<label for= "newEmail">Nouvel email : </label>
					<input class="form-control" type="text" name="newEmail" value="<?= htmlspecialchars($user_data['email']) ?>">
				</div>
				<div class="form-group">
					<label for= "newPassword">Nouveau mot de passe : </label>
					<input class="form-control" type="text" name="newPassword" value="<?= htmlspecialchars($user_data['password']) ?>">
				</div>
			</fieldset>
			<fieldset class="col-lg-4">
				<legend>Abonné à : </legend>
				<div class="radio">
					<label for="newNewsletterId">
						<input type="radio" name="newNewsletterId" value=1 <?php if($user_data['newsletterId'] == 1){echo 'checked';} ?> >
						Newsletter 1
					</label>
				</div>
				<div class="radio">
					<label for="newNewsletterId">
						<input type="radio" name="newNewsletterId" value=2 <?php if($user_data['newsletterId'] == 2){echo 'checked';} ?> >
						Newsletter 2
					</label>
				</div>
				<div class="radio">
					<label for="newNewsletterId">
						<input type="radio" name="newNewsletterId" value=3 <?php if($user_data['newsletterId'] == 3){echo 'checked';} ?> >
						Newsletter 3
					</label>
				</div><br><br>
				<legend>Administrateur : </legend>
				<div class="radio">
					<label for="adminRights">
						<input type="radio" name="adminRights" value="oui" <?php if($user_data['adminRights'] == 'oui'){echo 'checked';} ?> >
						Oui
					</label>
				</div>
				<div class="radio">
					<label for="adminRights">
						<input type="radio" name="adminRights" value="non" <?php if($user_data['adminRights'] == 'non'){echo 'checked';} ?> >
						Non
					</label><br><br><br><br><br><br><br><br><br>
				</div>
			</fieldset>
			<div class="text-right">
			<input class="btn btn-success" type="submit" value="Confirmer les changements"></input>
			</div>
		</form>
	</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>