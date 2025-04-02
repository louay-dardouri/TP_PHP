<?php

require_once 'Pokemon.php';

class PokemonFeu extends Pokemon
{
    protected string $type = 'Feu';

    public function attack(Pokemon $p): int
    {
        $atk = rand(
            $this->attackPokemon->getAttackMinimal(),
            $this->attackPokemon->getAttackMaximal()
        );

        $random = rand(1, 100);
        if ($random <= $this->attackPokemon->getProbalitySpecialAttack()) {
            $atk = $atk * ($this->attackPokemon->getSpecialAttack());
        }

        if ($p->getType() == 'Plante') {
            $atk *= 2;
        } elseif ($p->getType() == 'Eau') {
            $atk *= 0.5;
        }
        $p->hp -= $atk;

        return $atk;
    }
}

class PokemonPlante extends Pokemon
{
    protected string $type = 'Plante';

    public function attack(Pokemon $p): int
    {
        $atk = rand(
            $this->attackPokemon->getAttackMinimal(),
            $this->attackPokemon->getAttackMaximal()
        );

        $random = rand(1, 100);
        if ($random <= $this->attackPokemon->getProbalitySpecialAttack()) {
            $atk = $atk * ($this->attackPokemon->getSpecialAttack());
        }

        if ($p->getType() == 'Eau') {
            $atk *= 2;
        } elseif ($p->getType() == 'Feu') {
            $atk *= 0.5;
        }
        $p->hp -= $atk;

        return $atk;
    }
}

class PokemonEau extends Pokemon
{
    protected string $type = 'Eau';

    public function attack(Pokemon $p): int
    {
        $atk = rand(
            $this->attackPokemon->getAttackMinimal(),
            $this->attackPokemon->getAttackMaximal()
        );

        $random = rand(1, 100);
        if ($random <= $this->attackPokemon->getProbalitySpecialAttack()) {
            $atk = $atk * ($this->attackPokemon->getSpecialAttack());
        }

        if ($p->getType() == 'Feu') {
            $atk *= 2;
        } elseif ($p->getType() == 'Plante') {
            $atk *= 0.5;
        }
        $p->hp -= $atk;

        return $atk;
    }
}
