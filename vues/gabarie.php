
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>La Bonne Trouvaille</title>
    <script src="https://kit.fontawesome.com/6c5bf009e7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Style inspiré du BonCoin */
        body { font-family: Arial, sans-serif; 
            margin: 0; 
            background-color: #f4f4f4; 
        }
        
        .navbar { 
            display: flex; 
            align-items: center; 
            justify-content: space-between;
            padding: 10px 50px; 
            background: white; 
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand img { 
            height: 80px; 
            width: 170x; }

        .nav-links { 
            display: flex; 
            align-items: center; 
            justify-content: center !important;
            gap: 20px; }

        /* Le fameux bouton orange LeBonCoin */
        .btn-deposer {
            background-color: #ff6e14; 
            color: white; border-radius: 12px;
            padding: 8px 16px; 
            text-decoration: none; 
            font-weight: bold;
            display: flex; 
            align-items: center; gap: 8px;
        }

        .user-link {
            text-decoration: none; 
            color: #1a1a1a;
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            font-size: 12px;
        }
        .user-link i { 
            font-size: 20px; 
            margin-bottom: 2px; 
        }

        .cta-header {
            background-color: white; 
            padding: 20px; 
            text-align: center;
            border-bottom: 1px solid #ddd; 
            margin-bottom: 20px;
        }

        main { 
            max-width: 1000px;
             margin: 0 auto; 
             padding: 20px; 
            }
    </style>
</head>
<body>

    <nav class="navbar">
        <a class="navbar-brand" href="index.php">
            <img src="images/LBT_Big_Logo.png" alt="LBT Logo">
        </a>

        <div class="nav-links">
            <a href="index.php?action=deposer" class="btn-deposer">
                <i class="fa-regular fa-square-plus"></i>
                <span>Déposer une annonce</span>
            </a>

            <?php if (isset($_SESSION['user'])): ?>
                <a href="index.php?action=profil" class="user-link">
                    <i class="fa-regular fa-user"></i>
                    <span>Mon Profil</span>
                </a>
                <a href="index.php?action=deconnexion" class="user-link">
                    <i class="fa-solid fa-power-off"></i>
                    <span>Déconnexion</span>
                </a>
            <?php else: ?>
                <a href="index.php?action=connexion" class="user-link">
                    <i class="fa-regular fa-user"></i>
                    <span>Se connecter</span>
                </a>
            <?php endif; ?>
        </div>
    </nav>

    <main>
        <?php echo $contenu; ?>
    </main>

</body>
</html>