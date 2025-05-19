<?php
require BASE_DIR . '/core/Auth.php';

$auth = new Auth(BASE_DIR . '/data/users.json');

if (!$auth->check()) {
    header('location: /login');
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mein Dashboard</title>
  <link rel="stylesheet" href="/assets/css/main.css" />
  <link rel="stylesheet" href="/assets/css/dashboard.css" />
</head>
<body>
  <div class="dashboard-container">
    <header>
      <h1>Willkommen zurück, <?= ucfirst($_SESSION['user'])?></h1>
    </header>

    <section class="account-balance">
      <p>Kontostand:</p>
      <h2><?= number_format($_SESSION['data']['money'], 2, ',', ".") ?></h2>
    </section>

    <section class="actions">
      <button>Überweisen</button>
      <button>Verlauf anzeigen</button>
      <a href="/logout">
        <button>Ausloggen</button>
      </a>
    </section>
  </div>
</body>
</html>
