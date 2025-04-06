<?php

$cssPath = 'css/liste.css';
$pageTitle = 'Students List';

include_once 'class/autoloader.php';
include_once 'fragments/header.php';
include_once 'isAuthentificated.php';

$db = ConnexionDB::getInstance();
$st = new Section($db);
$user = new Utilisateur($db);
$sections = $st->listSections();

?>
<div class="alert alert-success">
    Liste des Sections.
</div>

<?php 
if ($user->isAdmin($_SESSION['user_id'])) {
      echo '<div class="icon-row">
            <form action="addSection.php" method="post" style="display: inline;">
                <button type="submit" class="icon">
                    <i class="fa-solid fa-plus icon-1"></i>
                </button>
            </form>';
}
  echo '</div>';
?>
<div class="container">
  <div class="buttons-container">
    <a href="exportSectionCOPY.php"><button type="">COPY</button></a>
    <a href="exportSectionExcel.php"><button type="">Excel</button></a>
    <a href="exportSectionCSV.php"><button type="">CSV</button></a>
    <a href="exportSectionPDF.php"><button type="">PDF</button></a>
  </div>

  <div class="input-container">
    <label for="search">Search: </label>
    <input type="text" name="search" id="s-section">
  </div>
</div>

<hr>
<table id="students-table">
<tr>
    <th>id</th>
    <th>designation</th>
    <th>description</th>
    <th>Actions</th>
</tr>
<?php
foreach ($sections as $st) {
    echo '<tr>';
    echo '<td>'.$st['id'].'</td>';
    echo '<td>'.$st['designation'].'</td>';
    echo '<td>'.$st['description'].'</td>';
    echo '<td>
                <div class="icon-row">
                  <form action="listeEtudiantsParSection.php" method="get" style="display: inline;">
                      <input type="hidden" name="id" value="'.$st['id'].'">
                      <button type="submit" class="icon">
                      <i class="fa-solid fa-circle-info"></i>
                      </button>
                  </form>';
    if ($user->isAdmin($_SESSION['user_id'])) {
      echo '<form action="deleteSection.php" method="post" style="display: inline;">
              <input type="hidden" name="id" value="'.$st['id'].'">
              <button type="submit" class="icon" onclick="return confirm(\'Are you sure you want to delete this section?\');">
                <i class="fa-solid fa-eraser icon"></i>
              </button>
            </form>';
    }
    echo '</div>
        </td>';
    echo '</tr>';
}

?>
</table>

<script src="js/searchSections.js"></script>

<?php include_once 'fragments/footer.php';
