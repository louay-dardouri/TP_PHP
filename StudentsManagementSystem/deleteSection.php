<?php
include_once 'class/autoloader.php';
include 'isAuthentificated.php';

$db = ConnexionDB::getInstance();
$user = new Utilisateur($db);
$section = new Section($db);

// in case the user try to access deleteSection.php
if(!$user->isAdmin($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
if (isset($_POST['id'])) {
    $section->deleteSection($_POST['id']);
}
header('Location: listeSections.php');
exit;