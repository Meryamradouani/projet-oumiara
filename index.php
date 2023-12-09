<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    // Utilisateur connecté, afficher le bouton de déconnexion
    $showLoginButton = false;
    $showLogoutButton = true;
    
} else {
    // Utilisateur non connecté, afficher le bouton de connexion
    $showLoginButton = true;
    $showLogoutButton = false;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ENSA - Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="npm i bootstrap-icons">
    <style>
        body {
            padding-top: 23px; /* La hauteur de la barre de navigation */
             font-family:"Nunito";}
             h1{
    font-size: 70px;
    font-family:"Eczar";
    margin-top:6PX;
    margin-bottom: 10PX;
}
           
    .card {
        border-radius: 30px; /* Ajoutez border-radius à .card */
    }

    .card:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    .card-title {
        font-size: 1.25rem;
    }
    h1 {
        margin-bottom: 20px;
    }

    .card {
        margin-bottom: 20px;
    }
    .card:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease-in-out;
    }
    .card-title {
    font-size: 1.25rem; /* Ajustez la taille selon vos préférences */
    }

    </style>
</head>
<body>

<!-- Barre de Navigation -->
<nav id="header" class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="mr-3" href="index.php"><img src="ensak-logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="ml-3" class="mr-3">
          <a  href="ajouterevenement.php"><button type="button" class="btn btn-success btn-info mr-3" data-bs-toggle="dropdown" aria-expanded="false">
            About Us</button></a>
        </li>
        <li class="ml-3" class="mr-3">
          <a  href="ajouterevenement.php"><button type="button" class="btn btn-success btn-info mr-3" data-bs-toggle="dropdown" aria-expanded="false">
            Club</button></a>
        </li>
        <li class="ml-3" class="mr-3">
          <a  href="ajouterevenement.php"><button type="button" class="btn btn-success btn-info mr-3" data-bs-toggle="dropdown" aria-expanded="false">
            Evénement</button></a>
        </li>
        <li class="ml-3" class="mr-3">
          <a  href="ajouterevenement.php"><button type="button" class="btn btn-success btn-info mr-3" data-bs-toggle="dropdown" aria-expanded="false">
            ajouter Evénement</button></a>
        </li>
   
   
        <?php if ($showLoginButton): ?>
        <li class="ml-3" class="mr-3">
            <a href="login.php"><button type="button" class="btn btn-success btn-info  mr-3">login</button></a>
            <?php endif; ?>
        </li>
        <?php if ($showLogoutButton ): ?>
        <li class="ml-3" class="mr-3">
            <a href="logout.php"><button type="button" class="btn btn-danger">Déconnexion</button></a>
        <?php endif; ?>
        </li>
        
    </ul>
      <form class="d-flex" role="search">
        <input class="form-control ml-3 me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success  btn-info mr-3 ml-3" type="submit"> Search </button>
        
      </form>
    </div>
  </div>
</nav>
<div class="container mt-5">

    <div class="card mb-3">
  <img src="photo/WhatsApp Image 2023-12-08 at 23.38.53_c551eb96.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bienvenue à l'ENSA</h5>
    <p class="card-text">L'école où l'excellence académique rencontre l'innovation.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
</div>
    <h1 class="mg-5" > Événements marquants:</h1> <br>
            <div class="row">
                <!-- Projet 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="photo/WhatsApp Image 2023-12-09 at 00.53.26_fc309247.jpg" class="card-img-top" alt="Projet 1">
                        <div class="card-body">
                            <h5 class="card-title">Forum ENSAK-Entreprises de kenitra </h5>
                            <p class="card-text">L'unique Forum ENSAK-Entreprises De Kenitra refait surface pour une 7ème édition </p>
                            <a href="#" class="btn btn-info">En savoir plus</a>
                        </div>
                    </div>
                </div>
        
                <!-- Projet 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="photo/WhatsApp Image 2023-12-09 at 00.45.40_bd5a3232.jpg" class="card-img-top" alt="Projet 2">
                        <div class="card-body">
                            <h5 class="card-title">Journée Nationale des systemes embarqués</h5><br>
                            <p class="card-text">la digitalisation et l'intelligence artificielle : quel futur pour le maroc !</p>
                            <a href="#" class="btn btn-info">En savoir plus</a>
                        </div>
                    </div>
                </div>
        
                <!-- Projet 3 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="photo/WhatsApp Image 2023-12-09 at 00.58.09_e7242900.jpg" class="card-img-top" alt="Projet 3">
                        <div class="card-body">
                            <h5 class="card-title">Journée national de la mécatronique </h5>
                            <p class="card-text">un nouveau modéle de formation d'ingénieurs </p>
                            <a href="#" class="btn btn-info">En savoir plus</a>
                        </div>
                    </div>
            </div>
            <h1 class="mg-5" > les activiés parascolaires  :</h1> <br><br>
            <div class="row">
                <div class="col-md-4 ">
                    <div class="card">
                        <img src="photo/WhatsApp Image 2023-12-09 at 01.07.49_7022c64d.jpg" class="card-img-top" alt="Projet 3">
                        <div class="card-body">
                            <h5 class="card-title">caravane humanitaire al amal 4 </h5>
                            <p class="card-text">club assoctiatif ANARUZ  </p>
                            <a href="#" class="btn btn-info">En savoir plus</a>
                        </div>
                    </div>
                </div> 


                <div class="col-md-4">
                    <div class="card ml-3">
                        <img src="photo/WhatsApp Image 2023-12-09 at 01.16.34_54db9299.jpg" class="card-img-top" alt="Projet 3">
                        <div class="card-body">
                            <h5 class="card-title">صدى الوحي لتجويد القرءان الكريم </h5>
                            <p class="card-text">club afaaq </p>
                            <a href="#" class="btn btn-info">En savoir plus</a>
                        </div>
                    </div>
                </div>


                     <div class="col-md-4">
                     <div class="card ml-3">
                            <img src="photo/WhatsApp Image 2023-12-09 at 01.24.30_58ea6a86.jpg" class="card-img-top" alt="Projet 3">
                        <div class="card-body">
                            <h5 class="card-title">soirée ftour  </h5>
                            <p class="card-text">pour la premier fois une opportunité unique   </p>
                            <a href="#" class="btn btn-info">En savoir plus</a>
                        </div>
                    </div>
                    </div>
            </div>
        
            
        </div>
        
</div>

<!-- Bootstrap JavaScript et scripts supplémentaires ici -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
