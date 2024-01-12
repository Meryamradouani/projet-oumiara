<?php
session_start();
include('connexion.php');

// Vérifiez si le formulaire d'inscription a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $nom = $_POST['NOM'];
    $prenom = $_POST['PRENOM'];
    $email = $_POST['MAIL'];
    $fonctionalite = $_POST['FONCTIONALITE'];

    // Récupérez l'ID de l'événement à partir des données du formulaire
    $eventId = isset($_POST['eventId']) ? $_POST['eventId'] : null;

    // Vérifiez s'il y a un ID d'événement valide
    if ($eventId !== null) {
        // Vérifiez si l'utilisateur existe déjà dans la base de données
        $checkUserQuery = "SELECT id_utilisateur FROM utilisateur WHERE email = '$email'";
        $checkUserResult = mysqli_query($link, $checkUserQuery);

        if (mysqli_num_rows($checkUserResult) > 0) {
            // Utilisateur existant, récupérez son ID
            $user = mysqli_fetch_assoc($checkUserResult);
            $userId = $user['id_utilisateur'];
        } else {
            // Nouvel utilisateur, insérez-le dans la table UTILISATEUR
            $insertUserQuery = "INSERT INTO utilisateur (fonctionalite, nom, prenom, email) VALUES ('$fonctionalite', '$nom', '$prenom', '$email')";
            $insertUserResult = mysqli_query($link, $insertUserQuery);

            if ($insertUserResult) {
                // Récupérez l'id_utilisateur nouvellement créé
                $userId = mysqli_insert_id($link);
            } else {
                echo "Erreur lors de la création du profil utilisateur.";
                exit();
            }
        }

        // Vérifiez si l'utilisateur est déjà inscrit à cet événement
        $checkQuery = "SELECT * FROM inscription WHERE UTILISATEUR_id_utilisateur = $userId AND EVENEMENT_id_evenement = $eventId";
        $checkResult = mysqli_query($link, $checkQuery);

        if (mysqli_num_rows($checkResult) == 0) {
            // Insérez l'inscription dans la table INSCRIPTION
            $insertInscriptionQuery = "INSERT INTO inscription (UTILISATEUR_id_utilisateur, EVENEMENT_id_evenement) VALUES ($userId, $eventId)";
            $insertInscriptionResult = mysqli_query($link, $insertInscriptionQuery);

            if ($insertInscriptionResult) {
                echo "Inscription réussie à l'événement!";
            } else {
                echo "Erreur lors de l'inscription à l'événement.";
            }
        } else {
            echo "Vous êtes déjà inscrit à cet événement.";
        }
    } else {
        echo "Erreur : ID de l'événement non défini.";
    }
}

// Fermeture de la connexion
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription à un Événement</title>
    <style>
        label {
            width: 250px;
            display: inline-block;
        }
        body {
            background-color: rgb(35, 91, 144);
            color: white;
        }
        input {
            border-radius: 5px;
            width: 200px;
            height: 20px;
        }
    </style>
</head>
<body> 
    <h1>Inscription à un Événement</h1>
<fieldset>
    <form action="" method="POST" id="form" enctype="multipart/form-data">
        <?php
        // Ajoutez un champ caché pour stocker l'ID de l'événement
        $eventId = isset($_GET['event_id']) ? $_GET['event_id'] : null;
        echo "<input type='hidden' name='eventId' value='$eventId'>";
        ?>

        <label for="nom">NOM:</label>
        <input type="text" name="NOM" required="required"/><br><br>
        <label for="prenom">PRENOM :</label>
        <input type="text" name="PRENOM" required="required"/><br><br>
        <label for="log">LOGIN:</label>
        <input type="text" name="LOGIN" required="required"/><br><br>
        <label for="nom">E-MAIL:</label>
        <input type="text" name="MAIL" required="required"/><br><br>
        <label for="font">FONCTIONNALITE:</label>
        <select name="FONCTIONALITE">
            <option id="font" value="etudiant">ETUDIDIANT</option>
            <option value="professeur">PROFESSEUR</option>
        </select><br><br>
        <input type="submit" name="submit" value="S'inscrire" style="width: 208px;text-align: center; height:30px;"/>
    </form> </fieldset>    
</body>
</html>

