<?php
session_start();

$message = "";

// Initialisiere Session-Array für Benutzer, wenn es noch nicht existiert
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Passwörter vergleichen
    if ($password !== $password_confirm) {
        $message = "Passwörter stimmen nicht überein.";
    } else {
        // Benutzer in Session speichern
        $_SESSION['users'][] = [
            'email' => $email,
            'password' => $password
        ];

        // Weiterleitung zum Login
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const message = "<?php echo $message; ?>";
            if (message) {
                alert(message);
            }
        });

        function validateForm() {
            const password = document.getElementById("password").value;
            const passwordConfirm = document.getElementById("password_confirm").value;

            if (password !== passwordConfirm) {
                alert("Passwörter stimmen nicht überein.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">StayOrganized</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="create_task.php">Aufgabe erstellen</a></li>
            <li class="nav-item"><a class="nav-link" href="todolist.php">Aufgaben anzeigen</a></li>
            <li class="nav-item"><a class="nav-link" href="calendar.php">Kalender</a></li>
            <li class="nav-item"><a class="nav-link" href="imprint.php">Impressum</a></li>
            <li class="nav-item"><a class="nav-link" href="help.php">Hilfe</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="registration.php">Registrieren</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <h1>Registrierungsformular</h1>
    <form action="registration.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="email">E-Mail-Adresse:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirm">Passwort bestätigen:</label>
            <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Registrieren">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
