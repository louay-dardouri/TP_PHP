<?php
include_once 'SessionManager.php';

SessionManager::start();
SessionManager::increaseVisits();

$nbVisit = SessionManager::get('nbVisit');
if ($nbVisit == 1) {
    $welcome_message = 'Bienvenu à notre plateforme.';
} else {
    $welcome_message = " Merci pour votre fidélité, c'est votre $nbVisit ème visite.";
}

if (isset($_POST['reset'])) {
    SessionManager::remove('nbVisit');
    SessionManager::reset();
    header('Location: /');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Session Manager</title>
  </head>
  <body>
    <h1><?php echo $welcome_message; ?></h1>
    <form method="post">
      <input type="submit" name="reset" value="reset">
    </form>
  </body>
</html>