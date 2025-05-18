<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script type='text/javascript'>alert('Error: User not logged in'); window.location.href='login.php';</script>";
    exit;
}

// Tasks-Array initialisieren, falls leer
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Filterdaten aus GET
$task_type_filter = $_GET['task_type'] ?? '';
$date_from = $_GET['date_from'] ?? '';
$date_to = $_GET['date_to'] ?? '';

// Gefilterte Liste erzeugen
$filtered_tasks = array_filter($_SESSION['tasks'], function ($task) use ($task_type_filter, $date_from, $date_to) {
    if ($task_type_filter && $task['type'] !== $task_type_filter) {
        return false;
    }
    if ($date_from && $task['date'] < $date_from) {
        return false;
    }
    if ($date_to && $task['date'] > $date_to) {
        return false;
    }
    return true;
});
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do Liste</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .custom-heading {
            font-size: 2.2rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
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
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="registration.php">Registrieren</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="custom-heading">To-Do Liste</h1>
    <form method="get" class="form-inline mb-3">
        <label for="task_type" class="mr-2">Aufgabentyp:</label>
        <select id="task_type" name="task_type" class="form-control mr-3">
            <option value="">Alle</option>
            <option value="business" <?php if ($task_type_filter === 'business') echo 'selected'; ?>>Geschäftlich</option>
            <option value="private" <?php if ($task_type_filter === 'private') echo 'selected'; ?>>Privat</option>
        </select>

        <label for="date_from" class="mr-2">Von:</label>
        <input type="date" id="date_from" name="date_from" class="form-control mr-3" value="<?php echo htmlspecialchars($date_from); ?>">

        <label for="date_to" class="mr-2">Bis:</label>
        <input type="date" id="date_to" name="date_to" class="form-control mr-3" value="<?php echo htmlspecialchars($date_to); ?>">

        <button type="submit" class="btn btn-primary">Filter anwenden</button>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Typ</th>
            <th>Aufgabenname</th>
            <th>Datum</th>
            <th>Erstellt von</th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($filtered_tasks) > 0): ?>
            <?php foreach ($filtered_tasks as $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['type']); ?></td>
                    <td><?php echo htmlspecialchars($task['name']); ?></td>
                    <td><?php echo htmlspecialchars($task['date']); ?></td>
                    <td><?php echo htmlspecialchars($task['created_by']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">Keine Aufgaben gefunden.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
