<?php
require 'vendor/autoload.php';
include_once 'class/ConnexionDB.php';
include_once 'class/Etudiant.php';
include_once 'isAuthentificated.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = ConnexionDB::getInstance();

$etudiant = new Etudiant($db);
$etudiants = $etudiant->listEtudiants();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$headers = ['ID', 'Name', 'Birthday', 'Section'];
$col = 'A';
foreach ($headers as $header) {
    $sheet->setCellValue($col . '1', $header);
    $col++;
}

$row = 2;
foreach ($etudiants as $etudiant) {
    $sheet->setCellValue('A' . $row, $etudiant['id']);
    $sheet->setCellValue('B' . $row, $etudiant['name']);
    $sheet->setCellValue('C' . $row, $etudiant['birthday']);
    $sheet->setCellValue('D' . $row, $etudiant['section']);
    $row++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="etudiants.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();