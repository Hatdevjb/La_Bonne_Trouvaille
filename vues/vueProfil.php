<div class="connexion">
    <h2>Mon Profil</h2>
    
    <div class="groupe-info">
        <label class="user">Nom d'utilisateur</label>
        <p><?php echo htmlspecialchars($_SESSION['user']['username']); ?></p>
    </div>

    <div class="groupe-info">
        <label class="email">Adresse email</label>
        <p><?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
    </div>

    <hr> <a href="index.php?action=deconnexion" class="lienDeconnexion">
        Se déconnecter
    </a>
</div>