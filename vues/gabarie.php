<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>La Bonne Trouvaille</title>
    <link rel="stylesheet" href="css/style.css"> </head>
<body>

    <header>
        <h1>La Bonne Trouvaille</h1>
        <nav>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="index.php?action=profil">Mon Profil</a>
            <a href="index.php?action=deconnexion" >Déconnexion</a>
        
        <?php else: ?>
        <a href="index.php?action=connexion">Connexion</a>
        <?php endif; ?>
</nav>
    </header>
    <main>
        <?php echo $contenu; ?>
    </main>
</body>
</html>