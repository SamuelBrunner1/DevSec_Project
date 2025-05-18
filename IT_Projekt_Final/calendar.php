<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script type='text/javascript'>alert('Error: User not logged in'); window.location.href='login.php';</script>";
    exit;
}

// Aufgaben aus Session laden
$tasks = [];
if (isset($_SESSION['tasks']) && is_array($_SESSION['tasks'])) {
    foreach ($_SESSION['tasks'] as $task) {
        $tasks[] = [
            'title' => $task['name'],
            'start' => $task['date'],
            'color' => isset($task['completed']) && $task['completed'] ? 'green' : 'red'
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        .custom-heading {
            font-size: 2.2rem;
            margin-top: 2rem;
            text-align: center;
        }
    </style>
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
            <?php if ($_SESSION['loggedin']): ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="registration.php">Registrieren</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="custom-heading">Kalender</h1>
    <div id='calendar'></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: <?php echo json_encode($tasks); ?>
    });
    calendar.render();
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
