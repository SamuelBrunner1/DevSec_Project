<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "Error: User not logged in";
    exit;
}

// Sicherstellen, dass Tasks überhaupt vorhanden sind
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $task_index = $_POST['task_id'] ?? null;  // Wir behandeln task_id als Index im Array
    $completed = isset($_POST['completed']) ? (bool)$_POST['completed'] : false;

    // Nur fortfahren, wenn der Index gültig ist
    if ($task_index !== null && isset($_SESSION['tasks'][$task_index])) {
        $_SESSION['tasks'][$task_index]['completed'] = $completed;
    }

    // Zurück zur Übersicht
    header("Location: todolist.php");
    exit();
}
?>
