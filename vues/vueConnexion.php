


<form action="index.php?action=connexion" method="POST">

    <input type="email" name="email" placeholder="Votre email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>

    <button type="submit">Se connecter</button>
</form>

<?php //gestion message d'erreur 
    if (!empty($message)): ?>
    <p style="color:red;">
        <?php echo $message; ?>
    </p>
<?php endif; ?>

