<?php
include_once 'class/autoloader.php';
include 'isAuthentificated.php';

$db = ConnexionDB::getInstance();
$user = new Utilisateur($db);

// in case the user try to access deleteEtudiant.php
if(!$user->isAdmin($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
if (isset($_POST['id'])) {
    $user->deleteEtudiant($_SESSION['user_id'], $_POST['id']);
}
header('Location: listeEtudiants.php');
exit;