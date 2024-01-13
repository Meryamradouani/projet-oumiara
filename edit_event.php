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

// Vérifier si l'ID de l'événement est fourni dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_evenement = $_GET['id'];

    // Récupérer les détails de l'événement depuis la base de données
    $query = "SELECT * FROM evenement WHERE id_evenement = $id_evenement";
    $result = mysqli_query($link, $query);

    // Vérifier les erreurs de la requête
    if (!$result) {
        die("Erreur de la requête : " . mysqli_error($link));
    }

    // Vérifier si l'événement existe
    if (mysqli_num_rows($result) > 0) {
        $rowEvenement = mysqli_fetch_assoc($result);
    } else {
        echo "Événement non trouvé.";
        exit();
    }
} else {
    echo "ID de l'événement non spécifié.";
    exit();
}

// Traiter le formulaire d'édition s'il est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nouveau_titre = isset($_POST['nouveau_titre']) ? $_POST['nouveau_titre'] : '';
    $nouvelle_description = isset($_POST['nouvelle_description']) ? $_POST['nouvelle_description'] : '';
    $nouvelle_date_debut = isset($_POST['nouvelle_date_debut']) ? $_POST['nouvelle_date_debut'] : '';
    $nouvelle_date_fin = isset($_POST['nouvelle_date_fin']) ? $_POST['nouvelle_date_fin'] : '';
    $nouveau_lieu = isset($_POST['nouveau_lieu']) ? $_POST['nouveau_lieu'] : '';
    $nouveau_createur = isset($_POST['nouveau_createur']) ? $_POST['nouveau_createur'] : '';

    // Mettre à jour les données dans la table evenements
    $update_query = "UPDATE evenement SET 
                     titre = '$nouveau_titre', 
                     description = '$nouvelle_description', 
                     date_debut = '$nouvelle_date_debut', 
                     date_fin = '$nouvelle_date_fin', 
                     lieu = '$nouveau_lieu', 
                     createur = '$nouveau_createur'
                     WHERE id_evenement = $id_evenement";

    $update_result = mysqli_query($link, $update_query);

    // Vérifier les erreurs de la requête de mise à jour
    if (!$update_result) {
        die("Erreur de la requête de mise à jour : " . mysqli_error($link));
    }

    // Rediriger vers la page des événements après la mise à jour
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Éditer un Événement</title>
    <style>/* Add these styles to your existing styles.css or in a <style> tag in your HTML file */

body {
    font-family: Arial, sans-serif;
    background-color: #dff2ff;
    margin: 0;
    padding: 0;
    text-align: center;
}

h1 {
    color: #22427c;
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
    background-color: #22427c;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}

a {
    display: inline-block;
    margin-top: 10px;
    color: #22427c;
    text-decoration: none;
}

a:hover {
    color: #2980b9;
}
</style>
</head>
<body>
    <h1>Éditer un Événement</h1>

    <!-- Formulaire pour éditer l'événement -->
    <form action="edit_event.php?id=<?php echo $id_evenement; ?>" method="post">
        <label for="nouveau_titre">Nouveau Titre :</label>
        <input type="text" name="nouveau_titre" value="<?php echo $rowEvenement['titre']; ?>" required>

        <label for="nouvelle_description">Nouvelle Description :</label>
        <textarea name="nouvelle_description" required><?php echo $rowEvenement['description']; ?></textarea>

        <label for="nouvelle_date_debut">Nouvelle Date de début :</label>
        <input type="date" name="nouvelle_date_debut" value="<?php echo $rowEvenement['date_debut']; ?>" required>

        <label for="nouvelle_date_fin">Nouvelle Date de fin :</label>
        <input type="date" name="nouvelle_date_fin" value="<?php echo $rowEvenement['date_fin']; ?>">

        <label for="nouveau_lieu">Nouveau Lieu :</label>
        <input type="text" name="nouveau_lieu" value="<?php echo $rowEvenement['lieu']; ?>" required>

        <label for="nouveau_createur">Nouveau Créateur :</label>
        <input type="text" name="nouveau_createur" value="<?php echo $rowEvenement['createur']; ?>" required>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <a href="admin.php">Retour à la liste des événements</a><br><br>
</body>
</html>
