<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "Error: User not logged in";
    exit;
}

// Tasks-Array vorbereiten, falls es noch nicht existiert
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// Nur wenn eine POST-Anfrage kommt
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $task_index = $_POST['task_id'] ?? null;

    // Ist der Index gültig?
    if ($task_index !== null && isset($_SESSION['tasks'][$task_index])) {
        // Aufgabe löschen
        unset($_SESSION['tasks'][$task_index]);
        // Array neu indexieren, um Lücken zu vermeiden
        $_SESSION['tasks'] = array_values($_SESSION['tasks']);
    }

    // Zurück zur Aufgabenliste
    header("Location: todolist.php");
    exit();
}
?>
