<?php
include_once 'class/autoloader.php';
include_once 'isAuthentificated.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=sections.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Designation', 'Description'));

$conn = ConnexionDB::getInstance();
$section = new Section($conn);

$rows = $section->listSections();

foreach ($rows as $row) {
    fputcsv($output, $row);
}

fclose($output);