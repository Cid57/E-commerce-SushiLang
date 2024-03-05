<?php

// Démarrage de la session
session_start();

// Vérification si l'utilisateur est connecté, sinon redirection vers la page de connexion
if (empty($_SESSION['user_id'])) {
    header('Location: /connexion.php'); // Redirection vers la page de connexion
    die; // Arrêt de l'exécution du script
}

// Inclusion du fichier de connexion à la base de données
require '../data/db-connect.php';

// Préparation de la requête SQL pour récupérer les adresses de l'utilisateur connecté
$query = $dbh->prepare("SELECT address.* FROM address JOIN customer_address ON customer_address.id_address = address.id_address WHERE customer_address.id_customer = :id_customer");

// Exécution de la requête avec l'ID de l'utilisateur connecté
$query->execute([
    'id_customer' => $_SESSION['user_id'], // ID de l'utilisateur récupéré depuis la session
]);

// Récupération de toutes les adresses associées à l'utilisateur
$addresses = $query->fetchAll();

// Inclusion du template pour afficher les adresses de l'utilisateur
require '../templates/protected/adresse.html.php';
