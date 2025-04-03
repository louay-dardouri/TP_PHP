<?php
$host = 'localhost';
$dbname = 'StudentsManagementSystem';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'Select * from student;';
    $res = $conn->query($query);

    echo '<table>';
    echo '<tr><th>id</th><th>name</th><th>birthday</th><th></th></tr>';
    foreach ($res->fetchAll() as $row) {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['birthday'].'</td>';
        echo '<td>
                  <form action="detailEtudiant.php" method="get">
                      <input type="hidden" name="id" value="'.$row['id'].'">
                      <button type="submit">
                          &#9432;
                      </button>
                  </form>
              </td>';
        echo '</tr>';
    }
    echo '</table>';

} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

$conn = null;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Student Info</title>
  </head>
  <body>

  </body>
</html>
