<?php
require __DIR__.'/header.php';

if (isset($_SESSION['id'])) {
    $characterRepository = new CharacterRepository($base);
    $character = $characterRepository->find($_SESSION['id']);
    ?>
    <table>
        <tr>
            <th>Nom du joueur</th>
            <td><?= $character->getName(); ?></td>
        </tr>
        <tr>
            <th>Point de vie</th>
            <td><?= $character->getHp(); ?></td>
        </tr>
        <tr>
            <th>Point d'action</th>
            <td><?= $character->getAp(); ?></td>
        </tr>
    </table>
    <?php



    $listOfCharacter = $characterRepository->findAllWithoutMe($_SESSION['id']);
    foreach ($listOfCharacter as $character):?>
    <a href="attaque.php?id=<?= $character->getId();?>"><?= $character->getName();?></a><br>
<?php endforeach;

}



require __DIR__.'/footer.php';


?>
