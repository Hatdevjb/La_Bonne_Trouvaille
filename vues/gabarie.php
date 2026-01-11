<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>La Bonne Trouvaille</title>
    <script src="https://kit.fontawesome.com/6c5bf009e7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/LBT_Big_Logo.png" alt="Logo LBT" width="200" height="auto">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center"> <li class="nav-item">
                        <a class="nav-link user-link" href="index.php?action=deposer">
                            <i class="fa-regular fa-square-plus"></i>
                            <span>Déposer</span>
                        </a>
                    </li>

                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link user-link" href="index.php?action=profil">
                                <i class="fa-regular fa-user"></i>
                                <span>Mon Profil</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link user-link" href="index.php?action=deconnexion">
                                <i class="fa-solid fa-power-off"></i>
                                <span>Déconnexion</span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link user-link" href="index.php?action=connexion">
                                <i class="fa-regular fa-user"></i>
                                <span>Connexion</span>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5"> <div class="container">
            <?php echo $contenu; ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container text-center"> <a class="footer-logo" href="index.php">
                <img src="images/LBT_Big_Logo.png" alt="Logo Big LBT" width="150">
            </a>
            <p class="Mention">Mention Légale</p>
            <p class="reseaux">Nos réseaux: 
                <a href="https://github.com/Hatdevjb/La_Bonne_Trouvaille"><i class="fa-brands fa-github"></i></a>
            </p>
            <div class="title-line mx-auto"></div>
            <p class="copyright">© Copyrights 2025, All Rights Reserved by LBT.Inc</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>