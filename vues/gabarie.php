<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>La Bonne Trouvaille</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>

    <header>
        <h1>La Bonne Trouvaille</h1>
        <nav>
            <a href="index.php?action=connexion">Connexion</a>
            <a href="index.php?action=profil">Mon Profil</a>
            <a href="index.php?action=deconnexion">Déconnexion</a>
        </nav>
    </header>
    <main>
        <?php echo $contenu; ?>
    </main>
</body>
</html>