<?php
session_start();// Inclure le fichier de configuration pour la connexion à la base de données
include('connexion.php');

// Récupérer les événements à venir depuis la base de données
$query = "SELECT * FROM evenement ORDER BY date_debut ASC";
$result = mysqli_query($link, $query);

// Vérifier les erreurs de la requête
if (!$result) {
    die("Erreur de la requête : " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Accueil</title>
</head>
<body>
    <h1>Événements à venir</h1>

    <?php
    // Afficher la liste des événements à venir
    while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<img src='{$row['photo']}' alt='Photo de l'événement'>";
            echo "<h2>{$row['titre']}</h2>";
            echo "<p>Date de debut : {$row['date_debut']}</p>";
            echo "<p>Date de fin : {$row['date_fin']}</p>";
            echo "<p>Lieu : {$row['lieu']}</p>";
        
            // Formulaire pour envoyer l'ID de l'événement à eventDetails.php
            echo "<form action='eventDetails.php' method='post'>";
            echo "<input type='hidden' name='id_evenement' value='{$row['id_evenement']}'>";
            echo "<button type='submit'>Détails</button>";
            echo "</form>";
        
            echo "</div>";
        }
        
        

    

    // Libérer le résultat de la requête
    mysqli_free_result($result);

    // Fermer la connexion à la base de données
    mysqli_close($link);
    ?>
</body>
</html>
