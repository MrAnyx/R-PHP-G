<?php
require __DIR__.'/header.php';

use App\Character;
use App\CharacterRepository;
use App\CharacterLog;
use App\CharacterLogRepository;

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
