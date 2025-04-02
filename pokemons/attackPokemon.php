<?php 
class AttackPokemon{
    private int $attackMinimal;
    private int $attackMaximal;
    private int $specialAttack;
    private int $probabilitySpecialAttack;

    public function getAttackMinimal(){
        return $this->attackMinimal;
    }

    public function setAttackMinimal($attak){
        $this->attackMinimal = $attak;
    }

    public function getAttackMaximal(){
        return $this->attackMaximal;
    }

    public function setAttackMaximal($attak){
        $this->attackMaximal = $attak;
    }

    public function getSpecialAttack(){
        return $this->specialAttack;
    }

    public function setSpecialAttack($attak){
        $this->specialAttack = $attak;
    }

    public function getProbalitySpecialAttack(){
        return $this->probabilitySpecialAttack;
    }

    public function setProbalitySpecialAttack($attak){
        $this->probabilitySpecialAttack = $attak;
    }
    
    public function __construct($attackMinimal, $attackMaximal, $specialAttack, $probabilitySpecialAttack){
        $this->attackMinimal = $attackMinimal;
        $this->attackMaximal = $attackMaximal;
        $this->specialAttack = $specialAttack;
        $this->probabilitySpecialAttack = $probabilitySpecialAttack;
    }






}

