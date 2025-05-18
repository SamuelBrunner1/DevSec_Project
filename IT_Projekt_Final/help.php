<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hilfe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .custom-heading {
            font-size: 2.2rem; /* Slightly smaller size */
            margin-top: 2rem; /* Margin above the heading */
            margin-bottom: 5rem; /* Margin beneath the heading */
            text-align: center; /* Center the heading */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">StayOrganized</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create_task.php">Aufgabe erstellen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="todolist.php">Aufgaben anzeigen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="calendar.php">Kalender</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="imprint.php">Impressum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="help.php">Hilfe</a>
            </li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Registrieren</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div class="container">
    <h1 class="custom-heading">Hilfe</h1>
    <h2>Home</h2>
    <p>Die Startseite Ihrer To-Do-Liste. Hier sehen Sie eine Übersicht Ihrer Aufgaben.</p>

    <h2>Aufgabe erstellen</h2>
    <p>Hier können Sie eine neue Aufgabe erstellen. Geben Sie den Aufgabentyp, den Namen und das Fälligkeitsdatum ein.</p>

    <h2>Aufgaben anzeigen</h2>
    <p>Diese Seite zeigt alle Ihre Aufgaben. Sie können Aufgaben als erledigt markieren oder löschen.</p>

    <h2>Kalender</h2>
    <p>Diese Seite zeigt Ihre Aufgaben in einem Kalenderformat. Erledigte Aufgaben werden in grün und nicht erledigte in rot angezeigt.</p>

    <h2>Impressum</h2>
    <p>Hier finden Sie Informationen über die Entwickler dieser Website.</p>

    <h2>Hilfe</h2>
    <p>Diese Seite bietet eine Übersicht über die Funktionen der Website und wie man sie verwendet.</p>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
