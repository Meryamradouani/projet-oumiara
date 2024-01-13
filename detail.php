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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="detail.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
<!-- Barre de Navigation -->
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
<div>
    <a name="event1"><h2><div id="table">
        <div id="centeralign">
          <h1>Forum ENSAK-Entreprises de kenitra</h1>
          <h3>L'unique Forum ENSAK-Entreprises De Kenitra refait surface pour une 7ème édition .</h3>
        </div>
      </h2></a></div><br><br>
    <img src="photo/WhatsApp Image 2023-12-09 at 23.16.44_9d323da0.jpg" class="img-fluid" alt="..."><br><br>
    <div id="parag">Le forum ENSAK Entreprises ouvre ses portes, pour la 7ème année consécutive, le Mercredi 29 Novembre 2023 à
        l'École Nationale des Sciences Appliquées de Kenitra. Cet événement phare sera sous le thème de « La révolution
        numérique : Défis et avenir de l'ingénierie.»
        Le grand rendez-vous place au cœur de ses préoccupations l'interaction et l'échange entre les entreprises et
        étudiants afin d'éclaircir les exigences du marché de travail. Un rassemblement capital et essentiel, qui est à
        destination d'étudiants et professeurs, chercheurs d'emploi et salariés, pour but de discuter et analyser l'effet de
        cette culture digitale qui englobe les nouveaux modes de communication ainsi que la façon dont ils modifient les
        attentes et les comportements des utilisateurs, sujet qui de nos jours fait couler beaucoup d'encre au monde
        professionnel.
        Une journée où toute personne est conviée à assister à des conférences d'experts sur des thèmes variés et débats,
        à développer ses Soft Skills et à découvrir les divers exposants que le forum regroupe dont des entreprises,
        banques et même des cabinets de recrutement qui vont vous offrir maintes opportunités, vous conseiller et guider
        à décrocher d'éventuels stages et embauches dans les entreprises espérées.
        Effectivement, cette plateforme d'échange est une excellente occasion pour les entreprises qui souhaitent
        dénicher les bons profils conciliables à leurs critères, que ce soit dans le domaine de l'informatique, des énergies
        renouvelables et systèmes embarqués, des systèmes d'information, réseaux et télécommunications, industrie ou
        mécatronique d'automobile.
        En définitive, il est à retenir que le forum est ouvert au grand public et que toute personne intéressée d'y assister
        sera la bienvenue. Nous comptons vivement sur votre présence.
    </div>

    <div class="container mt-5">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0002.jpg" class="card-img-top" alt="Projet 1">
                <div class="card-body">
                    <h5 class="card-title">image 1</h5>
                    <p class="card-text">Description for image 1.</p>
                    <!-- Add more content or buttons as needed -->
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/WhatsApp Image 2023-12-09 at 20.53.09_ed12dfe1.jpg" class="card-img-top" alt="Projet 2">
                <div class="card-body">
                    <h5 class="card-title">image 2</h5>
                    <p class="card-text">Description for image 2.</p>
                    <!-- Add more content or buttons as needed -->
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0003.jpg" class="card-img-top" alt="Projet 3">
                <div class="card-body">
                    <h5 class="card-title">image 3</h5>
                    <p class="card-text">Description for image 3.</p>
                    <!-- Add more content or buttons as needed -->
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Card 4 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0007.jpg" class="card-img-top" alt="Projet 4">
                <div class="card-body">
                    <h5 class="card-title">image 4</h5>
                    <p class="card-text">Description for image 4.</p>
                    <!-- Add more content or buttons as needed -->
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231209-WA0051.jpg" class="card-img-top" alt="Projet 5">
                <div class="card-body">
                    <h5 class="card-title">image 5</h5>
                    <p class="card-text">Description for image 5.</p>
                    <!-- Add more content or buttons as needed -->
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0046.jpg" class="card-img-top" alt="Projet 6">
                <div class="card-body">
                    <h5 class="card-title">image 6</h5>
                    <p class="card-text">Description for image 6.</p>
                    <!-- Add more content or buttons as needed -->
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-bzHQLOwk54r1HleP7b8L+LUGUNBhEuDBXFv8W/BrNJ6+8IRb/td2YTC9wTjZFS3" crossorigin="anonymous"></script>
      <h3>Retour en images sur la 7ème édition du Forum Ensak Entreprises. Des rencontres enrichissantes, des échanges passionnants et des opportunités prometteuses ont marqué cette journée mémorable</h3>
      <video width="800Px" height="600PX" src="photo/WhatsApp Video 2023-12-10 at 00.32.41_b328c87d.mp4" controls="controls" poster="photo/WhatsApp Image 2023-12-10 at 00.37.02_502d769d.jpg" type="video1/mp4"></video><br><br>


<a name="event2"><h2>
  <div id="table">
        <div id="centeralign">
          <h1>Journée national de la mécatronique</h1>
          <h3>un nouveau modéle de formation d'ingénieurs !</h3>
        </div>
  </div> </h2>
</a><br><br>
<img src="photo/WhatsApp Image 2023-12-09 at 00.58.09_e7242900.jpg" width="600PX" height="600PX" alt="..."><br><br>
<h2>M. Riad Mazur, Ministre de l'Industrie et du Commerce, a participé, le 09 mai 2022, au séminaire organisé par le Club Mécatronique de l'Ecole Nationale des Sciences Appliquées de Kénitra, à l'occasion de la Journée Nationale de la Mécatronique sous le thème : « Nouveau modèle de formation d'ingénieur pour un nouveau modèle industriel »</h2>
   
<div class="container mt-5">
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0009.jpg" class="card-img-top" alt="vidéo de présentation par topovideo">
                <div class="card-body">
               
                    <!-- Add any additional content here if needed -->
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0011.jpg" class="card-img-top" alt="vidéo de formation par topovideo">
                <div class="card-body">
                    
                    <!-- Add any additional content here if needed -->
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0009.jpg" class="card-img-top" alt="Vidéo RH">
                <div class="card-body">
                   
                    <!-- Add any additional content here if needed -->
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">


    <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0013.jpg"  width="200px" height="250PX" class="card-img-top" alt="Snack content">
                <div class="card-body">
                    
                    <!-- Add any additional content here if needed -->
                </div>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0006.jpg" class="card-img-top" alt="Vidéo Tutoriel">
                <div class="card-body">
                  
                    <!-- Add any additional content here if needed -->
                </div>
            </div>
        </div>

        <!-- Card 5 -->
   

        <!-- Card 6 -->
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0012.jpg" width="200px" height="250PX" class="card-img-top" alt="Vidéo teaser">
                <div class="card-body">
                    
                    <!-- Add any additional content here if needed -->
                </div>
            </div>
        </div>
    </div>
</div>


  
              </div>
              <iframe width="560" height="400" src="https://www.youtube.com/embed/UYL4lSGISis?si=6pXteUonOC7Zy1WE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              <p><a href="#" class="boutton">Contactez- nous !</a></p>
      </section><br><br>
          <a name="event3"><h2>
            <div id="table">
                  <div id="centeralign">
                    <h1>Journée Nationale des systemes embarqués</h1>
                    <h3>la digitalisation et l'intelligence artificielle : quel futur pour le maroc !</h3>
                  </div>
                </div> </h2>
          </a><br><br>
                <img src="photo/IMG-20231210-WA0032.jpg" width="600PX" height="600PX" alt="..."><br><br><br>
                <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0028.jpg" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <!-- Content for Box 1 -->
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0035.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <!-- Content for Box 2 -->
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0030.jpg" class="card-img-top" alt="Image 3">
                <div class="card-body">
                    <!-- Content for Box 3 -->
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0029.jpg" class="card-img-top" alt="Image 4">
                <div class="card-body">
                    <!-- Content for Box 4 -->
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0033.jpg" class="card-img-top" alt="Image 5">
                <div class="card-body">
                    <!-- Content for Box 5 -->
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="photo/IMG-20231210-WA0034.jpg" class="card-img-top" alt="Image 6">
                <div class="card-body">
                    <!-- Content for Box 6 -->
                </div>
            </div>
        </div>
    </div>
</div>
 <br>
                    <h3>crer.ensak Le club Robotique et Energies Renouvelables est fier de vous annoncer l'organisation de la 6ème édition de la journée nationale des systèmes embarqués, sous le thème << La digitalisation et l'IA: Quel futur pour le Maroc >> qui se tiendra le Mercredi 10 Mai 2023 à l'École Nationale des Science Appliqués de Kénitra
                     Cet événement mettra en lumière l'importance de la digitalisation qui est considérée aujourd'hui comme la quatrième révolution industrielle au niveau mondial.
          
                    </h3>    
                </div> <br><br> 
              </div>
         <a name="event4"><h2>
          <div id="table">
                <div id="centeralign">
                  <h1>caravane humanitaire al amal 5</h1>
                  <h3>club assoctiatif ANARUZ </h3>
                </div>
              </div> </h2></a><br><br> 
              <div class="container mt-5">
                <div class="row">
                    <!-- Projet 1 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20231210-WA0043.jpg" class="card-img-top" alt="Projet 1">
                          
                        </div>
                    </div>
            
                    <!-- Projet 2 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20231210-WA0041.jpg" class="card-img-top" alt="Projet 2">
                            
                        </div>
                    </div>
            
                    <!-- Projet 3 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/WhatsApp Image 2023-12-10 at 18.14.18_a40cec18.jpg" class="card-img-top" alt="Projet 3">
                           
                        </div>
                    </div>
                </div>
            
                <div class="row mt-4">
                    <!-- Projet 4 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20231210-WA0044.jpg" class="card-img-top" alt="Projet 4">
                            
                        </div>
                    </div>
            
                    <!-- Projet 5 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20231210-WA0045.jpg" class="card-img-top" alt="Projet 5">
                            
                        </div>
                    </div>
            
                    <!-- Projet 6 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20231210-WA0046.jpg" class="card-img-top" alt="Projet 6">
                            
                        </div>
                    </div>
                </div>
            </div><br><br>
            <h2>La vidéo complète qui résume nos efforts et nos accomplissement pendant la caravane humanitaire Al Amal 5</h2>
            <video width="800Px" height="600PX" src="photo/WhatsApp Video 2023-12-10 at 18.35.46_a1129b5f.mp4" controls="controls" poster="photo/IMG-20231210-WA0045.jpg" type="video1/mp4"></video><br><br>
              </div>
              <a name="event5"><h2>
          <div id="table">
                <div id="centeralign">
                  <h1>صدى الوحي لتجويد القرءان الكريم</h1>
                  <h3>club afaaq </h3>
                </div>
              </div> </h2></a><br><br> 
              <img src="photo/afaq.jpg" width="600PX" height="600PX" alt="..."><br><br><br>
              <div id="parag">لله الحمد و المنة من قبل و من بعد
بفضل و منة من الله عز وجل ، يعلن نادي آفاق بشراكة مع 17 مدرسة و معهد على ربوع المملكة، عن انطلاقة مسابقة التجويد الوطنية صدى الوحي
و بذلك يتحقق حلم طالت مسيرته ... فشاء الله له أن يكون بعد سنة كاملة من التخطيط ..
حلم أن تجتمع نواد عدة حول هدف واحد .. و أن تحقق ما لم يسبقهم أحد إليه ..
أن نجعل طلبة ذوي تخصصات علمية بحتة يتنافسون و ينكبون على طلب العلمي الشرعي و تدارس قواعد التجويد ...
و ها قد آن الأوان لله الحمد و الشكر .. لنعلن عن الانطلاقة الفعلية لمسابقة التجويد الوطنية صدى الوحي
سائلين من المولى عز وجل التوفيق و السداد
بوركت الهمم و سدد الله الخطى

    </div>
    <div class="container mt-5">
                <div class="row">
                    <!-- Projet 1 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20240112-WA0019.jpg" class="card-img-top" alt="Projet 1">
                          
                        </div>
                    </div>
            
                    <!-- Projet 2 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20240112-WA0021.jpg" class="card-img-top" alt="Projet 2">
                            
                        </div>
                    </div>
            
                    <!-- Projet 3 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20240112-WA0022.jpg" class="card-img-top" alt="Projet 3">
                           
                        </div>
                    </div>
                </div>
            
                <div class="row mt-4">
                    <!-- Projet 4 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/afaq1.jpg" class="card-img-top" alt="Projet 4">
                            
                        </div>
                    </div>
            
                    <!-- Projet 5 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20240112-WA0020.jpg" class="card-img-top" alt="Projet 5">
                            
                        </div>
                    </div>
            
                    <!-- Projet 6 -->
                    <div class="col-md-4">
                        <div class="card">
                            <img src="photo/IMG-20240112-WA0017.jpg" class="card-img-top" alt="Projet 6">
                            
                        </div>
                    </div>
                </div>
            </div><br><br>
            <a name="event6"><h2><div id="table">
        <div id="centeralign">
          <h1>soirée ftour  </h1>
          <h3>pour la premier fois une opportunité unique  .</h3>
        </div>
      </h2></a></div><br><br>
      <img src="photo/fotor.jpg" width="600PX" height="600PX" alt="..."><br><br><br>
      <div id="parag"> Cette année, nous nous sommes retrouvés seuls, loins de nos proches avec qui nous avions l'habitude de partager la table du Ftour chaque Ramadan.
Aujourd'hui, on vous donne l'opportunité de revivre cette ambiance de partage avec vos amis autour d'une table variée et une animation musicale authentique et chaleureuse 😍
              </div><br><br>
              <video width="800Px" height="600PX" src="photo/fotor.mp4" controls="controls" poster="photo/fotor.jpg" type="video1/mp4"></video><br><br>









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
</html>
