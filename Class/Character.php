<?php


namespace App;

use PDO;
use DateTime;


class Character{

    public const ALIVE = 'alive';
    public const DEAD = 'dead';
    public const ATTAQUE_COST = 5;
    public const AP_REGEN = 60;
    public const HEAL_COST = 2;
    public const HP_MAX = 100;
    public const AP_MAX = 100;
    public const LEVEL_EXPERIENCE = 1000;

    public $experience = 0;
    private $level = 1;
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




    public function getLevel(){
        return $this->level;
    }

    public function setLevel($level){
        $this->level = $level;
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



    public function getExperience(){
        return $this->experience;
    }

    public function setExperience(int $exp){
        $this->experience = $exp;
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
        if ($this->ap > self::AP_MAX) {
            $this->ap = self::AP_MAX;
        }
    }



    public function setHp($hp)
    {
        if ($hp > $this->getHpMax()) {
            $this->hp = $this->getHpMax();
        } else {
            $this->hp = $hp;
        }
    }
    public function getHp(){
        return $this->hp;
    }




    public function getHpMax()
    {
        return self::HP_MAX;
    }




    public function checkExperience()
    {
        $experienceMax = $this->level * self::LEVEL_EXPERIENCE;
        if ($this->experience >= $experienceMax) {
            ++$this->level;
            $this->experience = 0;
        }
    }







}
