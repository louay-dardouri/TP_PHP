<?php
include_once 'class/autoloader.php';
include 'isAuthentificated.php';

$id_section = $_GET['id'];
$db = ConnexionDB::getInstance();
$etudiant = new Etudiant($db);

$etudiants_par_section = $etudiant->listEtudiantsBySection($id_section);

$cssPath = 'css/listeEtudiantsParSection.css';
$pageTitle = 'liste des Etudiants par section';
include_once 'fragments/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students by Section</title>

</head>
<body>
    <div class="container">
        <h1>Students List</h1>

        <?php if (! empty($etudiants_par_section)) { ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants_par_section as $student) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($student['id']); ?></td>
                            <td>
                                <?php if (! empty($student['image'])) { ?>
                                    <img src="<?php echo htmlspecialchars($student['image']); ?>" alt="Student Photo" class="student-img">
                                <?php } else { ?>
                                    <div class="no-photo">No photo</div>
                                <?php } ?>
                            </td>
                            <td><?php echo htmlspecialchars($student['name']); ?></td>
                            <td><?php echo htmlspecialchars($student['birthday']); ?></td>
                            <td><?php echo htmlspecialchars($student['section']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="no-students">No students found in this section.</div>
        <?php } ?>
    </div>
</body>
</html>

<?php include_once 'fragments/footer.php';

