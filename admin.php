<?php
// Inclure le fichier de configuration pour la connexion à la base de données
include('connexion.php');
session_start();

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
<body>
    <h1>Gestion des événements</h1>

    <!-- Formulaire pour créer de nouveaux événements -->
    <form action="admin.php" method="post" enctype="multipart/form-data"> 
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

    <!-- Liste des événements existants avec des liens pour les éditer ou les supprimer -->
    <h2>Liste des événements existants</h2>
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
    <h2>Liste des inscriptions</h2>
    <ul>
        <?php
        while ($rowInscription = mysqli_fetch_assoc($resultInscriptions)) {
            echo "<li>";
            echo "{$rowInscription['nom']} {$rowInscription['prenom']} ({$rowInscription['email']}) s'est inscrit à l'événement '{$rowInscription['titre_evenement']}'";
            echo "</li>";
        }
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
