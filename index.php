<?php

session_start();

require('controller/controller.php');

//Routeur

try{
	if (isset($_GET['action']) && isset($_POST['name']) && isset($_POST['firstName']) && isset($_POST['email']) && isset($_POST['newsletter']) && $_GET['action'] == 'subscribe') {
		addSubscriber($_POST['name'], $_POST['firstName'], $_POST['email'], $_POST['newsletter']);
		sendMail($_POST['email'], 'Abonnement à la newsletter '.$_POST['newsletter'], "Bonjour !<br>Vous êtes bien abonné à la newsletter ".$_POST['newsletter'])." .";
		echo ('<script>alert("Votre abonnement est bien enregistré !");</script>');
		newsletterSubscription();

	}
	if (isset($_POST['adminLog']) && isset($_POST['adminPass'])) {
		$_SESSION['login'] = $_POST['adminLog'];
		$_SESSION['password'] = $_POST['adminPass'];
	}

	if (isset($_GET['target']) && $_GET['target'] == 'adminConnexion') {
		adminConnexion();
	}

	elseif (isset($_GET['log'])) {
		if ($_GET['log'] == 'admin') {
			if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
				if ($_SESSION['login'] == 'admin' && $_SESSION['password'] == 'admin') {
					adminMenu();
				}else{
					echo "L'identifiant ou le mot de passe sont erronés !";
				}
			}
			else{
				echo "Vous n'êtes pas enregistré comme administrateur !";
			}
		}
		elseif ($_GET['log'] == 'deconnect') {
			session_destroy();
			newsletterSubscription();
		}
	}
	elseif (isset($_SESSION['login']) && isset($_SESSION['password'])) {
		if ($_SESSION['login'] == 'admin' && $_SESSION['password'] == 'admin') {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'listUsersData') {
					listUsersData();
				}
				elseif ($_GET['action'] == 'addUser') {
					addUser();
				}
				elseif ($_GET['action'] == 'add') {
					if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['firstName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['newsletter']) && isset($_POST['adminRights'])) {
						add($_POST['login'], $_POST['name'], $_POST['firstName'], $_POST['email'], $_POST['password'], $_POST['newsletter'], $_POST['adminRights']);
						listUsersData();
					}
					else{
						echo 'Tous les champs ne sont pas renseigné !';
					}
				}
				elseif ($_GET['action'] == 'modify') {
					if (isset($_GET['id']) && $_GET['id'] > 0) {
						modifyUser();
					}
				}
				elseif ($_GET['action'] == 'update') {
					if (isset($_GET['id']) && $_GET['id'] > 0) {
						if (isset($_POST['newLogin']) || isset($_POST['newName']) || isset($_POST['newFirstName']) || isset($_POST['newEmail']) ||  isset($_POST['newNewsletterId']) || isset($_POST['adminRights'])) {

							updateData($_GET['id'], $_POST['newLogin'], $_POST['newName'], $_POST['newFirstName'], $_POST['newEmail'], $_POST['newPassword'], $_POST['newNewsletterId'], $_POST['adminRights']);
							modifyUser();
							echo ('<script>alert("Changements effectués !");</script>');
						}
					}
				}
				elseif ($_GET['action'] == 'updateFromNl') {
					if (isset($_GET['id']) && $_GET['id'] > 0) {
						if (isset($_POST['newLogin']) || isset($_POST['newName']) || isset($_POST['newFirstName']) || isset($_POST['newEmail']) ||  isset($_POST['newNewsletterId']) || isset($_POST['adminRights'])) {

							updateData($_GET['id'], $_POST['newLogin'], $_POST['newName'], $_POST['newFirstName'], $_POST['newEmail'], $_POST['newPassword'], $_POST['newNewsletterId'], $_POST['adminRights']);
							modifyUser();
							echo ('<script>alert("Changements effectués !");</script>');
						}
					}
				}
				elseif ($_GET['action'] == 'delete') {
					if (isset($_GET['id']) && $_GET['id'] > 0) {
						deleteUser($_GET['id']);
						listUsersData();
					}
				}
				elseif ($_GET['action'] == 'listNewsletters') {
					listNewsletters();
				}
				elseif ($_GET['action'] == 'modifyNl') {
					if (isset($_GET['nlId']) && $_GET['nlId'] > 0) {
						modifyNewsletter();
					}
				}
				elseif ($_GET['action'] == 'updateNl') {
					if (isset($_GET['id']) && $_GET['id'] > 0) {
						if (isset($_POST['newTitle']) || isset($_POST['newSubject']) || isset($_POST['newContent'])) {
							updateNewsletter($_GET['id'], $_POST['newTitle'], $_POST['newSubject'], $_POST['newContent']);
							listNewsletters();
						}
					}
				}
				elseif ($_GET['action'] == 'modifyFromNl') {
					if (isset($_GET['id']) && $_GET['id'] > 0) {
						modifyUser();
					}
				}
				elseif ($_GET['action'] == 'remove') {
					if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['nlId']) && $_GET['nlId'] > 0){
						removeSubscriber($_GET['id']);
						listSubscribers();
					}
				}
				elseif ($_GET['action'] == 'listSubscribers') {
					if (isset($_GET['nlId']) && $_GET['nlId'] > 0) {
						listSubscribers();
					}	
				}
			}
			else
			{
				session_destroy();
				newsletterSubscription();
			}
		}
	}
	
	else
	{
		newsletterSubscription();
	}

	
	
	
}
catch(Exception $e){
	echo 'Erreur : ' . $e->getMessage();
}