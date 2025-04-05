<?php
include_once 'class/autoloader.php';
include 'isAuthentificated.php';

$id = $_GET['id'];
$db = ConnexionDB::getInstance();
$etudiant = new Etudiant($db);
//array of student's infos
$etudiant_infos= $etudiant->getEtudiantById($id);

$cssPath = 'css/detailEtudiant.css';
$pageTitle = 'Details etudiant';
include_once 'fragments/header.php';
?>
    <div class="container">
        <?php if ($etudiant) { ?>
            <div class="header">
                <h1>Student Profile</h1>
                <p>Detailed information about the student</p>
            </div>

            <div class="student-profile">
                <div class="student-image">
                    <?php if (! empty($etudiant_infos['image'])) { ?>
                        <img src="<?= htmlspecialchars($etudiant_infos['image']) ?>" alt="Student Photo">
                    <?php } else { ?>
                        <img src="https://via.placeholder.com/200" alt="No Photo Available">

                    <?php } ?>
                </div>

                <div class="student-info">
                    <div class="info-group">
                        <div class="info-label">Student ID</div>
                        <div class="info-value"><?= htmlspecialchars($etudiant_infos['id']) ?></div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Full Name</div>
                        <div class="info-value"><?= htmlspecialchars($etudiant_infos['name']) ?></div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Date of Birth</div>
                        <div class="info-value"><?= htmlspecialchars($etudiant_infos['birthday']) ?></div>
                    </div>

                    <div class="info-group">
                        <div class="info-label">Section</div>
                        <div class="info-value"><?= htmlspecialchars($etudiant_infos['section']) ?></div>
                    </div>

                    <a href="listeEtudiants.php" class="back-btn">Back to List</a>
                </div>
            </div>
        <?php } else { ?>
            <div class="not-found">
                <h2>Student Not Found</h2>
                <p>No student found with ID <?= htmlspecialchars($etudiant_infos["id"]) ?></p>
                <a href="listeEtudiants.php" class="back-btn">Back to List</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
<?php include_once 'fragments/footer.php';