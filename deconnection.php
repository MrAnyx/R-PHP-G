<?php

require __DIR__ . '/header.php';

session_destroy();
header('Location: index.php?Disconnected');

?>
