<?php

$cssPath = 'css/liste.css';
$pageTitle = 'Students List';
include_once 'isAuthentificated.php';
include_once 'class/autoloader.php';
include_once 'fragments/header.php';
?>

<div class="alert alert-success">
    Liste des etudiants.
</div>
<div class="filter-container">
  <input type="text" class="filter-input" placeholder="Veuillez renseigner votre">
  <button class="filter-button">Filtrer</button>
  <form action="addEtudiant.php" method="post" style="display: inline;">
      <button type="submit" class="icon">
        <i class="fa-solid fa-user-plus icon-1"></i>
      </button>
  </form>
</div>
<div class="container">
  <div class="buttons-container">
    <button type="">Copy</button>
    <button type="">Excel</button>
    <button type="">CSV</button>
    <button type="">PDF</button>
  </div>

  <div class="input-container">
    <label for="search">Search: </label>
    <input type="text" name="search" id="s">
  </div>
</div>

<hr>

<table id="students-table">
<tr>
    <th>id</th>
    <th>image</th>
    <th>name</th>
    <th>birthday</th>
    <th>section</th>
    <th>Actions</th>
</tr>
<?php

$db = ConnexionDB::getInstance();
$st = new Etudiant($db);
$user = new Utilisateur($db);
$etudiants = $st->listEtudiants();
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

?>
</table>

<script src="js/script.js"></script>

<?php include_once 'fragments/footer.php';
