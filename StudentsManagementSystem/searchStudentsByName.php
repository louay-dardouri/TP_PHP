<?php

include_once 'class/autoloader.php';

echo '<script>
  console.log("kjsdlkfj");
</script>';

if (isset($_POST['search'])) {
    $search = $_POST['search'];

    $db = ConnexionDB::getInstance();
    $st = new Etudiant($db);
    $user = new Utilisateur($db);

    $etudiants = $st->listEtudiantsByName($search);

    foreach ($etudiants as $et) {
        echo '<tr>';
        echo '<td>'.$et['id'].'</td>';
        echo '<td> <img src="'.$et['image'].'" alt="taswira"></td>';
        echo '<td>'.$et['name'].'</td>';
        echo '<td>'.$et['birthday'].'</td>';
        echo '<td>'.$et['section'].'</td>';
        echo '<td>
            <div class="icon-row">
              <form action="detailEtudiant.php" method="get" style="display: inline;">
                  <input type="hidden" name="id" value="'.$et['id'].'">
                  <button type="submit" class="icon">
                      <i class="fa-solid fa-circle-info"></i>
                  </button>
              </form>';
        if ($user->isAdmin($_SESSION['user_id'])) {
            echo '<form action="deleteEtudiant.php" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="'.$et['id'].'">
                    <button type="submit" class="icon" onclick="return confirm(\'Are you sure you want to delete this student?\');">
                        <i class="fa-solid fa-eraser"></i>
                    </button>
                </form>

                <form action="updateEtudiant.php" method="get" style="display: inline;">
                    <input type="hidden" name="id" value="'.$et['id'].'">
                    <button type="submit" class="icon">
                        <i class="fa-solid fa-square-pen"></i>
                    </button>
                </form>';
        }
        echo '</div>
        </td>';
        echo '</tr>';
    }
}
