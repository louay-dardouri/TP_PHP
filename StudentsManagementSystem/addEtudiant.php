<?php
include_once 'class/autoloader.php';
include 'isAuthentificated.php';

$db = ConnexionDB::getInstance();
$user = new Utilisateur($db);
$section = new Section($db);

// in case the user try to access addEtudiant.php
if (!$user->isAdmin($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['name'], $_POST['birthday'], $_POST['image'], $_POST['section'])){
    
        $name = htmlspecialchars($_POST['name']);
        $birthday = htmlspecialchars($_POST['birthday']);
        $image = htmlspecialchars($_POST['image']);
        $section = htmlspecialchars($_POST['section']);
        
        $user->addEtudiant($_SESSION['user_id'], $name, $birthday, $image, $section);

        header('Location: listeEtudiants.php');
        exit();
}
$pageTitle = "addEtudiant";
$cssPath = 'css/login.css';
include_once 'fragments/header.php';
?>
    <div class='container'>
    <h2>Ajouter un Étudiant</h2>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Birthday:</label>
        <input type="date" name="birthday" required><br>

        <label>ImageUrl:</label>
        <input type="text" name="image"><br>

        <label>Section:</label>
        <select name="section" id="section" required>
            <?php
                $sections = $section->listSections();
                foreach ($sections as $section) {
            ?>
                <option value="<?= $section['id'] ?>">
                    <?= htmlspecialchars($section['designation']) ?> - (<?= $section['description'] ?>)
                </option>
            <?php } ?>
        </select>
        <br><br>
        <button class="login" type="submit">Ajouter</button>
    </form>
    </div>
<?php
include_once 'fragments/footer.php';