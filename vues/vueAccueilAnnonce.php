<?php $this->titre = "La Bonne Trouvailles"; ?>

 <!-- CALL TO ACTION -->
    <section class="call-to-action d-flex align-items-center justify-content-center text-center">
        <div class="cta-content">
            <h1 class="cta-title">C'est le moment de déposer une annonce !</h1>
            <a href="index.php?action=formulaireAjout" class="btn btn-primary cta-button">Déposer une annonce</a>
        </div>
    </section>
    <!-- FIN CALL TO ACTION -->

<section class="trouvailles-moment">
    <!-- Section Trouvaille -->
    <section class="selectionGenre container-fluid py-5">
        <div class="genre-title-container">
            <h2 class="genre-title">Futur Trouvailles  : </h2>
            <div class="title-line"></div>
        </div>

        <div class="Annonce-cards-container"> 
            <?php $isFirst = true; foreach ($annonces as $annonce):?>
            <div class="Annonce-card">
                <h3 class="annonce-title"><?= $annonce['titre'] ?></h3>    
                <a href="<?= "index.php?action=annonce&id=" . $annonce['id_annonce'] ?>">
                    <img src="images\ImgAnnonce\<?= $annonce['image'] ?>" class="Annonce-img<?= !$isFirst ? ' blur-annonce' : '' ?>" alt="Image de <?= $annonce['titre'] ?>"id>
                </a>
               
                <div class="Annonce-info">
                    <p class="annonce-date">Date de publication : <span> <?= $annonce['date_publication'] ?> </span></p>
                    <p class="annonce-prix">Prix : <span> <?= $annonce['prix'] ?> €</span></p>
                    <p class="annonce-description"> Descriptions : <span> <?= $annonce['description'] ?> </span></p>
                </div>
            </div>
            <?php $isFirst = false; endforeach; ?>

        </div>
    </section>
</section>
