<?php $this->titre = "La Bonne Trouvailles"; ?>


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
                    <img src="<?=photo['id_photo'] ?>" class="Annonce-img<?= !$isFirst ? ' blur-annonce' : '' ?>" alt="Image de <?= $annonce['titre'] ?>"id>
                </a>

                <!-- images\ImgAnnonce\default.png  -->
               
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
