<?php
require_once __DIR__ . "/config-test.php";

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn && $conn->connect_error) {
    echo "Errore di connessione: " . $conn->connect_error;
    die();
}