<?php

include_once 'class/autoloader.php';

if (isset($_POST['search'])) {
    $search = $_POST['search'];

    $db = ConnexionDB::getInstance();
    $sc = new Section($db);
    $user = new Utilisateur($db);

    $sections = $sc->listSectionsByName($search);

    foreach ($sections as $s) {
        echo '<tr>';
        echo '<td>'.$s['id'].'</td>';
        echo '<td>'.$s['designation'].'</td>';
        echo '<td>'.$s['description'].'</td>';
        echo '<td>
                  <form action="listeEtudiantsParSection.php" method="get">
                      <input type="hidden" name="id" value="'.$s['id'].'">
                      <button type="submit" class="icon">
                      <i class="fa-solid fa-circle-info"></i>
                      </button>
                  </form>
          </td>';
        echo '</tr>';
    }
}
