<?php

if (! isset($_GET['id'])) {
    header('Location: /');
    exit();
}
$id = $_GET['id'];

$host = 'localhost';
$dbname = 'StudentsManagementSystem';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare('Select * from student where id=:id');
    $query->execute(['id' => $id]);
    if ($query->rowCount() <= 0) {
        exit("Student not found <br> NO student with id: $id");
    }
    $row = $query->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student <?php echo $row['name']; ?></title>
  </head>
  <body>
    <h1><?php echo $row['name']; ?></h1>
    <?php echo $row['birthday']; ?>
  </body>
</html>
