<?php

include_once 'class/autoloader.php';
include 'isAuthentificated.php';

$db = ConnexionDB::getInstance();
$user = new Utilisateur($db);
$st = new Etudiant($db);

// in case the user try to access updateEtudiant.php
if (! $user->isAdmin($_SESSION['user_id'])) {
    header('Location: listeEtudiants.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['birthday'], $_POST['image'], $_POST['section'])) {

    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $birthday = htmlspecialchars($_POST['birthday']);
    $image = htmlspecialchars($_POST['image']);
    $section = htmlspecialchars($_POST['section']);

    $user->updateEtudiant($_SESSION['user_id'], $id, $name, $birthday, $image, $section);

    header('Location: listeEtudiants.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && ! isset($_GET['id'])) {
    header('Location: listeEtudiants.php');
    exit;
}

$id = htmlspecialchars($_GET['id']);
$etudiant = $st->getEtudiantById($id);

$pageTitle = 'addEtudiant';
$cssPath = 'css/login.css';
include_once 'fragments/header.php';
?>
    <div class='container'>
    <h2>Modifier Étudiant id:<?php echo $id; ?></h2>
    <form method="post">
        <input type="text" name="id" value="<?php echo $id; ?>" hidden required><br>

        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $etudiant['name']; ?>" required><br>

        <label>Birthday:</label>
        <input type="date" name="birthday" value="<?php echo $etudiant['birthday']; ?>" required><br>

        <label>ImageUrl:</label>
        <input type="text" name="image" value="<?php echo $etudiant['image']; ?>"><br>

        <label>Section:</label>
        <select name="section" id="section" required>
            <?php
                $sec = new Section($db);
$sections = $sec->listSections();
foreach ($sections as $section) {
    ?>
      <option value="<?= $section['id'] ?>" <?php echo ($section['id'] === $etudiant['section_id']) ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($section['designation']) ?> - (<?= $section['description'] ?>)
                </option>
            <?php } ?>
        </select>
        <br><br>
        <button class="login" type="submit">Modifier</button>
    </form>
    </div>
<?php
include_once 'fragments/footer.php';

