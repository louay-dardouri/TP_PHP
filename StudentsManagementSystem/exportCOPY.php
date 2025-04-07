<?php

include_once 'class/autoloader.php';
include_once 'isAuthentificated.php';

if (
    ! isset($_GET['page']) ||
    ($_GET['page'] != 'etudiants' &&
    $_GET['page'] != 'sections')
) {
    header('Location home.php');
    exit;
}

$conn = ConnexionDB::getInstance();

if ($_GET['page'] === 'etudiants') {
    $etudiant = new Etudiant($conn);
    $rows = $etudiant->listEtudiants();
    $res = 'id,name,birthday,image,section\n';
} elseif ($_GET['page'] === 'sections') {
    $section = new Section($conn);
    $rows = $section->listSections();
    $res = 'id,designation,description\n';
}

foreach ($rows as $row) {
    $res = $res.implode(',', $row).'\n';
}
echo $res;
