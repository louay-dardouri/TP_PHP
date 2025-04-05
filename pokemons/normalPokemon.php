<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Normal Pokemon Battle Simulator.</h1>
    <div class="alert alert-success">Les combattants</div>

<?php
require_once("Pokemon.php");

$rattata = new Pokemon("Rattata", "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/019.png", 1020, 70, 180, 2, 20);
$tauros = new Pokemon("Tauros", "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/128.png", 1300, 120, 210, 3, 15);

$compteur = 0;
while (!$rattata->isDead() && !$tauros->isDead()) {
    echo "<div class='pokemon-row'>";
    $rattata->whoAmI();
    $tauros->whoAmI();
    echo "</div>";
    $d1 = $rattata->attack($tauros);
    if ($tauros->isDead()) {
        echo "<div class='pokemon-row'>";
        echo "<div class='alert alert-success'>Le vainqueur est <img class='image' src='".$rattata->getUrl()."'></div>";
        echo "</div>";       
        break;
    }
    $d2 = $tauros->attack($rattata);
    if ($rattata->isDead()) {
        echo "<div class='pokemon-row'>";
        echo "<div class='alert alert-success'>Le vainqueur est <img class='image' src='".$tauros->getUrl()."'></div>";
        echo "</div>";
        break;
    }
    $compteur++;
    echo "<div class='alert alert-danger'>Round $compteur";
    echo "<div class='alert alert-success '> <span>$d1</span> <span>$d2</span>";
    echo "</div></div>";
}
?>
</body>
</html>
