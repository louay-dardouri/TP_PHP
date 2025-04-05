<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Typed Pokemon Battle Simulator.</h1>
<div class="alert alert-success">Les combattants</div>

<?php
require_once 'PokemonTypes.php';

$blaziken = new PokemonFeu('Blaziken', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full//257.png', 2500, 220, 372, 2, 20);
$seismitoad = new PokemonEau('Seismitoad', 'https://assets.pokemon.com/assets/cms2/img/pokedex/full//537.png',2070, 175, 317, 3, 15);

$compteur = 0;
while (! $blaziken->isDead() && ! $seismitoad->isDead()) {
    echo "<div class='pokemon-row'>";
    $blaziken->whoAmI();
    $seismitoad->whoAmI();
    echo '</div>';
    $d1 = $blaziken->attack($seismitoad);
    if ($seismitoad->isDead()) {
        echo "<div class='pokemon-row'>";
        echo "<div class='alert alert-success'>Le vainqueur est <img class='image' src='".$blaziken->getUrl()."'></div>";
        echo '</div>';
        break;
    }
    $d2 = $seismitoad->attack($blaziken);
    if ($blaziken->isDead()) {
        echo "<div class='pokemon-row'>";
        echo "<div class='alert alert-success'>Le vainqueur est <img class='image' src='".$seismitoad->getUrl()."'></div>";
        echo '</div>';
        break;
    }
    $compteur++;
    echo "<div class='alert alert-danger'>Round $compteur";
    echo "<div class='alert alert-success '> <span>$d1</span> <span>$d2</span>";
    echo '</div></div>';
}
?>

</body>
</html>

