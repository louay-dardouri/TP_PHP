<?php require "Etudiant.php" ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Etudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="row">
        <div class="col-md-6">
            <?php 
            $aymen = new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]);
            $aymen->AfficheNotes(); 
            ?>
        </div>

        <div class="col-md-6">
            <?php 
            $skander = new Etudiant("Skander", [15, 9, 8, 16]);
            $skander->AfficheNotes(); 
            ?>
        </div>
    </div>

</body>
</html>