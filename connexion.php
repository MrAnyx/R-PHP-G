<?php

require __DIR__ . '/Class/CharacterRepository.php';
require __DIR__ . '/header.php';

use App\Character;
use App\CharacterRepository;
use App\CharacterLog;
use App\CharacterLogRepository;


if (isset($_SESSION['id'])) {
    echo "Vous êtes déjà connecter";
} else {
    ?>
    <form method='post'>
        <table>

            <tr>
                <td><label>Nom</label></td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>



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
