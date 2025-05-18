<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .center-content {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .center-content-inner {
            max-width: 600px;
            text-align: center;
        }
        .center-content-inner ul {
            text-align: left; /* Align list items to the left */
        }
    </style>
        <style>
        .custom-heading {
            font-size: 2.2rem; /* Slightly smaller size */
            margin-top: 2rem; /* Margin above the heading */
            margin-bottom: 2rem; /* Margin beneath the heading */
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
<div class="container center-content">
    <div class="center-content-inner">
        <h1 class="custom-heading">Impressum</h1>
        <p>Diese Website wurde von folgenden Entwicklern erstellt:</p>
        <ul>
            <li>Entwickler 1: Samuel Brunner</li>
            <li>Entwickler 2: Nikita Pussliuc</li>
            <li>Entwickler 3: Leon Friedl</li>
            <li>Entwickler 4: Nikolaus Kment</li>
            <li>Entwickler 5: Tobias Wydra</li>
        </ul>

        <h2>Unternehmensinformationen</h2>
        <p>Name des Unternehmens oder Verantwortlichen: SNNLT GmbH</p>
        <p>Adresse: Höchstädtplatz, 1200 Wien</p>
        <p>Kontakt: <a href="mailto:nikolaus@gmail.com">nikolaus@gmail.com</a>, Telefon: +43 0660 123 456</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
