<?php

$cssPath = 'css/liste.css';
$pageTitle = 'Students List';

include_once 'class/autoloader.php';
include_once 'fragments/header.php';
include_once 'isAuthentificated.php';

?>
<div class="alert alert-success">
    Liste des Sections.
</div>

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
$db = ConnexionDB::getInstance();
$st = new Section($db);

$sections = $st->listSections();
foreach ($sections as $st) {
    echo '<tr>';
    echo '<td>'.$st['id'].'</td>';
    echo '<td>'.$st['designation'].'</td>';
    echo '<td>'.$st['description'].'</td>';
    echo '<td>
                  <form action="listeEtudiantsParSection.php" method="get">
                      <input type="hidden" name="id" value="'.$st['id'].'">
                      <button type="submit" class="icon">
                      <i class="fa-solid fa-circle-info"></i>
                      </button>
                  </form>
          </td>';
    echo '</tr>';
}

?>
</table>

<script src="js/searchSections.js"></script>

<?php include_once 'fragments/footer.php';
