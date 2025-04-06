<?php
include_once 'class/autoloader.php';
include 'isAuthentificated.php';

$db = ConnexionDB::getInstance();
$user = new Utilisateur($db);
$section = new Section($db);

// in case the user try to access addSection.php
if (!$user->isAdmin($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['designation'], $_POST['description'])){
    
        $designation = htmlspecialchars($_POST['designation']);
        $description = htmlspecialchars($_POST['description']);

        $section->addSection($designation, $description);

        header('Location: listeSections.php');
        exit();
}
$pageTitle = "addSection";
$cssPath = 'css/login.css';
include_once 'fragments/header.php';
?>
    <div class='container'>
    <h2>Ajouter une Section</h2>
    <form method="post">
        <label>Designation:</label>
        <input type="text" name="designation" required><br>

        <label>Description:</label>
        <input type="text" name="description" required><br>

        <br><br>
        <button class="login" type="submit">Ajouter</button>
    </form>
    </div>
<?php
include_once 'fragments/footer.php';