<?php

require('model/model.php');

// Controlleur gérant l'affichage des données de tous les utilisateurs

function listUsersData()
{
	$usersData = getUsersData();

	require('view/listUsersData.php');
}

//Controlleur gérant l'affichage de la page de modification des données de l'utilisateur

function modifyUser()
{
	$user_data = getUserData($_GET['id']);

	require ('view/modifyUserData.php');
}

//Controlleur gérant l'affichage de la page d'ajout d'un utilisateur

function addUser()
{
	require ('view/addUser.php');
}


//Controlleur gérant l'affichage d'abonnement aux newsletters

function newsletterSubscription()
{

	require ('view/newsletterSubscription.php');
}

//Controlleur gérant l'affichage de la page de connexion administrateur

function adminConnexion()
{

	require ('view/adminConnexion.php');
}

//Controlleur gérant l'affichage de la liste des newsletters

function listNewsletters()
{
	$listNewsletters = getNewsletters();

	require ('view/listNewsletters.php');
}

//Controlleur gérant l'affichage de la page de modification d'une newsletter

function modifyNewsletter()
{
	$getNewsletter = getNewsletter($_GET['nlId']);

	require ('view/modifyNewsletter.php');
}

//Controlleur gérant l'affichage du menu administrateur

function adminMenu()
{
	require ('view/adminMenu.php');
}

//Controlleur gérant l'affichage de la liste des abonnés d'une newsletter donnée

function listSubscribers()
{
	$getNewsletter = getNewsletter($_GET['nlId']);
	$subscribers = getSubscribers($_GET['nlId']);

	require ('view/listSubscribers.php');
}
