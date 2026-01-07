<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
         <title><?= $titre ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="./images/logoLBT.png" />
        <link rel="stylesheet" href="contenue/style.css" />
        <script src="https://kit.fontawesome.com/6c5bf009e7.js" crossorigin="anonymous"></script>

    </head>
    <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/LBT_Big_Logo.png" alt="Logo Big LBT" width="300" height="200">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                
                </ul> 
            </div>
            <!--  user bar :  / annonces général / profil / annonce  -->
            <div class="user-bar" style="position: relative;">
                <div class="user-section">
                    <a href="#" class="user-link">
                        <i class="fa-regular fa-user"></i>
                        <span>Me connecter</span>
                    </a>
                </div>

                <div class="favorites-section">
                    <a href="#" class="favorites-link">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span>Mes Annonces</span>
                    </a>
                </div>
    
            </div>
        </div>
    </nav>
    <!-- FIN NAVBAR -->

    <!-- CALL TO ACTION -->
    <section class="call-to-action d-flex align-items-center justify-content-center text-center">
        <div class="cta-content">
            <h1 class="cta-title">C'est le moment de déposer une annonce !</h1>
            <a href="deposer-annonce.html" class="btn btn-primary cta-button">Déposer une annonce</a>
        </div>
    </section>
    <!-- FIN CALL TO ACTION -->

    <!-- MAIN -->
        <div id="contenu">
            <?= $contenu ?>
        </div>
    <!-- #contenu -->
      


    <!-- FOOTER -->
    <footer class="footer">
        <a class="footer-logo" href="index.html">
            <img src="images/LBT_Big_Logo.png" alt="Logo Big LBT" width="250" height="150">
        </a>
        <p class="Mention">Mention Légal</p>
        <p class="reseaux">Nos reseaux: 
            <a href="https://github.com/Hatdevjb/La_Bonne_Trouvaille"><i class="fa-brands fa-github"></i></a>
        </p>
        <div class="title-line"></div>
        <p class="copyright">© Copyrights 2025, All Rights Reserved by LBT.Inc</p>
    </footer>
    <!-- FIN FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>