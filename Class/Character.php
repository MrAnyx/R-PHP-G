<?php
class Character{

    public const ALIVE = 'alive';
    public const DEAD = 'dead';
    public const ATTAQUE_COST = 5;
    public const AP_REGEN = 60;
    public const AP_MAX = 20;

    private $id;
    private $name;
    private $hp;
    private $ap;
    private $password;
    private $lastaction;



    public function __construct(array $arrayOfValues = null)
    {
        if ($arrayOfValues !== null) {
            $this->hydrate($arrayOfValues);
        }
    }



    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }



    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }







    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }






    public function getHp(){
        return $this->hp;
    }

    public function setHp($hp){
        $this->hp = $hp;
    }









    public function getAp(){
        return $this->ap;
    }

    public function setAp($ap){
        $this->ap = $ap;
    }






    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }





    public function getLastAction(){
        return $this->lastaction;
    }

    public function setLastAction($lastaction){
        $this->lastaction = $lastaction;
    }




    public function getState()
    {
        if ($this->hp < 0) {
            return self::DEAD;
        }
        return self::ALIVE;
    }







    public function getNewAp()
    {
        $datetime1 = new DateTime('now');
        $datetime2 = new DateTime($this->lastaction);
        $interval = $datetime1->diff($datetime2);
        $seconde = $interval->s + $interval->i * 60 + $interval->h * 60 * 60;
        if ($seconde > self::AP_REGEN) {
            $newAP = floor($seconde / self::AP_REGEN);
            $this->ap = $this->ap + $newAP;
        }
    }












}
