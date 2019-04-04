<?php

require __DIR__ . '/header.php';
use App\Character;
use App\CharacterRepository;
use App\CharacterLog;
use App\CharacterLogRepository;

session_destroy();
header('Location: index.php?Disconnected');

?>
