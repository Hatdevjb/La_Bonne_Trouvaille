<div class ="connexion">
    <h2>Création de compte</h2>
    <form action="index.php?action=inscription" method="POST">

        <div class="groupe-champ">
                <label>Votre nom d'utilisateur</label>
                <input type="text" name="username" placeholder="Entrez votre nom d'utilisateur" required>
        </div>

        <div class="groupe-champ">
            <label>Votre email</label>
            <input type="email" name="email" placeholder="Entrez votre email" required>
        </div>

        <div class="groupe-champ">
            <label>Votre mot de passe</label>
            <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
        </div>
        <button type="submit" class="boutonInscription">S'inscrire</button>
    </form>


<?php //gestion message d'erreur 
    if (!empty($message)): ?>
    <p style="color:red;">
        <?php echo $message; ?>
    </p>
    <?php endif; ?>
</div>