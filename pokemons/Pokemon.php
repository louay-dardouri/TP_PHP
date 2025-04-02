<?php 
require_once("AttackPokemon.php");

class Pokemon{
    private string $name;
    private string $url;
    private int $hp;
    private AttackPokemon $attackPokemon;

    public function getName():string{
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getUrl():string{
        return $this->url;
    }

    public function setUrl($url){
        $this->url = $url;
    }
    public function getHp():int{
        return $this->hp;
    }

    public function setHp($hp){
        $this->hp = $hp;
    }

    public function getAttackPokemon():AttackPokemon{
        return $this->attackPokemon;
    }

    public function setAttackPokemon(AttackPokemon $attackPokemon){
        $this->attackPokemon = $attackPokemon;
    }

    public function __construct(string $name, string $url, int $hp, int $attackMinimal, int $attackMaximal, int $specialAttack, int $proba){
        $this->name = $name;
        $this->url = $url;
        $this->hp = $hp;
        $this->attackPokemon = new AttackPokemon($attackMinimal,$attackMaximal,$specialAttack,$proba);
    } 

    public function isDead():bool {
        return $this->hp<=0;
    } 

    public function attack(Pokemon $p):int{
        $atk = rand(
            $this->attackPokemon->getAttackMinimal(),
            $this->attackPokemon->getAttackMaximal()
        );
    
        $random = rand(1,100);
        if($random <= $this->attackPokemon->getProbalitySpecialAttack()){
            $atk = $atk*($this->attackPokemon->getSpecialAttack());
        }
        $p->hp -= $atk;
        return $atk;
    }
    public function whoAmI(){
        echo '<div class="pokemon-container">';
        echo "{$this->getName()}";
        echo "<img class='image' src='{$this->getUrl()}' alt='{$this->getName()}'><hr>";
        echo "HealthPoints: {$this->getHp()}<hr>";
        echo "Min Attack Points: {$this->attackPokemon->getAttackMinimal()}<hr>";
        echo "Max Attack Points: {$this->attackPokemon->getAttackMaximal()}<hr>";
        echo "Special Attack: {$this->attackPokemon->getSpecialAttack()}<hr>";
        echo "Probability Special Attack: {$this->attackPokemon->getProbalitySpecialAttack()}<hr>";
        echo "</div>";
    }




}




