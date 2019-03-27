<?php

session_start();

require __DIR__ . './Class/Character.php';

function loadClass($classname){
    require 'Class/'.$classname.'.php';
}
spl_autoload_register('loadClass');



$base = new PDO('mysql:host=localhost;dbname=project3il', 'root', 'MDPbdd');
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

if (isset($_SESSION['id'])) {
    $characterRepository = new CharacterRepository($base);
    $character = $characterRepository->find($_SESSION['id']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" >
    <title>Mon jeu</title>
</head>
<body>

    <?php
    include __DIR__.'/menu.php';
    ?>
