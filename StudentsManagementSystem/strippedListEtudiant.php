<?php
include_once 'isAuthentificated.php';
include_once 'class/autoloader.php';
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

<h1 align="center">Liste des Étudiants</h1>
<table id="students-table" >
<tr>
    <th>id</th>
    <th>image</th>
    <th>name</th>
    <th>birthday</th>
    <th>section</th>
</tr>
<?php

$db = ConnexionDB::getInstance();
$st = new Etudiant($db);
$user = new Utilisateur($db);
$etudiants = $st->listEtudiants();
foreach ($etudiants as $et) {
    echo '<tr>';
    echo '<td>'.$et['id'].'</td>';
    echo '<td> <img src="'.$et['image'].'" alt="student image"></td>';
    echo '<td>'.$et['name'].'</td>';
    echo '<td>'.$et['birthday'].'</td>';
    echo '<td>'.$et['section'].'</td>';
    echo '</div></td></tr>';
}
?>
</table>

  </body>
</html>
