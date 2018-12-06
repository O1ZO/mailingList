<?php 

//Connection à la base de données

function dbConnect()
{
	$db = new PDO('mysql:host=localhost;dbname=mailingList;charset=utf8', 'root', '');

	return $db;	
}

//Récupération des données de tous les utilisateurs

function getUsersData()
{
	$db = dbConnect();

	$users_data = $db->query('SELECT * FROM users ORDER BY id');


	return $users_data;
}

//Récupération des données d'un utilisateur

function getUserData($userId)
{
	$db = dbConnect();

	$req = $db->prepare('SELECT * FROM users WHERE id = ?');
	$req->execute(array($userId));
	$userData = $req->fetch();

	return $userData;
}

//Suppression d'un utilisateur

function deleteUser($userId)
{
	$db = dbConnect();

	$req = $db->prepare('DELETE FROM users WHERE id = ?');
	$req->execute(array($userId));

	
}

function addSubscriber($name, $firstName, $email, $nlId)
{
	$db =dbConnect();

	$req = $db->prepare('INSERT INTO users(name, firstName, email, newsletterId) VALUES(:name, :firstName, :email, :newsletterId)');
	$req->execute(array(
		'name' => $name,
		'firstName' => $firstName,
		'email' => $email,
		'newsletterId' => $nlId)
	);
}

//Ajouter un utilisateur

function add($login, $name, $firstName, $email, $password, $nlId, $adminRights)
{
	$db =dbConnect();

	$req = $db->prepare('INSERT INTO users(login, name, firstName, email, password, newsletterId, adminRights) VALUES(:login, :name, :firstName, :email, :password, :newsletterId, :adminRights)');
	$req->execute(array(
		'login' => $login,
		'name' => $name,
		'firstName' => $firstName,
		'email' => $email,
		'password' => $password,
		'newsletterId' => $nlId,
		'adminRights' => $adminRights)
	);
}

//Modification des données de l'utilisateur

function updateData($userId, $login, $name, $firstName, $email, $password,$newsletterId, $adminRights)
{
	$db = dbConnect();

	$req = $db->prepare('UPDATE users SET login = :newLogin, name = :newName, firstName = :newFirstName, email = :newEmail, password= :newPassword, newsletterId = :newNewsletterId, adminRights = :adminRights WHERE id = :id');
	$req->execute(array(
		'id' => $userId,
		'newLogin' => $login,
		'newName' => $name,
		'newFirstName' => $firstName,
		'newEmail' => $email,
		'newPassword' => $password,
		'newNewsletterId' => $newsletterId,
		'adminRights' => $adminRights)
		);
}

//Récupération de la liste des newsletters

function getNewsletters()
{
	$db = dbConnect();

	$listNewsletters = $db->query('SELECT * FROM newsletters');


	return $listNewsletters;
}

//Récupération du contenu d'une newsletter

function getNewsletter($nlId)
{
	$db = dbConnect();

	$req = $db->prepare('SELECT * FROM newsletters WHERE id = ?');
	$req->execute(array($nlId));
	$nlData = $req->fetch();

	return $nlData;
}

//Modification d'une newsletter

function updateNewsletter($nlId, $nlTitle, $nlSubject, $nlContent)
{
	$db = dbConnect();

	$req = $db->prepare('UPDATE newsletters SET title = :newTitle, subject = :newSubject, content = :newContent WHERE id = :id');
	$req->execute(array(
		'id' => $nlId,
		'newTitle' => $nlTitle,
		'newSubject' => $nlSubject,
		'newContent' => $nlContent)
		);
}

//Récupération des abonnés à une newsletter donnée

function getSubscribers($nlId)
{
	$db = dbConnect();

	$subscribers = $db->prepare('SELECT id, login, name, firstName, email FROM users WHERE newsletterId = :newsletterId ORDER BY id');
	$subscribers->execute(array( 'newsletterId' => $nlId));

	return $subscribers;
}

//Suppression d'un utilisateur de la liste des abonnés à une newsletter

function removeSubscriber($subId)
{
	$db = dbConnect();

	$req = $db->prepare('UPDATE users SET newsletterId = NULL WHERE id = :subId');
	$req->execute(array('subId' => $subId));
}

//Envoi d'email

function sendMail ($email, $sub, $content)
{

	ini_set('max_execution_time', 0);

	$mail = $email; 

	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}

	$message_txt = $content;
	$message_html = "<html><head></head><body>$content</body></html>";

 

	$boundary = "-----=".md5(rand());

 

	$sujet = $sub;

 

	$header = "From: \"no_reply\"<no.reply.7357@gmail.com>".$passage_ligne;
	$header.= "Reply-to: \"no_reply\" <no.reply.7357@gmail.com>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

 

	$message = $passage_ligne."--".$boundary.$passage_ligne;

	$message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;

	$message.= $passage_ligne."--".$boundary.$passage_ligne;

	$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
 
	mail($mail,$sujet,$message,$header);

}