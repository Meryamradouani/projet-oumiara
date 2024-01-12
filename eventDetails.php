<?php
session_start();
include('connexion.php');
// Vérifier si l'ID de l'événement a été soumis via le formulaire
if (isset($_POST['id_evenement'])) {
    // Récupérer l'ID de l'événement depuis le formulaire
    $eventId = $_POST['id_evenement'];

    // Requête pour récupérer les détails de l'événement spécifié
    $query = "SELECT * FROM evenement WHERE id_evenement = $eventId";
    $result = mysqli_query($link, $query);

    // Vérifier les erreurs de la requête
    if (!$result) {
        die("Erreur de la requête : " . mysqli_error($link));
    }

    // Vérifier si des résultats ont été trouvés
    if (mysqli_num_rows($result) > 0) {
        // Récupérer les détails de l'événement
        $eventDetails = mysqli_fetch_assoc($result);
    } else {
        // Afficher un message si l'événement n'est pas trouvé
        die("Événement non trouvé.");
    }

    // Libérer le résultat de la requête
    mysqli_free_result($result);
} else {
    // Afficher un message si l'ID de l'événement n'est pas spécifié
    die("ID d'événement non spécifié.");
}

// Traitement du formulaire de commentaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentaire'])) {
    // Récupérer le contenu du commentaire
    $contenuCommentaire = $_POST['commentaire'];

    // Insérer le commentaire dans la base de données
    $insertQuery = "INSERT INTO commentaire (UTILISATEUR_id_utilisateur, EVENEMENT_id_evenement, contenu, date) VALUES (1,'$eventId', '$contenuCommentaire', NOW())";
    $insertResult = mysqli_query($link, $insertQuery);

    // Vérifier les erreurs de l'insertion
    if (!$insertResult) {
        die("Erreur lors de l'ajout du commentaire : " . mysqli_error($link));
    }
}

// Récupérer les commentaires pour cet événement
$commentairesQuery = "SELECT * FROM commentaire WHERE EVENEMENT_id_evenement = $eventId ORDER BY date DESC";
$commentairesResult = mysqli_query($link, $commentairesQuery);

// Vérifier les erreurs de la requête
if (!$commentairesResult) {
    die("Erreur lors de la récupération des commentaires : " . mysqli_error($link));
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
    <!-- Afficher la photo de l'événement -->
    <img src="<?= $eventDetails['photo'] ?>" alt="Photo de l'événement">
    
    <!-- Afficher le titre de l'événement -->
    <h1><?= $eventDetails['titre'] ?></h1>
    
    <!-- Afficher les détails de l'événement -->
    <p>Date de début : <?= $eventDetails['date_debut'] ?></p>
    <p>Date de fin : <?= $eventDetails['date_fin'] ?></p>
    <p>Lieu : <?= $eventDetails['lieu'] ?></p>
    <p>Description : <?= $eventDetails['description'] ?></p>
    <p>Créateur : <?= $eventDetails['createur'] ?></p>
    <!-- Formulaire pour ajouter un commentaire -->
    <form method="post" action="">
        <label for="commentaire"></label>
        <textarea name="commentaire" id="commentaire" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" value="Ajouter commentaire">
    </form>
    <!-- Afficher le lien pour s'inscrire -->
    <a href="inscription.php?event_id=<?= $eventDetails['id_evenement'] ?>">S'inscrire à <?= $eventDetails['titre'] ?></a>

    <!-- Afficher les commentaires -->
    <h2>Commentaires</h2>
    <ul>
        <?php
        // Afficher les commentaires
        while ($commentaire = mysqli_fetch_assoc($commentairesResult)) {
            echo "<li>{$commentaire['contenu']} - {$commentaire['date']}</li>";
        }

        // Libérer le résultat de la requête des commentaires
        mysqli_free_result($commentairesResult);
        ?>
    </ul>

    <?php
    // Fermer la connexion à la base de données
    mysqli_close($link);
    ?>
</body>
</html>