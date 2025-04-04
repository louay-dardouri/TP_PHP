<?php

$cssPath = 'css/liste.css';
$pageTitle = 'Students List';

include_once 'class/autoloader.php';
include_once 'fragments/header.php';
?>

<div class="alert alert-success">
    Liste des etudiants.
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
    <input type="text" name="search" value="">
  </div>
</div>

<hr>

<table>
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

$etudiants = $st->listEtudiants();
foreach ($etudiants as $et) {
    echo '<tr>';
    echo '<td>'.$et['id'].'</td>';
    echo '<td> <img src="'.$et['image'].'" alt="taswira"></td>';
    echo '<td>'.$et['name'].'</td>';
    echo '<td>'.$et['birthday'].'</td>';
    echo '<td>'.$et['section'].'</td>';
    echo '<td>
                  <form action="detailEtudiant.php" method="get">
                      <input type="hidden" name="id" value="'.$et['id'].'">
                      <button type="submit">
                          &#9432;
                      </button>
                  </form>
          </td>';
    echo '</tr>';
}

?>
</table>

<?php include_once 'fragments/footer.php';
