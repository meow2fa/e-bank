<?php
require BASE_DIR . '/core/Auth.php';

$auth = new Auth(BASE_DIR . '/data/users.json');
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($auth->attempt($username, $password)) {
        $message = "Login erfolgreich. Willkommen, " . htmlspecialchars($auth->user());
    } else {
        $message = "Ungültige Anmeldedaten.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="/assets/css/main.css" />
<title>Bank Login</title>
</head>
<body>
    <div class="login-container">
      <h2>Bank Login</h2>

      <?php if ($message): ?>
          <div class="error-message"><?php echo $message; ?></div>
      <?php endif; ?>

      <form method="POST" novalidate>
          <input type="text" name="username" placeholder="Benutzername" required />
          <input type="password" name="password" placeholder="Passwort" required />
          <button type="submit">Einloggen</button>
      </form>

      <a href="#" class="forgot-password">Passwort vergessen?</a>
    </div>
</body>
</html>
