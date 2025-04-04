<?php
include_once 'class/autoloader.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_id'])){
    header("Location: home.php");
    exit;
}

$db = ConnexionDB::getInstance();
$utilisateur = new Utilisateur($db);
$wrong = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $selectedUserId = $_POST['user_id'];

    $pass = $_POST['password'];
    if (password_verify($pass, $utilisateur->getPasswordHash($selectedUserId))) {
        $user = $utilisateur->getUserById($selectedUserId);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        header('Location: home.php');
        exit();
    }else {
      $wrong = "Wrong Password";
    }
}

$users = $utilisateur->getUsers();
$pageTitle = 'Login';
$cssPath = 'css/login.css';
?>
<?php include_once 'fragments/header.php'; ?>
    <div class='container'>
    <h2>Log in or Register</h2>
    <form method="post">
        <label for="user_id">Choose a user:</label>
        <select name="user_id" id="user_id" required>
            <?php
                $users = $utilisateur->getUsers();
foreach ($users as $user) {
    ?>
                <option value="<?= $user['id'] ?>">
                    <?= htmlspecialchars($user['username']) ?> - (<?= $user['role'] ?>)
                </option>
            <?php } ?>
        </select>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <span class="wrong-pass"> <?php echo $wrong; ?></span> <br>
        <button class="login" type="submit">Login</button>
        <button class="register "type="submit">Register</button>
    </form>
    </div>
<?php include_once 'fragments/footer.php'; ?>
