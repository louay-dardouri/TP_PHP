<?php
include_once 'class/autoloader.php';
include_once 'isAuthentificated.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table, th, td{
          border: 1px solid black;
          padding: 5px;
          text-align: center;
          margin-left: auto;
          margin-right: auto;
        }
        table{
          width: 80%;
        }
    </style>
  </head>
  <body>

<h1 align="center">
    Liste des Sections.
</h1>

<table id="students-table">
<tr>
    <th>id</th>
    <th>designation</th>
    <th>description</th>
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
    echo '</tr>';
}
?>
</table>


  </body>
</html>
