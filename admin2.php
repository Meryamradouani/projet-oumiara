<?php
session_start();

// Vérifier si l'utilisateur est connecté et a le rôle d'administrateur
if (!isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === false ) {
    // Rediriger vers la page d'accueil si l'utilisateur n'est pas connecté en tant qu'administrateur
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page Admin</title>
    <!-- Ajoutez vos liens vers les feuilles de style et les scripts ici -->
</head>
<body>

<!-- Barre de Navigation ou contenu spécifique à la page d'administration -->
<nav>
    <ul>
        <li><a href="admin.php">Tableau de bord</a></li>
        <li><a href="gestion_utilisateurs.php">Gestion des utilisateurs</a></li>
        <!-- Ajoutez d'autres liens vers des fonctionnalités d'administration si nécessaire -->
    </ul>
</nav>

<div>
    <h1>Bienvenue sur la page d'administration</h1>
    <!-- Ajoutez du contenu spécifique à la page d'administration ici -->
</div>

<!-- Ajoutez vos scripts supplémentaires ici -->

</body>
</html>
