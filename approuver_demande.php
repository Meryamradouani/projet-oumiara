<?php
include('connexion.php');
session_start();
if(!isset($_SESSION['admin'])){
    header('location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id_demande = $_GET['id'];

    // Récupérer les détails de la demande
    $queryDemande = "SELECT * FROM demande WHERE id_demande = $id_demande";
    $resultDemande = mysqli_query($link, $queryDemande);

    if ($resultDemande && mysqli_num_rows($resultDemande) > 0) {
        $rowDemande = mysqli_fetch_assoc($resultDemande);

        // Insérer les détails dans la table evenement
        $queryInsertEvenement = "INSERT INTO evenement 
                                (date_debut, date_fin, lieu, titre, description, photo, createur) 
                                VALUES 
                                ('{$rowDemande['date_debut']}', '{$rowDemande['date_fin']}', '{$rowDemande['lieu']}', '{$rowDemande['titre']}', '{$rowDemande['description']}', '{$rowDemande['photo']}', '{$rowDemande['createur']}')";
        $resultInsertEvenement = mysqli_query($link, $queryInsertEvenement);

        // Récupérer l'identifiant de l'événement nouvellement créé
        $id_evenement = mysqli_insert_id($link);


        // Supprimer la demande (facultatif, en fonction de vos besoins)
        $queryDeleteDemande = "DELETE FROM demande WHERE id_demande = $id_demande";
        $resultDeleteDemande = mysqli_query($link, $queryDeleteDemande);

        header('Location: admin.php');
        exit();

    // Libérer le résultat de la requête de la demande
    mysqli_free_result($resultDemande);
} else {
    echo "Méthode de requête non autorisée ou ID de demande non spécifié.";
}}

// Fermer la connexion à la base de données
mysqli_close($link);
?>
