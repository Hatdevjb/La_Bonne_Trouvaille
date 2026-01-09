<main>
    <div class="connexion">
        <h2>Modifier Profil</h2>

        <form action="index.php?action=modifier" method="POST">
            
            <div class="groupe-champ">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required>
            </div>

            <div class="groupe-champ">
                <label>Pseudo</label>
                <input type="text" name="username" value="<?php echo $_SESSION['user']['username']; ?>" required>
            </div>

            <div class="groupe-champ">
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="Nouveau mot de passe" required>
            </div>

            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="submit" class="boutonConnexion" style="flex: 1;">
                    Valider
                </button>
                
                <a href="index.php?action=profil" class="lienDeconnexion" style="flex: 1; text-decoration: none; text-align: center;">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</main>