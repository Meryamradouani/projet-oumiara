
<?php
session_start();
// Vérifier si l'utilisateur est connecté
$showLoginButton = true;
$showLogoutButton = false;
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    if (isset($_SESSION['login'])) {
    // Utilisateur connecté, afficher le bouton de déconnexion
    $showLogoutButton = true;
    $showLoginButton = false;
} else {
    $showLoginButton = true;
    $showLogoutButton = false;

 
}
}
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

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf_8" />
		<title>creer un compte</title> 
    <style>
   
    .container1{
            background-image: url('photo/demende.jpg');
            background-size: 1000PX;
            background-repeat: no-repeat; 
            margin: 0;
            padding: 90px;
            display: flex;
            justify-content: right;
            align-items: center;
            height: 100vh;
            font-family: "Nunito";
        }
    h1 {
        font-size: 70px;
        font-family: "Eczar";
        margin-top: 6px;
        margin-bottom: 10px;
    }

    .card {
        border-radius: 30px;
        margin-bottom: 20px;
    }
    .navbar{
      background-color: #22427C;
    height:80PX;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000; 
    }

    .card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }
    /* Styles pour le footer */
    .footer {
    background-color: #22427C; /* Couleur de fond */
    color: white; /* Couleur du texte */
    height: 400px; /* Ajustez la propriété de height pour modifier la hauteur */
    text-align: center; /* Alignement du texte */
}
/* Styles pour la section du logo */
.footer img {
    width: 100%; /* La largeur du logo prend toute la largeur de son conteneur */
    max-width: 300px; /* Largeur maximale du logo */
    margin-bottom: 20px; /* Marge en bas du logo */
}

/* Styles pour les liens dans les colonnes */
.footer a {
    color: white; /* Couleur du texte des liens */
    text-decoration: none; /* Pas de soulignement */
}

/* Styles pour les colonnes */
.footer .col {
    margin-bottom: 20px; /* Espacement en bas de chaque colonne */
}

/* Styles pour la section Google Maps */
.footer iframe {
    width: 100%; /* La carte Google Maps prend toute la largeur de son conteneur */
    height: 150px; /* Hauteur de la carte Google Maps */
    border: 0; /* Pas de bordure */
    margin-bottom: 20px; /* Marge en bas de la carte */
}

/* Styles pour le texte du bas du footer */
.footer .text-center {
    background-color: rgba(0, 0, 0, 0.05); /* Couleur de fond légère */
    padding: 10px; /* Espacement intérieur */
}


    .card-title {
        font-size: 1.25rem;
    }
 
    @media (max-width: 768px) {
        .navbar-collapse {
            background-color: darkcyan;
        }

        .navbar-nav {
            flex-direction: column;
            align-items: flex-start;
        }

        .navbar-nav .nav-item {
            margin-right: 0;
        }

        .navbar-brand img {
            max-width: 80%;
        }
    }
    .navbar-nav .nav-link {
    color:#dff2ff !important; /* Couleur blanche pour les liens */
}

.navbar-nav .nav-link:hover {
    color: #dff2ff !important; /* Couleur au survol */
}
.btn-search {
    background-color: #dff2ff;
    color: #22427C;
}

.btn {
        background-color: #22427C;
        border-color: #22427C;
        color: white;
    }

/* Couleur du bouton Déconnexion */
.btn-login {
    background-color: #dff2ff;
    color: #22427C;
}

/* Couleur du bouton Déconnexion */
.btn-logout {
    background-color: #dff2ff;
    color: #22427C;
}

   
</style>
<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="npm i bootstrap-icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
</head>
<body>
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">   
     <a class="mr-3" href="index.php"><img src="photo/ensak.png" width="165PX" bheight="150px" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav d-flex w-100 justify-content-center">
        <li class="ml-3">
          <a href="club.php"class=" nav-link white bgcolor:white  mr-3">Club</a>
        </li>
        <li class="ml-3">
          <a href="event.php" class=" nav-link mr-3">Evénement</a>
        </li>
        <li class="ml-3">
          <a href="demande.php" class=" nav-link mr-3">ajouter Evénement</a>
        </li>
        <?php if (isset($showLoginButton) && $showLoginButton): ?>
          <li >
          <a href="pagelogin.php" class="btn btn-success btn-info mr-3 btn-login">login</a>
          </li>
        <?php endif; ?>

        <?php if (isset($showLogoutButton) && $showLogoutButton): ?>
          <li >
          <a href="logout.php" class="btn btn-success btn-info mr-3 ml-3 btn-logout">Déconnexion</a>
          </li>
        <?php endif; ?>
      </ul>
      <!-- Update your search form with this -->



    </div>
  </div>
</nav><br><br>
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
    <br>
    <footer class="footer mt-5 mb-5 text-white" style="background-color: #22427C; padding: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="ensak-logo.png" width="150" alt="logo">
                <hr/>
                <p>Ecole nationale de sciences appliquées</p>
                <p>Tél : (+212) 5 37 32 94 48</p>
                <p>Fax : (+212) 5 37 37 40 52</p>
            </div>
            <div class="col-md-3">
                <h3>Direct</h3>
                <a href="#" class="btn btn-block text-white text-left">Home</a>
                <a href="#" class="btn btn-block text-white text-left">About Us</a>
                <a href="#" class="btn btn-block text-white text-left">Our Services</a>
                <a href="#" class="btn btn-block text-white text-left">Admission Country</a>
                <a href="#" class="btn btn-block text-white text-left">Contact Us</a>
            </div>
            <div class="col-md-3">
                <h3>Support</h3>
                <a href="#" class="btn btn-block text-white text-left">Help</a>
                <a href="#" class="btn btn-block text-white text-left">FAQ</a>
                <a href="#" class="btn btn-block text-white text-left">Payment Policy</a>
                <a href="#" class="btn btn-block text-white text-left">Privacy Policy</a>
                <a href="#" class="btn btn-block text-white text-left">Terms & Conditions</a>
            </div>
            <div class="col-md-3">
                <h3>Visit Office</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17663.047158132777!2d-6.5783761674393055!3d34.25131016747348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda759f9847310ff%3A0xfcdd86f18958657d!2z2KfZhNmF2K_Ysdiz2Kkg2KfZhNmI2LfZhtmK2Kkg2YTZhNi52YTZiNmFINin2YTYqti32KjZitmC2YrYqV_Yp9mE2YLZhtmK2LfYsdip!5e0!3m2!1sar!2sma!4v1702148481129!5m2!1sar!2sma" width="100%" height="150" frameborder="0" style="border:0;" allowfullscreen></iframe>
                <p><i class="fa fa-map-pin" aria-hidden="true"></i> Address: Campus universitaire, B.P 241, Kénitra - MAROC</p>
            </div>
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 ENSAK: <a class="text-body" href="https://eat.uit.ac.ma/">uit.ac.ma</a>
    </div>
    </footer>
</body>
</html>
