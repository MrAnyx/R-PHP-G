<nav class="menu">
<a href="index.php">Index</a>


<?php
if (isset($_SESSION['id'])) {?>
    <a href="deconnection.php">Déconnection</a>
    <a href="journal.php">Journal</a>
<?php } else{ ?>
    <a href="inscription.php">Inscription</a>
    <a href="connexion.php">Connexion</a>
<?php } ?>



<?php if (isset($_SESSION['id'])) : ?>
        <div>
            PV : <?= $character->getHp(); ?>, AP : <?= $character->getAp(); ?>
        </div>
    <?php endif ?>

</nav>
