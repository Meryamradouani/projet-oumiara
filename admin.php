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

// Vérifier si le formulaire pour créer un nouvel événement est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $date_debut = isset($_POST['date_debut']) ? $_POST['date_debut'] : '';
    $date_fin = isset($_POST['date_fin']) ? $_POST['date_fin'] : '';
    $lieu = isset($_POST['lieu']) ? $_POST['lieu'] : '';
    $createur = isset($_POST['createur']) ? $_POST['createur'] : '';

    // Gérer le téléchargement de la photo
    // Gérer le téléchargement de la photo
$dossier = 'photo/';
$nom_photo = '';
$chemin_photo = ''; // Initialiser la variable

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
    $infosfichier = pathinfo($_FILES['photo']['name']);
    $extension_upload = strtolower($infosfichier['extension']);
    $extensions_autorisees = array('png', 'jpeg', 'jpg');

    if (in_array($extension_upload, $extensions_autorisees)) {
        $nom_photo = $titre . "." . $extension_upload;
        $chemin_photo = $dossier . $nom_photo;

        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_photo)) {
            exit("Problème dans le téléchargement de l'image, Réessayez");
        }
    } else {
        exit("Erreur, Veuillez insérer une image svp (extensions autorisées: png, jpeg, jpg)");
    }
}

// Insérer les données dans la table evenements
$query = "INSERT INTO `evenement` (`date_debut`, `lieu`, `date_fin`, `description`, `titre`, `photo`, `createur`) 
          VALUES ('$date_debut', '$lieu', '$date_fin', '$description', '$titre', '$chemin_photo', '$createur')";
$result = mysqli_query($link, $query);

// Vérifier les erreurs de la requête
if (!$result) {
    die("Erreur de la requête : " . mysqli_error($link));
}

}

// Récupérer la liste des événements depuis la base de données
$queryEvenements = "SELECT * FROM evenement";
$resultEvenements = mysqli_query($link, $queryEvenements);

// Vérifier les erreurs de la requête
if (!$resultEvenements) {
    die("Erreur de la requête pour les événements : " . mysqli_error($link));
}

// Récupérer la liste des inscriptions depuis la base de données
$queryInscriptions = "SELECT inscription.*, utilisateur.nom, utilisateur.prenom, utilisateur.email, evenement.titre AS titre_evenement
                     FROM inscription
                     JOIN utilisateur ON inscription.UTILISATEUR_id_utilisateur = utilisateur.id_utilisateur
                     JOIN evenement ON inscription.EVENEMENT_id_evenement = evenement.id_evenement";
$resultInscriptions = mysqli_query($link, $queryInscriptions);

// Vérifier les erreurs de la requête
if (!$resultInscriptions) {
    die("Erreur de la requête pour les inscriptions : " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Gestion des événements</title>
</head>
<style>
    /* styles.css */ #left-menu {
            width: 200px;
            background-color: #333;
            color: #fff;
            text-align: left;
            padding: 10px;
            position: fixed;
            height: 100%;
            box-sizing: border-box;
        }

        #left-menu a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
        }

        #content {
            margin-left: 220px; /* Largeur du menu + espace */
            padding: 20px;
        }

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    text-align:center;
}

h1, h2 {
    color: #333;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
}

input,
textarea,
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}
</style>
<body>
<div id="left-menu">
        <a href="#form">Créer un événement</a>
        <a href="#list-events">Liste des événements</a>
        <a href="#list-inscriptions">Liste des inscriptions</a>
    </div>

    <!-- Contenu principal -->
    <div id="content">
    <h1>Gestion des événements</h1>

    <!-- Formulaire pour créer de nouveaux événements -->
    <form id="form" action="admin.php" method="post" enctype="multipart/form-data"> 
        <label for="titre">Titre :</label>
        <input type="text" name="titre" required>

        <label for="description">Description :</label>
        <textarea name="description" required></textarea>

        <label for="date">Date de debut  :</label>
        <input type="date" name="date_debut" required>

        <label for="date">Date de fin :</label>
        <input type="date" name="date_fin">

        <label for="lieu">Lieu :</label>
        <input type="text" name="lieu" required>

        <label for="createur">Créateur :</label>
        <input type="text" name="createur" required>

        <label for="photo">Photo:</label>
        <input type="file" name="photo" required>

        <button type="submit">Créer un événement</button>
    </form>

    <h2 id="list-events">Liste des événements existants</h2>
        <ul>
            <?php
            while ($rowEvenement = mysqli_fetch_assoc($resultEvenements)) {
                echo "<li>";
                echo "{$rowEvenement['titre']} ({$rowEvenement['date_debut']}) - <a href='edit_event.php?id={$rowEvenement['id_evenement']}'>Éditer</a> | <a href='delete_event.php?id={$rowEvenement['id_evenement']}'>Supprimer</a>";
                echo "</li>";
            }
            ?>
        </ul>

    <!-- Liste des inscriptions existantes -->
    <h2 id="list-inscriptions">Liste des inscriptions</h2>
    <ul>
        <?php
        while ($rowInscription = mysqli_fetch_assoc($resultInscriptions)) {
            echo "<li>";
            echo "{$rowInscription['nom']} {$rowInscription['prenom']} ({$rowInscription['email']}) s'est inscrit à l'événement '{$rowInscription['titre_evenement']}'";
            echo "</li>";
        }
        ?>
    </ul>
    <!-- Liste des demandes d'événements -->
<!-- Liste des demandes d'événements -->
<h2>Liste des demandes d'événements</h2>
<ul>
    <?php
    // Récupérer la liste des demandes depuis la base de données
    $queryDemandes = "SELECT demande.*, demandeur.Nom AS nom_demandeur, demandeur.prenom AS prenom_demandeur
                      FROM demande
                      JOIN demandeur ON demande.id_demandeur = demandeur.id_demandeur";
    $resultDemandes = mysqli_query($link, $queryDemandes);

    // Vérifier les erreurs de la requête
    if (!$resultDemandes) {
        die("Erreur de la requête pour les demandes : " . mysqli_error($link));
    }

    while ($rowDemande = mysqli_fetch_assoc($resultDemandes)) {
        echo "<li>";
        echo "<strong>{$rowDemande['titre']}</strong> ({$rowDemande['date_debut']}) - ";
        echo "Demandeur: {$rowDemande['nom_demandeur']} {$rowDemande['prenom_demandeur']} - ";
        echo "Lieu: {$rowDemande['lieu']} - Createur: {$rowDemande['createur']} -";
        echo "Infos: {$rowDemande['description']} <br>";
        echo "<a href='approuver_demande.php?id={$rowDemande['id_demande']}'>Approuver</a> | <a href='delete_demande.php?id={$rowDemande['id_demande']}'>Supprimer</a>";
        echo "</li>";
    }

    // Libérer le résultat de la requête des demandes
    mysqli_free_result($resultDemandes);
    ?>
</ul>





    <?php
    // Libérer le résultat de la requête des événements
    mysqli_free_result($resultEvenements);

    // Libérer le résultat de la requête des inscriptions
    mysqli_free_result($resultInscriptions);

    // Fermer la connexion à la base de données
    mysqli_close($link);
    ?>
</body>
</html>
