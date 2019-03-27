<?php

require __DIR__ . '/Class/CharacterRepository.php';
require __DIR__ . '/header.php';


if (isset($_SESSION['id'])) {
    echo "Vous êtes déjà connecter";
} else {
    ?>
    <form method='post'>
        <label>Nom</label>
        <input type="text" name="name">
        <label>Password</label>
        <input type="password" name="password">
        <button type="submit">Connexion</button>
    </form>
    <?php
}
?>



<?php

if (isset($_POST['name']) && isset($_POST['password'])) {

    $characterRepository = new CharacterRepository($base);
    if ($characterRepository->login($_POST['name'], $_POST['password'])) {
        echo "Vous etes connecter";
    } else {
        echo "Ce personnage n'existe pas";
    }
}

?>
