<?php

class CharacterRepository{
    private $base;

    public function __construct(PDO $base){
        $this->base = $base;
    }



    public function add(Character $character){
        $response = $this->base->prepare('INSERT INTO characters (name, password, hp, ap) VALUES(:name, :password, :hp, :ap)');
        $response->bindValue(':name', $character->getName());
        $response->bindValue(':password', $character->getPassword());
        $response->bindValue(':hp', $character->getHp());
        $response->bindValue(':ap', $character->getAp());

        $response->execute();

        $character->hydrate(['id' => $this->base->lastInsertId()]);
    }




    public function exists(Character $character)
    {
        $response = $this->base->prepare('SELECT COUNT(*) FROM characters WHERE name = :name');
        $response->bindValue(':name', $character->getName());
        $response->execute();

        return (bool) $response->fetchColumn();
    }





    public function findByName(string $name){
        $response = $this->base->prepare('SELECT * FROM characters WHERE name = :name');
        $response->bindValue(':name', $name);
        $response->execute();

        return $response->fetch();
    }



    public function updateLastActionAndAp(Character $character)
    {
        $datenow = new DateTime('now');
        $response = $this->base->prepare('UPDATE characters SET lastaction = :lastaction, ap = :ap WHERE id = :id');
        $response->bindValue(':lastaction', $datenow->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        $response->bindValue(':ap', $character->getAp(), PDO::PARAM_INT);
        $response->bindValue(':id', $character->getId(), PDO::PARAM_INT);

        $response->execute();
    }



    public function login(string $name, string $password){
        if ($result = $this->findByName($name)) {
            if (password_verify($password, $result['password'])) {
                $character = $this->find($result['id']);
                $_SESSION['id'] = $character->getId();
                $_SESSION['username'] =  $character->getName();
                $character->getNewAp();
                $this->updateLastActionAndAp($character);
                return $character;
            }
            return false;
        }
        return false;

    }





    public function find(int $id){
        $response = $this->base->prepare('SELECT * FROM characters WHERE id = :id');
        $response->bindValue(':id', $id);
        $result = $response->execute();
        if ($result === true) {
            $character = new Character($response->fetch());
            return $character;
        }

        return false;

    }




    public function findAllWithoutMe(int $id)
    {
        $response = $this->base->prepare('SELECT * FROM characters WHERE id <> :id');
        $response->bindValue(':id', $id);
        $result = $response->execute();
        if ($result === true) {
            $records = $response->fetchAll(PDO::FETCH_CLASS, 'Character');
            return $records;
        }

        return false;
    }




    public function updateHp(Character $character)
    {
        $response = $this->base->prepare('UPDATE characters SET hp = :hp WHERE id = :id');

        $response->bindValue(':hp', $character->getHp(), PDO::PARAM_INT);
        $response->bindValue(':id', $character->getId(), PDO::PARAM_INT);

        $response->execute();
    }


    public function updateAp(Character $character)
    {
        $response = $this->base->prepare('UPDATE characters SET ap = :ap WHERE id = :id');

        $response->bindValue(':ap', $character->getAp(), PDO::PARAM_INT);
        $response->bindValue(':id', $character->getId(), PDO::PARAM_INT);

        $response->execute();
    }
}

?>
