<?php require "Etudiant.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Etudiants</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        .student-container {
            margin-bottom: 30px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        table {
            border-collapse: collapse;
            margin: 10px 0;
        }
        td {
            padding: 8px 12px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-top: 0;
        }
        hr {
            margin: 20px 0;
            border: 0;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <h1 id="header">Affichage des notes</h1>
    <?php 
    $aymen = new Etudiant("aymen" ,[11,13,18,7,10,13,2,5,1]);
    $skander =  new Etudiant("skander",[15,9,8,16]);

    // Affichage des notes
    echo '<div class="student-container">';
    $aymen->afficheNotes();
    echo '</div>';
    
    echo '<div class="student-container">';
    $skander->afficheNotes();
    echo '</div>';
    ?>
    
</body>
</html>