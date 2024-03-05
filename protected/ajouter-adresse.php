<?php

// Démarrage de la session
session_start();

// Vérification si l'utilisateur est connecté, sinon redirection vers la page de connexion
if (empty($_SESSION['user_id'])) {
    header('Location: /connexion.php'); // Redirection vers la page de connexion
    die; // Arrêt de l'exécution du script
}

// Vérification si la requête est de type POST et si le formulaire d'adresse a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['address_form_submit'])) {

    // Inclusion du fichier de gestion des formulaires
    require '../lib/form.lib.php';

    // Validation des champs requis du formulaire
    $errors = checkFormRequiredsFields($_POST);

    // Vérification s'il n'y a pas d'erreurs de validation
    if (empty($errors)) {

        try {
            // Inclusion du fichier de gestion des clients
            require '../lib/customer.lib.php';

            // Ajout de l'adresse pour le client connecté
            $addressId = addAddressForCustomer($_POST['address'], $_SESSION['user_id']);

            // Définition d'un message de succès
            $alert = [
                'status' => 'success',
                'message' => 'Adresse enregistrée avec succès.'
            ];
        } catch (Exception $e) {
            // En cas d'exception, définir un message d'erreur
            $alert = [
                'status' => 'danger',
                'message' => $e->getMessage()
            ];
        }
    }
}

// Inclusion du template pour afficher le formulaire d'ajout d'adresse
require '../templates/protected/ajouter-adresse.html.php';
