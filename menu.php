<nav class="menu">

    <?php
    if (isset($_SESSION['id'])) {?>

        <ul class="nav nav-tabs bg-dark">
            <li role="presentation" class="active"><a href="index.php">Index</a></li>
            <li role="presentation" class="active"><a href="deconnection.php">Déconnection</a></li>
            <li role="presentation"><a href="journal.php">Journal</a></li>
        </ul>
    <?php } else{ ?>
        <ul class="nav nav-tabs bg-dark">
            <li role="presentation"><a href="index.php">Index</a></li>
            <li role="presentation" class="active"><a href="inscription.php">Inscription</a></li>
            <li role="presentation"><a href="connexion.php">Connexion</a></li>
        </ul>
    <?php } ?>

</nav>
