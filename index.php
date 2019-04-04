<?php
require __DIR__.'/header.php';
use App\Character;
use App\CharacterRepository;
use App\CharacterLog;
use App\CharacterLogRepository;

/*
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
        <tr>
            <th>XP</th>
            <td><?= $character->getExperience(); ?></td>
        </tr>
        <tr>
            <th>Level</th>
            <td><?= $character->getLevel(); ?></td>
        </tr>
    </table>

*/

$characters = null;
if (isset($_SESSION['id'])) {
    $characters = $characterRepository->findAllWithoutMe($_SESSION['id']);
}
echo $twig->render('index.html.twig', ['characters' => $characters]);
?>
