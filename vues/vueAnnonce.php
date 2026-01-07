<?php $this->titre = "Mon TestClient - " . $annonce['titre']; ?>

<article>
    <header>
        <h1 class="titreAnnonce"><?= $annonce['titre'] ?></h1>
        <time><?= $annonce['date'] ?></time>
    </header>
    <p><?= $annonce['description'] ?></p>
</article>
<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required /><br />
</form>

