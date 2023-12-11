<?php
include('connexion.php');

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    // Supprimer l'événement de la base de données
    $query = "DELETE FROM evenements WHERE id = $eventId";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Erreur de la requête : " . mysqli_error($conn));
    }

    // Rediriger l'utilisateur vers la page de gestion des événements après la suppression
    header("Location: admin.php");
    exit();
} else {
    die("ID d'événement non spécifié.");
}
?>
