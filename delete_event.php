<?php
// Inclure le fichier de configuration pour la connexion à la base de données
include('connexion.php');
session_start();
if(!isset($_SESSION['admin'])){
    header('location: login.php');
}

// Vérifier si l'utilisateur est connecté et a le rôle d'administrateur
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // Rediriger vers la page d'accueil
    header('Location: index.php');
    exit(); // Assurez-vous de terminer le script après la redirection
}

// Vérifier si l'ID de l'événement est fourni dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_evenement = $_GET['id'];

    // Vérifier s'il existe des inscriptions associées à cet événement
    $check_inscriptions_query = "SELECT * FROM inscription WHERE EVENEMENT_id_evenement = $id_evenement";
    $check_inscriptions_result = mysqli_query($link, $check_inscriptions_query);

    // Vérifier les erreurs de la requête de vérification
    if (!$check_inscriptions_result) {
        die("Erreur de la requête de vérification : " . mysqli_error($link));
    }

    // Si des inscriptions existent, vous devez d'abord les supprimer
    if (mysqli_num_rows($check_inscriptions_result) > 0) {
        // Supprimer les inscriptions associées à cet événement
        $delete_inscriptions_query = "DELETE FROM inscription WHERE EVENEMENT_id_evenement = $id_evenement";
        $delete_inscriptions_result = mysqli_query($link, $delete_inscriptions_query);

        // Vérifier les erreurs de la requête de suppression des inscriptions
        if (!$delete_inscriptions_result) {
            die("Erreur de la requête de suppression des inscriptions : " . mysqli_error($link));
        }
    }

    // Maintenant, vous pouvez supprimer l'événement
    $delete_event_query = "DELETE FROM evenement WHERE id_evenement = $id_evenement";
    $delete_event_result = mysqli_query($link, $delete_event_query);

    // Vérifier les erreurs de la requête de suppression de l'événement
    if (!$delete_event_result) {
        die("Erreur de la requête de suppression de l'événement : " . mysqli_error($link));
    }

    // Rediriger vers la page des événements après la suppression
    header('Location: admin.php');
    exit();
} else {
    echo "ID de l'événement non spécifié.";
    exit();
}
?>
