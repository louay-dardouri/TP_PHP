<?php
require 'vendor/autoload.php';
include_once 'class/ConnexionDB.php';
include_once 'class/Section.php';
include_once 'isAuthentificated.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = ConnexionDB::getInstance();

$section = new Section($db);
$sections = $section->listSections();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$headers = ['ID', 'Designation', 'Description'];
$col = 'A';
foreach ($headers as $header) {
    $sheet->setCellValue($col . '1', $header);
    $col++;
}

$row = 2;
foreach ($sections as $section) {
    $sheet->setCellValue('A' . $row, $section['id']);
    $sheet->setCellValue('B' . $row, $section['designation']);
    $sheet->setCellValue('C' . $row, $section['description']);
    $row++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="sections.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit();