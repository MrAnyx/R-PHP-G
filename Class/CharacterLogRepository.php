<?php

namespace App;

use PDO;
use DateTime;

class CharacterLogRepository
{
    private $base;

    public function __construct(PDO $base)
    {
        $this->base = $base;
    }

    public function add(Character $character, $message)
    {
        $datenow = new DateTime('now');

        $response = $this->base->prepare('INSERT INTO characters_log (message, add_at, character_id) VALUES(:message, :add_at, :character_id)');
        $response->bindValue(':message', $message);
        $response->bindValue(':add_at', $datenow->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        $response->bindValue(':character_id', $character->getId());

        $response->execute();

    }

    public function findAllForMe(int $id)
    {
        $response = $this->base->prepare('SELECT * FROM characters_log WHERE character_id = :id');
        $response->bindValue(':id', $id);
        $result = $response->execute();
        if ($result === true) {
            $records = $response->fetchAll(PDO::FETCH_CLASS, 'App\CharacterLog');
            return $records;
        }

        return false;
    }

}
