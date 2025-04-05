<?php
include_once 'class/autoloader.php';
include_once 'isAuthentificated.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=etudiants.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Name', 'Birthday', 'Section'));

$conn = ConnexionDB::getInstance();

$query = $conn->prepare("SELECT id, name, birthday, section FROM etudiant");
$query->execute();

foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
    fputcsv($output, $row);
}

fclose($output);