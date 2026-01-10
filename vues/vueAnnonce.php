<?php $this->titre = "Détail de l'annonce - " . $annonce['titre']; ?>

<section class="detail-annonce-section container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card annonce-detail-card shadow-lg">
                
                <!-- Image de l'annonce -->
                <div class="annonce-image-container">
                    <img src="images/ImgAnnonce/<?= $annonce['image'] ?>" 
                         class="card-img-top annonce-detail-img" 
                         alt="<?= $annonce['titre'] ?>">
                </div>

                <!-- Contenu de la carte -->
                <div class="card-body">
                    
                    <!-- Titre et prix -->
                    <div class="annonce-header mb-4">
                        <div>
                            <h1 class="card-title annonce-detail-titre"><?= $annonce['titre'] ?></h1>
                            <p class="annonce-detail-prix text-primary"><strong><?= number_format($annonce['prix'], 2, ',', ' ') ?> €</strong></p>
                        </div>
                    </div>

                    <!-- Date de publication -->
                    <div class="annonce-meta mb-3">
                        <small class="text-muted">
                            <i class="fa-regular fa-calendar"></i>
                            Publié le : <?= date('d/m/Y', strtotime($annonce['date_publication'])) ?>
                        </small>
                    </div>

                    <!-- Séparateur -->
                    <hr>

                    <!-- Description -->
                    <div class="annonce-description mb-4">
                        <h5 class="description-title">Description</h5>
                        <p class="card-text"><?= nl2br($annonce['description']) ?></p>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="annonce-actions d-flex gap-2">
                        <a href="index.php" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Retour aux annonces
                        </a>
                        <button class="btn btn-danger" onclick="">
                            <i class="fa-solid fa-trash"></i> Supprimer l'annonce
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
