<?php
require __DIR__.'/header.php';

if (isset($_SESSION['id'])) {



    $characterRepository = new CharacterRepository($base);
    $myCharacter = $characterRepository->find($_SESSION['id']);
    $enemy = $characterRepository->find($_GET['id']);

    $message = "";

    if ($enemy->getState() === Character::DEAD) {
        $message = "Vous venez de découvrir un corp sans vie ...";
        echo $message;
    } else {
        if ($myCharacter->getAp() >= Character::ATTAQUE_COST) {

            // Point d'action
            $myCharacter->setAp($myCharacter->getAp() - Character::ATTAQUE_COST);
            $characterRepository->updateAp($myCharacter);

            // Attaque
            $damage = rand(1,100);
            $hp = $enemy->getHp() - $damage;
            $enemy->setHp($hp);
            $characterRepository->updateHp($enemy);

            $message = $myCharacter->getName() . " attaque ". $enemy->getName(). " pour " . $damage ." de dommage <br>";
            echo $message;
            
            if ($enemy->getState() === Character::DEAD) {
                $message = $enemy->getName(). " est mort";
                echo $message;
            }
        } else {
            $message = "Vous n'avez pas assez de point d'action";
            echo $message;
        }
    }

}

require __DIR__.'/footer.php';
?>
