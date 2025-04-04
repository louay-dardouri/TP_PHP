<?php
include_once 'class/autoloader.php';
include 'isAuthentificated.php';

$db = ConnexionDB::getInstance();
$user = new Utilisateur($db);

// in case the user try to access updateEtudiant.php
if(!$user->isAdmin($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
if (isset($_GET['id'])) {
    $user->updateEtudiant($_SESSION['user_id'], $_GET['id']);
}
header('Location: listeEtudiants.php');
exit;