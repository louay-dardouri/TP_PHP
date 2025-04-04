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
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if(empty($username) ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    empty($password) ||
    empty($role)){
        $error = 'at least one of the fields is empty!';
    }
    else{
        $query = 'INSERT INTO utilisateur (username, email, role) VALUES(:username, :email, :role)';
        $req = $db->prepare($query);
        $req->execute(['username'=>$username, 'email'=>$email,'role' => $role]);
        $q1 = 'INSERT INTO password VALUES(:id,:hash)';
        $pass = password_hash($password,PASSWORD_DEFAULT);
        $id = $db->lastInsertId();
        $req1 = $db->prepare($q1);
        $req1->execute(['id'=>$id,'hash'=>$pass]);
        header("Location: login.php");
        exit();
    }
}
$pageTitle = 'Register';
$cssPath = 'css/login.css';
?>
<?php include_once 'fragments/header.php'; ?>
    <div class='container'>
    <h2>Register here:</h2>
    <form method="post">
        <label for="user_id">input a username:</label>
        <input type="username" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <label for="email">email:</label>
        <input type="email" name="email" id="email">
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="user" selected>User</option>
            <option value="admin">Admin</option>
        </select>
        <br><br>
        <span class="wrong-pass"> <?php echo $error; ?></span> <br>
        <button name='register' class="register "type="submit">Confirm</button>
    </form>
    </div>

<?php include_once 'fragments/footer.php'; ?>
