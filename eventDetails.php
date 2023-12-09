<?php
session_start();
include('connexion.php');

if (isset($_POST['id_evenement'])) {
    $eventId = $_POST['id_evenement'];
    $query = "SELECT * FROM evenement WHERE id_evenement = $eventId";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Erreur de la requête : " . mysqli_error($link));
    }

    if (mysqli_num_rows($result) > 0) {
        $eventDetails = mysqli_fetch_assoc($result);
    } else {
        die("Événement non trouvé.");
    }

    mysqli_free_result($result);
} else {
    die("ID d'événement non spécifié.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Détails de l'événement</title>
</head>
<body>
    <img src="<?= $eventDetails['photo'] ?>" alt="Photo de l'événement">
    <h1><?= $eventDetails['titre'] ?></h1>
    <p>Date de début : <?= $eventDetails['date_debut'] ?></p>
    <p>Date de fin : <?= $eventDetails['date_fin'] ?></p>
    <p>Lieu : <?= $eventDetails['lieu'] ?></p>
    <p>Description : <?= $eventDetails['description'] ?></p>
    <p>Créateur : <?= $eventDetails['createur'] ?></p>

    <a href="inscription.php">S'inscrire</a>
   
</body>
</html>
