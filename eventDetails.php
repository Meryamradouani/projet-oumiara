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
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Styles pour l'en-tête */
        h1 {
            color: #22427C;
            margin-top: 20px;
        }

        /* Styles pour la photo de l'événement */
        .event-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        /* Styles pour les détails de l'événement */
        .event-details-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border: 1px solid #ddd;
        }

        .event-image {

            flex: 0 0 30%; /* Ajustez la largeur de l'image en fonction de vos besoins */
            margin-right: 10px;
            margin-left: 0px;
        }

        .event-details {
            flex: 0 0 40%; /* Ajustez la largeur des détails en fonction de vos besoins */
        }

        .event-details p {
            color: #333;
            margin-bottom: 10px;
        }

        /* Styles pour le formulaire de commentaire */
        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #22427C;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Styles pour les commentaires */
        h2 {
            color: #22427C;
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        /* Styles pour le lien d'inscription */
        a {
            display: inline-block;
            background-color: #22427C;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        a:hover {
            background-color: #18345F;
        }

        /* Styles pour le pied de page */
        footer {
            background-color: #22427C;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="event-details-container">
            <div class="event-image">
                <!-- Afficher la photo de l'événement -->
                <img src="<?= $eventDetails['photo'] ?>" alt="Photo de l'événement" style="width: 350px;">

            </div>
            <div class="event-details">
                <!-- Afficher le titre de l'événement -->
                <h1><?= $eventDetails['titre'] ?></h1>
                
                <!-- Afficher les détails de l'événement -->
                <p>Date de début : <?= $eventDetails['date_debut'] ?></p>
                <p>Date de fin : <?= $eventDetails['date_fin'] ?></p>
                <p>Lieu : <?= $eventDetails['lieu'] ?></p>
                <p>Description : <?= $eventDetails['description'] ?></p>
                <p>Créateur : <?= $eventDetails['createur'] ?></p>
                <a href="inscription.php?event_id=<?= $eventDetails['id_evenement'] ?>" class="link-container">S'inscrire à <?= $eventDetails['titre'] ?></a>
            </div>
        </div>
        
        <!-- Formulaire pour ajouter un commentaire -->
        <form method="post" action="" class="form-container">
            <label for="commentaire"></label>
            <textarea name="commentaire" id="commentaire" rows="4" cols="50"></textarea>
            <br>
            <input type="submit" value="Ajouter commentaire">
        </form>
           <!-- Afficher les commentaires -->
        <h2> Commentaires récents:</h2>
        <ul class="comments-container">
            <?php
            // Afficher les commentaires
            while ($commentaire = mysqli_fetch_assoc($commentairesResult)) {
                echo "<li>{$commentaire['contenu']} - {$commentaire['date']}</li>";
            }

            // Libérer le résultat de la requête des commentaires
            mysqli_free_result($commentairesResult);
            ?>
        </ul>
    </div>

    <!-- Pied de page -->
    <footer>
        <!-- Contenu du pied de page -->
    </footer>
</body>
</html>
