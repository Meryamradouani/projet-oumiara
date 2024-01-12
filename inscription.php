
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


}
    }
}

// Fermeture de la connexion
mysqli_close($link);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf_8" />
		<title>creer un compte</title> 
    <style>
    
        .main {
            background-color: #dff2ff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 40px;
            width: 400px;
            text-align: center;
            width:600PX;
           
          /* Center the container horizontally */
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 18px;
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #22427C;
            color: #fff;
            padding: 14px 20px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: lightblue;
        }

    .container1{
            background-image: url('photo/ss.png');
            background-size: 1020px;
            background-repeat: no-repeat;
            margin: 0;
            padding: 90px;
            display: flex;
            justify-content: right;
            align-items: center;
            height: 116vh;
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
    <a class="mr-3" href="index.php"><img src="ensak-logo.png" width="120PX" bheight="100px" alt="logo"></a>
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
<div class="container1"> <div class="main">
<h1>Inscription à un Événement</h1>
    <form action="" method="POST" id="form" enctype="multipart/form-data">
        <?php
        // Ajoutez un champ caché pour stocker l'ID de l'événement
        $eventId = isset($_GET['event_id']) ? $_GET['event_id'] : null;
        echo "<input type='hidden' name='eventId' value='$eventId'>";
        ?>

        <label for="nom">NOM:</label>
        <input type="text" name="NOM" required="required"/><br>
        <label for="prenom">PRENOM :</label>
        <input type="text" name="PRENOM" required="required"/><br>
        <label for="nom">E-MAIL:</label>
        <input type="text" name="MAIL" required="required"/><br>
        <label for="font">FONCTIONNALITE:</label>
        <select name="FONCTIONALITE">
            <option id="font" value="etudiant">ETUDIDIANT</option>
            <option value="professeur">PROFESSEUR</option>
        </select><br>
        <input type="submit" name="submit" value="S'inscrire" />
    </form> 
    </div></div>
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

