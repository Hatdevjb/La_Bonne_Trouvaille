<?php $this->titre = "Mon TestClient"; ?>

<?php foreach ($annonces as $annonce):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=annonce&id=" . $annonce['id'] ?>">
                <h1 class="titreannonce"><?= $annonce['titre'] ?></h1>
            </a>
            <time><?= $annonce['date'] ?></time>
        </header>
        <p><?= $annonce['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
