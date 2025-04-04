<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <?php if (isset($cssPath)) {
        echo "<link rel='stylesheet' href= '$cssPath'> ";
    }?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>
      <?php echo $pageTitle ?? 'Students Management System'; ?>
    </title>
</head>
<body>
    <nav>
      <span>Students Management System</span>
      <a href="home.php">Home</a >
      <a href="listeEtudiants.php">Liste des etudiants</a >
      <a href="#">Liste des sections</a >
      <a href="logout.php">Logout</a >
    </nav>

