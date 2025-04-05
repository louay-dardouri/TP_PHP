<?php
include_once 'class/autoloader.php';
include_once 'isAuthentificated.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=etudiants.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Name', 'Birthday', 'Section'));

$conn = ConnexionDB::getInstance();
$etudiant = new Etudiant($conn);

$rows = $etudiant->listEtudiants();

foreach ($rows as $row) {
    unset($row['image']);
    fputcsv($output, $row);
}

fclose($output);