<?php $this->titre = "La Bonne Trouvailles"; ?>

<?php foreach ($annonces as $annonce):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=annonce&id=" . $annonce['id_annonce'] ?>">
                <h1 class="titreAnnonce"><?= $annonce['titre'] ?></h1>
            </a>
            <time><?= $annonce['date_publication'] ?></time>
        </header>
        <p><?= $annonce['description'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
