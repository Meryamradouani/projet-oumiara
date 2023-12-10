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
    <?php
// Connexion à la base de données (assurez-vous d'adapter les informations de connexion)
$mysqli = new mysqli("localhost", "root", "", "gestion");

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

// Récupérer les événements depuis la base de données
$result = $mysqli->query("SELECT id_evenement, titre FROM evenement");

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    // Afficher les liens pour chaque événement
    while ($row = $result->fetch_assoc()) {
        echo '<a href="inscription.php?event_id=' . $row['id_evenement'] . '">S\'inscrire à ' . $row['titre'] . '</a>';
    }
} else {
    echo "Aucun événement trouvé.";
}

// Fermer la connexion à la base de données
$mysqli->close();
?>

   
</body>
</html>
