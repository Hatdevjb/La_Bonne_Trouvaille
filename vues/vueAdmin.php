<div class="admin-header">
    <h2>Menu Admin - Gestion des membres</h2>
    <p>Bienvenue dans le menu d'administration. <br> Voici la liste des utilisateurs inscrits.</p>
    <p>Il y a actuellement <strong><?php echo count($users); ?></strong> membres.</p>
</div>

<div class="connexion">
    <table class="table-admin">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr class="utilisateur">
                <td><?php echo htmlspecialchars($user['id_utilisateur']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td>
                    <a href="index.php?action=admin&supprimer_id=<?php echo $user['id_utilisateur']; ?>" 
                       class="lien-supprimer"
                       onclick="return confirm('Supprimer cet utilisateur et ses annonces ?')">
                       Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>