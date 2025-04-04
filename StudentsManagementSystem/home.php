<?php
include_once 'fragments/header.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo '<h1>Hello, PHP LOVERS! Welcome to your administration Platform</h1>';
echo "<h2>Welcome, " . $_SESSION['username'] . "!</h2>";
echo "<p>Email: " . $_SESSION['email'] . "</p>";
echo "<p>Role: " . $_SESSION['role'] . "</p>";

include_once 'fragments/footer.php';