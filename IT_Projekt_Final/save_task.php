<?php
session_start();

// Zugriff nur für eingeloggte Benutzer
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "Error: User not logged in";
    exit;
}

// Tasks-Array vorbereiten, falls noch nicht vorhanden
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_type = $_POST['task_type'] ?? '';
    $task_name = $_POST['task_name'] ?? '';
    $task_date = $_POST['task_date'] ?? '';

    // Einfacher Task-Datensatz
    $task = [
        'type' => $task_type,
        'name' => $task_name,
        'date' => $task_date,
        'created_by' => $_SESSION['username'] ?? 'Unbekannt'
    ];

    // In Session speichern
    $_SESSION['tasks'][] = $task;

    // Weiterleitung zurück mit Erfolgsmeldung
    header("Location: create_task.php?success=1");
    exit;
}
?>
