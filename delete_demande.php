<?php
session_start();
include('connexion.php');

// Check if the request has an 'id' parameter
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_demande = $_GET['id'];

    // Perform the deletion
    $query = "DELETE FROM demande WHERE id_demande = $id_demande";
    $result = mysqli_query($link, $query);

    if($result) {
        // Deletion successful
        $_SESSION['success_message'] = "La demande a été supprimée avec succès.";
    } else {
        // Deletion failed
        $_SESSION['error_message'] = "Erreur lors de la suppression de la demande : " . mysqli_error($link);
    }
} else {
    // Invalid or missing 'id' parameter
    $_SESSION['error_message'] = "Erreur : ID de demande non valide.";
}

// Redirect back to the admin page
header("location: admin.php");
exit;
?>
