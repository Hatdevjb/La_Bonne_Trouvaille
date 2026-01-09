<main>
    <div class="connexion">
        <h2>Mon Profil</h2>
        
        <div class="groupe-info">
            <label>Utilisateur</label>
            <p><?php echo $_SESSION['user']['username']; ?></p>
        </div>
        <hr>
        <div class="groupe-info">
            <label>Email</label>
            <p><?php echo $_SESSION['user']['email']; ?></p>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <a href="index.php?action=modifier" class="boutonConnexion" style="text-decoration: none; text-align: center; flex: 1;">
                Modifier
            </a>
            <a href="index.php?action=deconnexion" class="lienDeconnexion" style="flex: 1; text-align: center;">
                Se Deconnecter
            </a>
        </div>
    </div>
</main>