<?php $this->titre = "Ajouter une annonce"; ?>

<section class="ajout-annonce-section container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="ajout-annonce-container">
                <h2 class="ajout-titre mb-4">Créer une nouvelle annonce</h2>
                
                <form method="POST" action="index.php?action=ajoutAnnonce" enctype="multipart/form-data" class="formulaire-annonce">
                    
                    <!-- Titre de l'annonce -->
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre de l'annonce</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre de l'annonce" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Décrivez votre annonce en détail" required></textarea>
                    </div>

                    <!-- Prix -->
                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix (€)</label>
                        <input type="number" class="form-control" id="prix" name="prix" placeholder="0.00" step="0.01" min="0" required>
                    </div>

                    <!-- Image de l'annonce -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image de l'annonce</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        <small class="form-text text-muted">Formats acceptés : JPG, PNG, GIF </small>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="index.php" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Publier l'annonce</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
