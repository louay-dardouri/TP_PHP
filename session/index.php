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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PHP Session Manager</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      html,
      body {
        height: 100%;
      }
      .container {
        height: 100%;
      }
      .reset {
        width: 75px;
        font-size: 20px;
      }
    </style>
  </head>

  <body>
    <div class="container d-flex justify-content-center align-items-center">
      <div class="card p-4">
        <h1 class="card-title text-center"><?php echo $welcome_message; ?></h1>
        <div class="text-center mt-4">
          <form method="post">
            <input
              type="submit"
              name="reset"
              value="reset"
              class="reset btn btn-primary"
            />
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
