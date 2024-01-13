<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Cards Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    body {
      
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

    @media (max-width: 500px) {
        .navbar-nav {
            flex-direction: column;
            align-items: flex-start;
        }

        .navbar-toggler {
            display: block;
        }

        .navbar-collapse {
            display: none;
        }

        .navbar-nav .nav-item {
            margin-bottom: 5px;
        }

        .navbar-brand img {
            max-width: 60%;
        }

        .navbar-collapse.show {
            display: flex;
            flex-direction: column;
        }
    

    }
    #table {
    display: table;
    width: 100%;
    height: 60%;
    background-color: #dff2ff;
 
  }
  
  #centeralign {
    display: table-cell;
    vertical-align: middle;
   
  }
  h1 {
    text-transform: uppercase;
    letter-spacing: 1pt;
    font-size: 30pX;
    margin-bottom: 15px;
  }

</style>

</style>
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
          <a href="club.php"class="btn btn-success btn-info nav-link white bgcolor:white  mr-3">Club</a>
        </li>
        <li class="ml-3">
          <a href="event.php" class="btn btn-success btn-info nav-link mr-3">Evénement</a>
        </li>
        <li class="ml-3">
          <a href="demande.php" class="btn btn-success btn-info nav-link mr-3">ajouter Evénement</a>
        </li>
        <?php if (isset($showLoginButton) && $showLoginButton): ?>
          <li class="ml-3">
          <a href="pagelogin.php" class="btn btn-success btn-info mr-3 btn-login">login</a>
          </li>
        <?php endif; ?>

        <?php if (isset($showLogoutButton) && $showLogoutButton): ?>
          <li class="ml-3">
          <a href="logout.php" class="btn btn-success btn-info mr-3 ml-3 btn-logout">Déconnexion</a>
          </li>
        <?php endif; ?>
      </ul>
      <!-- Update your search form with this -->
<form class="d-flex" role="search">
    <input class="form-control ml-3 me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
    <button class="btn btn-success btn-info mr-3 ml-3 btn-search" type="button" onclick="performSearch()"> Search </button>
</form>


    </div>
  </div>
</nav><br><br><br><br>
<div class="container mt-5">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20240113-WA0037.jpg" class="card-img-top" alt="Card Image 1">
                <div class="card-body">
                    <h5 class="card-title">Club AFAQ </h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20240113-WA0038.jpg" class="card-img-top" alt="Card Image 2">
                <div class="card-body">
                    <h5 class="card-title">GOOGLE DSC</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20240113-WA0039.jpg" class="card-img-top" alt="Card Image 3">
                <div class="card-body">
                    <h5 class="card-title">Club ANARUZ</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Card 4 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20240113-WA0040.jpg" class="card-img-top" alt="Card Image 4">
                <div class="card-body">
                    <h5 class="card-title"> CLUB ENACTUS </h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20240113-WA0041.jpg" class="card-img-top" alt="Card Image 5">
                <div class="card-body">
                    <h5 class="card-title"> CLUB CRER </h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20240113-WA0042.jpg" class="card-img-top" alt="Card Image 6">
                <div class="card-body">
                    <h5 class="card-title">CLUB MECATRONIQUE </h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
