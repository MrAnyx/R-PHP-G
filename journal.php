<?php
require __DIR__.'/header.php';


if (isset($_SESSION['id'])) {
    $characterLogRepository = new CharacterLogRepository($base);
    if ($listOfLog = $characterLogRepository->findAllForMe($_SESSION['id'])):
    foreach ($listOfLog as $log):?>
        <?= $log->getAddAt();?> : <?= $log->getMessage();?><br>
    <?php
    endforeach;
    endif;
}

require __DIR__.'/footer.php';

?>
